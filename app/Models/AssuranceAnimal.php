<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssuranceAnimal extends Model
{
    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function AssureA() {
        return $this->hasMany(AssureAnimal::class);
    }

    public function contratAA() {
        return $this->hasMany(ContratAnimal::class);
    }
}
