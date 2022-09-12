<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssurancePersonne extends Model
{
    use HasFactory;
    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function AssureP () {
        return $this->hasMany(AssurePersonne::class);
    }

    public function contratAP () {
        return $this->hasMany(ContratPersonne::class);
    }



}
