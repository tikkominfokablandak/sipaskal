<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'suratkeluars';

    protected $fillable = [
        'id_pengirim',
        'id_verifikator',
        'id_ttd',
        'id_jenissurat',
        'sifat_surat',
        'tingkat_urgen',
        'no_surat',
        'tgl_surat',
        'perihal',
        'isi',
        'file_surat',
        'lamp_surat',
        'id_tujuan',
        'nama_tujuan',
        'jabatan_tujuan',
        'instansi_tujuan',
        'tembusan',
        'ket',
        'no_agenda',
        'id_status',
        'id_create'
    ];
}
