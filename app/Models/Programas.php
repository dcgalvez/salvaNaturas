<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $primaryKey = 'id_programas';
    protected $table = 'programas';
    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
    const DELETED_AT = "trash";

    protected $fillable = [
        'programa',
        'Servicios',
        'activc',
        'contenido'
    ];
}