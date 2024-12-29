<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function Index_export()
    {
        $user = Auth::user();
        return view('dashboard.pages.export', compact('user'));
    }
    public function exportBooks(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        if (!$year) {
            return redirect()->back()->with('error', 'Tahun wajib diisi!');
        }

        return Excel::download(new BooksExport($month, $year), "books_{$month}_{$year}.xlsx");
    }
}