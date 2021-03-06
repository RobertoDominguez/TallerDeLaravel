<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apunte extends Model
{
    use HasFactory;

    protected $table = 'apunte';

    protected $fillable = [
        'id_tema',
        'id_usuario',
        'titulo',
        'texto',
        'url_imagen',
        'url_recurso',
        'url_archivo',
    ];
}
