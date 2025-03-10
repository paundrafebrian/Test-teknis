<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pegawais'; // Gunakan nama tabel sesuai dengan database
    protected $primaryKey = 'id'; // Primary key tetap 'id'

    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan',
        'eselon',
        'jabatan',
        'tempat_tugas',
        'agama',
        'unit_kerja',
        'no_hp',
        'npwp',
        'foto'
    ];
}
