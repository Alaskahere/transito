<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accidente extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['fecha','hora','lugar','persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

}
