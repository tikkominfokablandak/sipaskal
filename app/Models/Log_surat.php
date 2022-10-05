<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_surat extends Model
{
    use HasFactory;

    protected $table = 'logsurats';

    protected $fillable = [
        'id_sm',
        'id_sk',
        'id_tujuan',
        'id_pengirim',
        'id_tembusan',
        'id_verifikator',
        'id_ttd',
        'id_disposisi',
        'id_status',
        'read',
        'id_create'
    ];
}
