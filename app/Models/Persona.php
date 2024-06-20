<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['cedula', 'nombre', 'documento'];

    public function accidentes(){
        return $this->hasMany(Accidente::class);

    }
    public function vehiculos(){
        return $this->belongsToMany(Vehiculo::class);

    }

}
