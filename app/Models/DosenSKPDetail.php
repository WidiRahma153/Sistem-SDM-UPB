<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenSkpDetail extends Model
{
    protected $table = 'ms_dosen_skp_detail';
    protected $fillable = [
        'id_skp','uraian','angka_kredit','kuantitas','id_var_satuan','keterangan','biaya'
    ];

    public function skp()
    {
        return $this->belongsTo(DosenSkp::class, 'id_skp');
    }
}
