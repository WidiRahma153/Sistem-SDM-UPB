<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenSkp extends Model
{
    protected $table = 'ms_dosen_skp';
    protected $fillable = ['id_dosen','id_dosen_penilai','tgl_mulai','tgl_selesai'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function detail()
    {
        return $this->hasMany(DosenSkpDetail::class, 'id_skp');
    }
}
