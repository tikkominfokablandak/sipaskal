<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisis';

    protected $fillable = [
        'id_disp_ke',
        'disp_ket',
        'disp_note_sekretaris',
        'disp_note_kadis',
        'tgl_disp',
        'disp_jawaban',
        'id_status',
        'id_create'
    ];
}
