<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenSertifikat extends Model
{
    protected $table = 'ms_dosen_sertifikat';
    protected $fillable = [
        'id_dosen','no_sertifikat','link_sertifikat','ket_sertifikat','id_files','id_jenis_sertifikat'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
