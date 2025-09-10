<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenPelatihan extends Model
{
    protected $table = 'ms_dosen_pelatihan';
    protected $fillable = [
        'id_dosen',
        'id_var_kegiatan',
        'no_surat_tugas',
        'tgl_mulai',
        'tgl_selesai',
        'durasi',
        'nama_kegiatan',
        'tempat_kegiatan',
        'penyelenggara',
        'sebagai_kode',
        'sertifikat',
        'link_surat_tugas',
        'ket_surat_tugas'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
