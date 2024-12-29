<?php

namespace App\Http\Controllers;

use App\Exports\TemplateBooksExport;
use App\Imports\BooksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    // Books import
    public function Import_Books(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new BooksImport, $request->file('file'));

        return back()->with('success', 'Data buku berhasil diimpor!');
    }

    // Templade book download
    public function downloadTemplate()
    {
        // Nama file template
        $fileName = 'Template_Books.xlsx';

        // Mengembalikan file Excel untuk diunduh
        return Excel::download(new TemplateBooksExport, $fileName);
    }
}