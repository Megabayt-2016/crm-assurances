<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratPersonne extends Model
{
    use HasFactory;

    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function AssurancePersonne () {
        return $this->belongsTo(AssurancePersonne::class, 'assurancePersonne_id');
    }

    public function AssurePersonne(){
        return $this->hasMany(AssurePersonne::class);
    }



}
