<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateBooksExport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'ISBN',             // Kolom 1
            'Judul',            // Kolom 2
            'Penulis',          // Kolom 3
            'Tahun',            // Kolom 4
            'Penerbit',         // Kolom 5
            'Jumlah Buku',      // Kolom 6
            'Kode Kategori',    // Kolom 7
            'Kode Rak',         // Kolom 8
            'Gambar',           // Kolom 9
        ];
    }
}