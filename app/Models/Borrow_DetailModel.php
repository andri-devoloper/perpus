<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow_DetailModel extends Model
{
    use HasFactory;
    protected $table = 'borrow_details';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'borrow_id',
        'book_id',
        'counter',
        'status',
        'book_identity',
        'borrowed_by',
        'returned_by'
    ];

    public $timestamps = true;

    // protected $guarded = [];
    public function borrowedBy()
    {
        return $this->belongsTo(User::class, 'borrowed_by');
    }

    public function returnedBy()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }

    public function rack()
    {
        return $this->belongsTo(RackModel::class, 'id_rack', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function borrow()
    {
        return $this->belongsTo(BorrowModel::class, 'borrow_id');
    }


    public function books()
    {
        return $this->belongsTo(BooksModel::class, 'book_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            $number = $latest ? (int) substr($latest->id, 5) + 1 : 1;
            $model->id = 'BODE_' . $number;
        });
    }
}
