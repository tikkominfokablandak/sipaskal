<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unitkerja;
use App\Models\Jabatan;

class Opd extends Model
{
    use HasFactory;

    protected $table = 'opds';

    protected $fillable = [
        'id',
        'nama_opd',
        'singkatan',
        'alamat'
    ];

    public function unitkerja()
    {
        return $this->hasMany(Unitkerja::class);
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}