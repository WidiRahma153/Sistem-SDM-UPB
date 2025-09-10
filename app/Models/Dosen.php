<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'ms_dosen';
    protected $fillable = [
        'nik',
        'nidn',
        'no_ktp',
        'nama',
        'tmp_lhr',
        'tgl_lhr',
        'email',
        'sex',
        'id_agama',
        'alamat',
        'id_prodi',
        'id_jabatan',
        'id_bid_ilmu',
        'id_jenjang',
        'gelar'
    ];

    public function pendidikan()
    {
        return $this->hasMany(DosenPendidikan::class, 'id_dosen', 'id');
    }

    public function sertifikat()
    {
        return $this->hasMany(DosenSertifikat::class, 'id_dosen');
    }

    public function pelatihan()
    {
        return $this->hasMany(DosenPelatihan::class, 'id_dosen');
    }

    public function penghargaan()
    {
        return $this->hasMany(DosenPenghargaan::class, 'id_dosen');
    }

    public function cuti()
    {
        return $this->hasMany(DosenCuti::class, 'id_dosen');
    }

    public function jabatanFungsional()
    {
        return $this->hasMany(DosenJabatanFungsional::class, 'id_dosen');
    }

    public function jabatan()
    {
        return $this->hasMany(DosenJabatan::class, 'id_dosen');
    }

    public function hukuman()
    {
        return $this->hasMany(DosenHukuman::class, 'id_dosen');
    }

    public function skp()
    {
        return $this->hasMany(DosenSkp::class, 'id_dosen');
    }

    public function keluarga()
    {
        return $this->hasMany(DosenKeluarga::class, 'id_dosen');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_dosen');
    }
}
