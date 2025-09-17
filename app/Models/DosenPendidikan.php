<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenPendidikan extends Model
{
    protected $table = 'ms_dosen_pendidikan';
    protected $fillable = [
        'id_dosen','id_jenjang','jurusan','nama_sekolah','ipk',
        'tgl_mulai','tgl_lulus','gelar','link_ijazah_transkrip','file',
        'ket_ijazah_transkrip','id_files'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang');
    }
}


