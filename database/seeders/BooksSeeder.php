<?php

namespace Database\Seeders;

use App\Models\BooksModel;
use App\Models\CategoryModel;
use App\Models\RackModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $books  = [
            [
                'isbn_books' => '9781234567890',
                'judul_books' => 'Introduction to Laravel',
                'autor_books' => 'John Doe',
                'year_books' => 2022,
                'publisher_books' => 'Tech Publisher',
                'number_books' => 10,
                'category_code' => '100-199', // Sesuai kode kategori
                'rack_code' => 'R001', // Sesuai kode rak
                'gambar' => 'intro_laravel.jpg',
            ],
            [
                'isbn_books' => '9780987654321',
                'judul_books' => 'Advanced PHP Programming',
                'autor_books' => 'Jane Smith',
                'year_books' => 2021,
                'publisher_books' => 'Code Publisher',
                'number_books' => 5,
                'category_code' => '200-299',
                'rack_code' => 'R002',
                'gambar' => 'advanced_php.jpg',
            ],
        ];

        // $categories = [
        //     '100-199' => 1,
        //     '200-299' => 2,
        //     '300-399' => 3,
        //     '400-499' => 4,
        //     '500-599' => 5,
        //     '600-699' => 6,
        //     '700-799' => 7,
        //     '800-899' => 8,
        // ];

        // $racks = [
        //     'R001' => 1,
        //     'R002' => 2,
        //     'R003' => 3,
        // ];


        // $books = [];

        // for ($i = 1; $i <= 1000; $i++) {
            // Tentukan kode kategori dan rak berdasarkan pola tertentu
            // $category_code = array_keys($categories)[$i % count($categories)];
            // $rack_code = array_keys($racks)[$i % count($racks)];

        //     $books[] = [
        //         'isbn_books' => '97800000000' . str_pad($i, 2, '0', STR_PAD_LEFT),
        //         'judul_books' => 'Book Title ' . $i,
        //         'autor_books' => 'Author ' . $i,
        //         'year_books' => 2000 + ($i % 24),
        //         'publisher_books' => 'Publisher ' . $i,
        //         'number_books' => rand(1, 20),
        //         'category_code' => $category_code,
        //         'rack_code' => $rack_code,
        //         'gambar' => 'book_' . $i . '.jpg',
        //     ];
        // }

        foreach ($books as $bookData) {
            // Cari kategori berdasarkan kode
            $category = CategoryModel::where('code_category', $bookData['category_code'])->first();
            // Cari rak berdasarkan kode
            $rack = RackModel::where('code_rack', $bookData['rack_code'])->first();

            if ($category && $rack) {
                // Tambahkan buku dengan relasi
                BooksModel::create([
                    'isbn_books' => $bookData['isbn_books'],
                    'judul_books' => $bookData['judul_books'],
                    'autor_books' => $bookData['autor_books'],
                    'year_books' => $bookData['year_books'],
                    'publisher_books' => $bookData['publisher_books'],
                    'number_books' => $bookData['number_books'],
                    'id_category' => $category->id, // Relasi ke kategori
                    'id_rack' => $rack->id,        // Relasi ke rak
                    'name_rack' => $rack->name_rack,
                    'gambar' => $bookData['gambar'],
                ]);
            }
        }
    }
}
