<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class pais extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $connection = 'mysql';
    protected $primaryKey = 'id_pais';
    protected $table = 'pais';
    protected $dateFormat = 'd-m-Y H:i:s';

    protected $fillable = [
        'nombre_pais',
        'continente'
    ];
}
