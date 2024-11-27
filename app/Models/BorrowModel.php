<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowModel extends Model
{
    use HasFactory;
    protected $table = 'borrow';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name_borrow',
        'id_card',
        'position_borrow',
        'phone_borrow',
    ];

    public $timestamps = true; 

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            $number = $latest ? (int) substr($latest->id, 7) + 1 : 1;
            $model->id = 'BORROW_' . $number;
        });
    }
}