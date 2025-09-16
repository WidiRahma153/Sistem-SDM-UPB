<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'ms_jenjang';
    protected $fillable = [
        'nama_jenjang'
    ];

    public function pendidikan()
    {
        return $this->belongsTo(DosenPendidikan::class, 'id_jenjang');
    }
}