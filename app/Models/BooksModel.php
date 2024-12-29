<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BooksModel extends Model
{
    use HasFactory;
    protected $table = 'books';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'isbn_books',
        'judul_books',
        'autor_books',
        'year_books',
        'publisher_books',
        'number_books',
        'id_category',
        'id_rack',
        'name_rack',
        'gambar',
        'description'
    ];

    public $timestamps = true;

    public function books()
    {
        return $this->belongsTo(BooksModel::class, 'book_id', 'id');
    }


    public function rack()
    {
        return $this->belongsTo(RackModel::class, 'id_rack', 'id');
    }

    public function borrowDetails()
{
    return $this->hasMany(Borrow_DetailModel::class, 'book_id');
}

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'id_category');
    }



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ambil ID terakhir dari tabel
            $latestId = DB::table('books')
                ->select('id')
                ->orderByRaw('CAST(SUBSTRING_INDEX(id, "_", -1) AS UNSIGNED) DESC')
                ->limit(1)
                ->pluck('id')
                ->first();

            // Hitung ID baru
            $number = $latestId
                ? (int) substr($latestId, strpos($latestId, '_') + 1) + 1
                : 1;

            $model->id = 'BOOKS_' . $number;
        });
    }
}