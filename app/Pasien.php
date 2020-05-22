<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'nomor_rm',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat'       
    ];
}
