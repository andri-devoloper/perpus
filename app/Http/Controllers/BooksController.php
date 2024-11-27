<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\RackModel;
use App\Models\SubModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function Index_NewBook()
    {
        $rack_all = RackModel::all();
        $user = Auth::user();

        return view('dashboard.pages.new-books', compact('rack_all', 'user'));
    }

    public function Get_Subs(Request $req)
    {
        $subs = SubModel::where('id_rack', $req->id_rack)->get();
        return response()->json($subs);
    }

    // Get Code Category
    public function Get_Category($code_category)
    {
        $category = CategoryModel::all();

        foreach ($category as $cat){

        $range = explode('-', $cat->code_category);

            if($code_category >= $range[0] && $code_category <= $range[1]){
                return response()->json(['name_category' => $cat->name_category]);
            }
        }
        return response()->json(['name_category' => null]);
    }

    public function getAllCategories() {
        $categories = CategoryModel::all();
        return response()->json($categories);
    }


    // Create Books new
    public function Create_Books(Request $req)
    {

        $validated = $req->validate([
            'isbn_books' => 'required|regex:/^[0-9]+$/|max:255',
            'judul_books' => 'required|max:255',
            'autor_books' => 'required|max:255',
            'year_books' => 'required|digits:4',
            'publisher_books' => 'required|max:255',
            'number_books' => 'required|regex:/^[0-9]+$/|max:255',
            'code_category' => 'required|max:255',
            'id_rack' => 'required|max:255',
            'name_rack' => 'required|max:255',
        ]);

        $category = CategoryModel::all();
        $categories = null;

        foreach ($category as $cat){

        $range = explode('-', $cat->code_category);

            if($validated['code_category'] >= $range[0] && $validated['code_category'] <= $range[1]){
                $categories = $cat;
                break;
            }
        }

        $books = new BooksModel([
            'isbn_books' =>$validated['isbn_books'],
            'judul_books' => $validated['judul_books'],
            'autor_books' =>$validated['autor_books'],
            'year_books' =>$validated['year_books'],
            'publisher_books' => $validated['publisher_books'],
            'number_books' =>$validated['number_books'],
            'id_category' => $categories->id,
            'id_rack' => $validated['id_rack'],
            'name_rack' => $validated['name_rack']
        ]);

        $books->save();

        return back()->with('success', 'Books berhasil ditambahkan.');
    }


    public function Update_Books(Request $req, $id)
    {

        $books = BooksModel::find($id);

        $validated = $req->validate([
            'isbn_books' => 'required|regex:/^[0-9]+$/|max:255',
            'judul_books' => 'required|max:255',
            'autor_books' => 'required|max:255',
            'year_books' => 'required|digits:4',
            'publisher_books' => 'required|max:255',
            'number_books' => 'required|regex:/^[0-9]+$/|max:255',
        ]);

        $books->isbn_books = $validated['isbn_books'] ?? $books->isbn_books;
        $books->judul_books = $validated['judul_books'] ?? $books->judul_books;
        $books->autor_books = $validated['autor_books'] ?? $books->autor_books;
        $books->year_books = $validated['year_books'] ?? $books->year_books;
        $books->publisher_books = $validated['publisher_books'] ?? $books->publisher_books;


        // dd($books);
        if ($req->filled('code_category')) {
            $category = CategoryModel::all();
            foreach ($category as $cat) {
                $range = explode('-', $cat->code_category);
                if ($req->code_category >= $range[0] && $req->code_category <= $range[1]) {
                    $books->id_category = $cat->id;
                    break;
                }
            }
        }

        $books->id_rack = $req->id_rack ?? $books->id_rack;
        $books->name_rack = $req->name_rack ?? $books->name_rack;

        $books->save();

        return back()->with('success', 'Books berhasil diperbarui.');
    }

    public function Delete_Books($id)
    {
        $books = BooksModel::find($id);

        $books->delete();

        return back()->with('success', 'Books berhasil dihapus.');
    }

    // Daftar Books
    public function List_Books(Request $request)
    {
        $query = BooksModel::with('rack', 'category');

    // Filter by search term (search books by title or ISBN)
    if ($request->has('search') && $request->input('search') != '') {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('judul_books', 'like', '%' . $searchTerm . '%')
              ->orWhere('isbn_books', 'like', '%' . $searchTerm . '%');
        });
    }

    // Filter by category
    if ($request->has('category') && $request->input('category') != '') {
        $query->where('id_category', $request->input('category')); // Use 'id_category' instead of 'category_id'
    }

    // Get books after applying the filters
    $book = $query->get();

    // Get all categories for the dropdown
    $categories = CategoryModel::all(); // Make sure you have a CategoryModel or equivalent

    // Other data
    $rack_all = RackModel::all();
    $sub_racks = SubModel::all();
    $user = Auth::user();


        return view('dashboard.pages.books', compact('book', 'rack_all', 'sub_racks', 'user', 'categories'));
    }

}