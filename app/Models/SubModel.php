<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModel extends Model
{
    use HasFactory;

    protected $table = 'sub';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'code_sub',
        'rack_id'
    ];

    public $timestamps = true;

    public function rack()
    {
        return $this->belongsTo(RackModel::class, 'rack_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            if (!$latest) {

                $model->id = 'SU01';
            } else {
                $number = (int) substr($latest->id, 2);
                $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
                $model->id = 'SU' . $newNumber;
            }
        });
    }
}