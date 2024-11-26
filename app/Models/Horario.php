<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia', 'hora_inicio', 'hora_fin','medico_id','consultorio_id'];

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
}
