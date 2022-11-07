<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrats extends Model
{
    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class , 'client_id');
    }

    public function projet() {
        return $this->belongsTo(Assurances::class, 'assurance_id');
    }

    public function gestionnaire(){
        return $this->belongsTo(User::class, 'gestionnaire_id');
    }

    public function factures(){
        return $this->hasMany(Factures::class, 'contrat_id');
    }

}
