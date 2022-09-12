<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratAnimal extends Model
{
    use HasFactory;
    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function AssuranceAnimal () {
        return $this->belongsTo(AssuranceAnimal::class, 'assuranceAnimal_id');
    }

    public function AssureAnimal(){
        return $this->hasMany(AssureAnimal::class);
    }
}
