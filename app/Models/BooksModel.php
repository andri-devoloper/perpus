<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public $timestamps = true;

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
            $latest = static::orderBy('id', 'desc')->first();
            if (!$latest) {
                $model->id = 'BOOKS_1';
            } else {
                $number = (int) substr($latest->id, strpos($latest->id, '_') + 1);
                $newNumber = $number + 1;
                $model->id = 'BOOKS_' . $newNumber;
            }
        });
    }

}
