<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureAnimal extends Model
{
    use HasFactory;

    public function gestionnaire () {
        return $this->belongsTo(User::class);
    }

    public function ContratAA () {
        return $this->belongsTo(ContratAnimal::class, 'contratAnimal_id');
    }
}
