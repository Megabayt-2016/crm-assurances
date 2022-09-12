<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratEmprunteur extends Model
{
    use HasFactory;
    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function Emprunteur () {
        return $this->belongsTo(Emprunteur::class, 'emprunteur_id');
    }
    
}
