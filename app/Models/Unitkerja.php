<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Opd;

class Unitkerja extends Model
{
    use HasFactory;

    protected $table = 'unitkerjas';

    protected $fillable = [
        'id',
        'nama_unitkerja',
        'induk_unitkerja',
        'alamat',
        'id_opd'
    ];

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
