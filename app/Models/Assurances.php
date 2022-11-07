<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurances extends Model
{
    use HasFactory;
    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function typeassurance(){
        return $this->belongsTo(AssurancesType::class , 'type');
    }

    public function AssureP () {
        return $this->hasMany(AssurePersonne::class);
    }

    public function contrats() {
        return $this->hasMany(Contrats::class, 'assurance_id');
    }

}
