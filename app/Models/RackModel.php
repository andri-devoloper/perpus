<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RackModel extends Model
{
    use HasFactory;

    protected $table = 'rack';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'code_rack',
        'name_rack',
    ];

    public $timestamps = true;

    public function subs()
    {
        return $this->hasMany(SubModel::class, 'id_rack');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::orderBy('id', 'desc')->first();
            if (!$latest) {

                $model->id = 'RA01';
            } else {
                $number = (int) substr($latest->id, 2);
                $newNumber = str_pad($number + 1, 2, '0', STR_PAD_LEFT);
                $model->id = 'RA' . $newNumber;
            }
        });
    }
}