<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $table = 'tujuans';

    protected $fillable = [
        'jenis_tujuan',
        'id_internal',
        'nama_tujuan',
        'jabatan_tujuan',
        'instansi_tujuan',
        'alamat',
        'kotakab',
        'id_create'
    ];

    public function idinternal()
    {
        return $this->belongsTo(User::class, 'id_internal');
    }

    public function idcreate()
    {
        return $this->belongsTo(User::class, 'id_create');
    }
}
