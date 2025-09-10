<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenHukuman extends Model
{
    protected $table = 'ms_dosen_hukuman';
    protected $fillable = [
        'id_dosen','id_var_hukuman','id_pejabat_penghukum','nomor_sk_hukuman',
        'tgl_sk_hukuman','id_pejabat_pemulih','nomor_sk_pemulih','tgl_sk_pemulih'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
