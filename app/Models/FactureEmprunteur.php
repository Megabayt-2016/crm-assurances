<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureEmprunteur extends Model
{
    use HasFactory;

    public function gestionnaire () {
        return $this->belongsTo(User::class);
    }

    public function ContratE () {
        return $this->belongsTo(ContratEmprunteur::class, 'contratEmprunteur_id');
    }
}
