<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenRefVariabel extends Model
{
    protected $table = 'ms_dosen_ref_variabel';
    protected $fillable = ['id_parent','variabel','keterangan'];
}
