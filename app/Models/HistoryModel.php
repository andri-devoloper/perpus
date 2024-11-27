<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'history';
    protected $fillable = [
        'judul_books',
        'isbn_books',
        'category',
        'status',
        'name_borrow',
        'class_position',
        'phone_borrow'
    ];

    public $timestamps = true; 

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            $number = $latest ? (int) substr($latest->id, 5) + 1 : 1;
            $model->id = 'HIS_' . $number;
        });
    }
}