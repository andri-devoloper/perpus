<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BooksModel;
use App\Models\Borrow_DetailModel;
use App\Models\BorrowModel;
use App\Models\CategoryModel;
use App\Models\HistoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class BorrowController extends Controller
{
    public function Index_Borrow(Request $req)
    {
        $search = $req->input('search');
        $user = Auth::user();

    // Melakukan pencarian berdasarkan ISBN atau Judul Buku
    $books = BooksModel::where('isbn_books', 'like', "%{$search}%")
                ->orWhere('judul_books', 'like', "%{$search}%")
                ->get();


        return view('dashboard.pages.borrow', compact('books', 'user'));
    }

    // public function Create_Borrow(Request $req)
    // {
    //   $borrow = $req->validate([
    //     'name_borrow' => 'required|max:255',
    //     'number_id'=>  'required|max:255',
    //     'phone'=>'required|max:255',
    //     'class_position' => 'required|max:255',
    //     'id_books' => 'required|array',
    //     'id_books.*' => 'required|max:255',
    //     'counter' => 'required|array',
    //     'counter.*' => 'required|max:255'
    //   ]);


    //     $post = new BorrowModel([
    //         'name_borrow' => $borrow['name_borrow'],
    //         'id_card' => $borrow['number_id'],
    //         'position_borrow' => $borrow['class_position'],
    //         'phone_borrow' => $borrow['phone'],
    //         'status' => 'Dipinjam',
    //         'id_books' => is_array($borrow['id_books']) ? implode(',', $borrow['id_books']) : '',
    //         'conter' => is_array($borrow['counter']) ? implode(',', $borrow['counter']) : ''
    //     ]);

    //     // dd($post);

    //     $post->save();

    //   return response()->json(['message' => 'berhasi;']);

    // }

    public function Create_Borrow(Request $request)
    {
        $borrow = $request->validate([
            'name_borrow' => 'required|max:255',
            'number_id'=> 'required|max:255',
            'phone' => 'required|max:255',
            'class_position' => 'required|max:255',
            'id_books' => 'required|array',
            'counter' => 'required|array',
            'book_identity' => 'required|max:255'
        ]);

        DB::beginTransaction();
        try {
            if (!auth()->check()) {
                return back()->withErrors('Pengguna belum login.');
            }
            // Simpan data peminjam ke BorrowModel
            $borrowRecord = BorrowModel::create([
                'name_borrow' => $borrow['name_borrow'],
                'id_card' => $borrow['number_id'],
                'position_borrow' => $borrow['class_position'],
                'phone_borrow' => $borrow['phone'],
                'borrowed_by' => auth()->user()->id,
            ]);

            dd($borrowRecord);

            foreach ($borrow['id_books'] as $index => $bookId) {
                // Ambil jumlah buku yang dipinjam
                $quantityBorrowed = $borrow['counter'][$index];

                // Dapatkan data buku dari BooksModel
                $book = BooksModel::findOrFail($bookId);

                // Periksa apakah stok buku mencukupi
                if ($book->number_books >= $quantityBorrowed) {
                    // Kurangi stok buku
                    $book->number_books -= $quantityBorrowed;
                    $book->save();
                } else {
                    return back()->withErrors('Jumlah buku tidak mencukupi untuk buku dengan judul ' . $book->judul_books);
                }

                // Simpan detail peminjaman ke Borrow_DetailModel
                Borrow_DetailModel::create([
                    'borrow_id' => $borrowRecord->id,
                    'book_id' => $bookId,
                    'counter' => $quantityBorrowed,
                    'status' => 'Dipinjam',
                    'book_identity' => $borrow['book_identity']
                ]);
            }

            DB::commit();
            return back()->with('success', 'Peminjaman berhasil dilakukan.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function Return_Borrow($borrow_id, $book_id)
    {
        // Ambil detail peminjaman buku berdasarkan borrow_id dan book_id
        $borrowDetail = Borrow_DetailModel::where('borrow_id', $borrow_id)->where('book_id', $book_id)->first();

        DB::beginTransaction();

        try {
            $borrowDetail->status = 'Dikembalikan';
            $borrowDetail->save();

            // Ambil informasi buku
            $book = BooksModel::find($book_id);
            // Tambahkan jumlah buku sesuai counter
            $book->number_books += $borrowDetail->counter;
            $book->save();

            $borrowRecord = BorrowModel::find($borrow_id);

            HistoryModel::create([
                'judul_books' => $book->judul_books,
                'isbn_books' => $book->isbn_books,
                'category' => $book->category ? $book->category->name_category : 'Kategori Tidak Ditemukan',
                'status' => 'Dikembalikan',
                'name_borrow' => $borrowRecord->name_borrow,
                'class_position' => $borrowRecord->position_borrow,
                'phone_borrow' => $borrowRecord->phone_borrow
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Buku berhasil dikembalikan dan data sudah dipindahkan ke history.');
        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaksi jika terjadi error
            Log::error('Error saat mengembalikan buku: ' . $e->getMessage()); // Tambahkan log untuk error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


        public function search(Request $request)
        {
            $search = $request->input('search');

            // Melakukan pencarian berdasarkan ISBN atau Judul Buku
            $books = BooksModel::where('isbn_books', 'like', "%{$search}%")
                        ->orWhere('judul_books', 'like', "%{$search}%")
                        ->get();

            // Mengembalikan hasil pencarian sebagai partial view
            return view('dashboard/books/search-results', compact('books'))->render();
        }

    public function Table_Borrow()
    {
        $category = CategoryModel::all();
        $user = Auth::user();

        $list_detail = Borrow_DetailModel::with(['rack', 'category', 'borrow', 'books'])
        ->orderBy('created_at', 'desc')
        ->get();;

        return view('dashboard.pages.borrowing-table', compact('list_detail', 'user'));
    }
}