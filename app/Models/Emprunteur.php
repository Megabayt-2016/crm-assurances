<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunteur extends Model
{
    use HasFactory;

    public function client () {
        return $this->belongsTo(Client::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
    public function contratE () {
        return $this->hasMany(ContratEmprunteur::class);
    }
}
