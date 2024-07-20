<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoImagenContenido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $primaryKey = 'id_tipo_imagen';
    protected $table = 'tipo_imagen';
    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'fecha_creacion';

    protected $fillable = [
        'posicion_imagen',
        'fecha_creacion',
    ];
}