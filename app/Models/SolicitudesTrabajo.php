<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SolicitudesTrabajo extends Model
{
    protected $connection = 'mongodb';
    
    protected $collection = 'solicitudesTrabajo';

    protected $fillable = [
        'usuarioId',
        'trabajadorId',
        'tipoTrabajo',
        'descripcionProblema',
        'nivelUrgencia',
        'fotosProblema',
        'hora',
        'fecha',
        'presupuesto',
        'estado',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d\TH:i:s.u\Z'); // Formato ISO 8601
    }
}
