<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Verifikator extends Model
{
    use HasFactory;

    protected $table = 'verifikators';

    protected $fillable = [
        'id_user',
        'id_create',
    ];

    public function iduser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function idcreate()
    {
        return $this->belongsTo(User::class, 'id_create');
    }
}
