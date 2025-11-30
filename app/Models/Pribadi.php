<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pribadi';

    protected $fillable = [
        'nik',
        'nama_mahasiswa',
        'tempat_lahir',
        'tanggal_lahir'
    ];
}
