<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\PengunjungModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    public function Index_Pengunjung()
    {


        return view('pages.pengunjung' );
    }

    public function Create_Pengunjung(Request $req)
    {
        // Validasi input
        $val = $req->validate([
            'first_name' => 'required|string|max:255',
            'date_time' => 'required|string',
            'kelas' => 'required|string|max:10',
            'keperluan' => 'required|string',
        ]);

        // Ambil nilai date_time
        $date_time = $val['date_time'];

        // Pisahkan bagian hari dan tanggal menggunakan explode
        $date_parts = explode(',', $date_time);

        $day_of_week = $date_parts[0];
        $day_of_time = trim($date_parts[1]);

        $bulan_indonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $bulan_inggris = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Gantikan bulan dalam bahasa Indonesia ke bahasa Inggris
        $day_of_time = str_replace($bulan_indonesia, $bulan_inggris, $day_of_time);

        try {
            $formatted_date_time = Carbon::createFromFormat('j F Y H:i:s', $day_of_time)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            return back()->with('error', 'Format tanggal tidak valid.');
        }

        // Simpan data ke dalam model
        $create = new PengunjungModel([
                'first_name' => $val['first_name'],
                'day' => $day_of_week,
                'date_time' => $formatted_date_time,
                'kelas' => $val['kelas'],
                'keperluan' => $val['keperluan'],
        ]);


        $create->save();

        return redirect()->back()->with('success', 'Data pengunjung berhasil disimpan.');
    }


    // Daftar Buku
    public function Index_DaftarBuku()
    {
        $book = BooksModel::orderByRaw('CAST(SUBSTRING(id, 7) AS UNSIGNED) ASC')->get();
        return view('pages.daftar-buku', compact('book'));
    }

    // Daftar User
    public function Index_DaftarUser()
    {
        $users = User::all();
        return view('pages.daftar-user', compact('users'));
    }

    // Data Pengujung
    public function Index_DataPenjunng()
    {
        $user = Auth::user();

        $pengunjung = PengunjungModel::all();

        return view('dashboard.pages.data-pengunjung', compact('user', 'pengunjung'));
    }

    public function deletePengunjung(Request $request)
    {
        // Ambil ID pengunjung yang akan dihapus
        $ids = $request->input('ids');

        // Hapus data pengunjung berdasarkan ID
        PengunjungModel::whereIn('id', $ids)->delete();

        // Return response sukses
        return response()->json(['success' => true, 'message' => 'Pengunjung berhasil dihapus']);
    }



    // Mask Pengujung

    public function Index_Pe(Request $request)
    {
        $search = $request->input('search');

        if ($request->ajax()) {
            $pengunjung = PengunjungModel::when($search, function ($query, $search) {
                return $query->where('first_name', 'like', "%{$search}%");

            })
            ->where('status', '!=', 'keluar')
            ->get();

            // Kembalikan view parsial dengan data hasil pencarian
            return view('pengunjung.partials.search_results', compact('pengunjung'))->render();
        }


        return view('back-perpu', ['pengunjung' => [], 'search' => $search]);
    }
    public function MarkAsKembali($id)
    {
        $pengunjung = PengunjungModel::findOrFail($id);

        // if ($pengunjung->status === 'masih di ruang') {
        //     return redirect()->back()->with('error', 'Pengunjung sudah dalam status "masih di ruang".');
        // }

        $waktuKeluar = Carbon::parse($pengunjung->updated_at);
        $waktuKembali = Carbon::now();
        $durasiBaruDalamMenit = $waktuKembali->diffInMinutes($waktuKeluar);

        $totalDurasi = $pengunjung->durasi + $durasiBaruDalamMenit;

        $pengunjung->update([
            'status' => 'keluar',
            'durasi' => $totalDurasi
        ]);

        return redirect()->back()->with('success', 'Status pengunjung diperbarui menjadi "masih di ruang".');
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $query = PengunjungModel::query();

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun); 
        }

        $pengunjung = $query->get();

        return view('dashboard.pages.data-pengunjung', [
            'pengunjung' => $pengunjung, 'user'=> $user
        ]);
    }
}