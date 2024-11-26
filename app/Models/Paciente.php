<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'codigo_postal',
        'cedula',
        'num_seguridad_social',
        'user_id',
        'medico_id'
    ];

    // Relación con el modelo Medico
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
