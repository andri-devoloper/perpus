<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'code_category',
        'name_category'
    ];

    public $timestamps = true;


    // Generate Id Custom
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            if (!$latest) {

                $model->id = 'CA01';
            } else {
                $number = (int) substr($latest->id, 2);
                $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
                $model->id = 'CA' . $newNumber;
            }
        });
    }
}
