<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\RackModel;
use App\Models\SubModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row['kode kategori']);
        // $category = CategoryModel::where('code_category', $row[6])->first();
        // $rack = RackModel::where('code_rack', $row[7])->first();

        // if (!$category) {
        //     throw new \Exception('Kode Kategori ' . $row['kode kategori'] . ' tidak ditemukan!');
        // }

        // if (!$rack) {
        //     throw new \Exception('Kode Rak ' . $row['Kode Rak'] . ' tidak ditemukan!');
        // }

        return new BooksModel([
            'isbn_books' => $row[0],
            'judul_books' => $row[1],
            'author_books' => $row[2],
            'year_books' => $row[3],
            'publisher_books' => $row[4],
            'number_books' => $row[5],
            'id_category' => $row[6],
            'id_rack' => $row[7],
            'gambar' => $row[8],
            'description' => $row[9],
        ]);
    }

}