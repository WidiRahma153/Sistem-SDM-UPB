<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenKeluarga extends Model
{
    protected $table = 'ms_dosen_keluarga';
    protected $fillable = [
        'id_dosen','nama','nik','jk','tmpt_lahir','tgl_lahir',
        'id_agama','hubungan_keluarga','id_jenjang_pendidikan_kel','id_pekerjaan'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
