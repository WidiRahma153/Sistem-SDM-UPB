<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenPenghargaan extends Model
{
    protected $table = 'ms_dosen_penghargaan';
    protected $fillable = ['id_dosen','penghargaan','tgl_pemberian','pemberi'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
}
