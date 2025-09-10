<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenCuti extends Model
{
    protected $table = 'ms_dosen_cuti';
    protected $fillable = [
        'id_dosen','id_var_cuti','no_surat','tgl_surat',
        'tgl_mulai','tgl_selesai','keterangan','dosen_id_approve','tgl_approve'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
