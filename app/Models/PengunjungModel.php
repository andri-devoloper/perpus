<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengunjungModel extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'day',
        'date_time',
        'kelas',
        'keperluan',
        'status',
        'durasi'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Cari ID terakhir dalam format 'PE_x'
            $latest = static::where('id', 'LIKE', 'PE_%')
                ->orderByRaw('CAST(SUBSTRING(id, 4) AS UNSIGNED) DESC')
                ->first();

            // Tentukan angka ID baru
            $number = $latest ? ((int) substr($latest->id, 3)) + 1 : 1;

            // Set nilai ID baru
            $model->id = 'PE_' . $number;
        });
    }


}