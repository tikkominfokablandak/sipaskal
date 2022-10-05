<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenissurat extends Model
{
    use HasFactory;

    protected $table = 'jenissurats';

    protected $fillable = [
        'jenis_surat',
        'file',
        'id_create'
    ];
}
