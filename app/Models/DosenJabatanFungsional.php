<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenJabatanFungsional extends Model
{
    protected $table = 'dosen_jafung';
    protected $fillable = [
        'id_dosen','id_var_jabatan','id_var_pangkat','tgl_tmt',
        'link_sertifikat','ket_sertifikat','id_files'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
