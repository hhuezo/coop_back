<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud';

    protected $primaryKey = 'Id';

    public $timestamps = false;


    protected $fillable = [
        'Numero',
        'Fecha',
        'Solicitante',
        'Fiador',
        'Cantidad',
        'Monto',
        'Tipo',
        'Tasa',
        'Meses',
        'NumeroCredito',
        'Estado',
        'UsuarioIngreso',
        'FechaIngreso',
        'Activo'
    ];

    protected $guarded = [];
}
