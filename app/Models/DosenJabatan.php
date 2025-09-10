<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenJabatan extends Model
{
    protected $table = 'ms_dosen_jabatan_struktural';
    protected $fillable = ['id_dosen','id_var_jabatan','tgl_tmt'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
