<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'carteIdentiteRecto',
        'carteIdentiteVerso',
        'carteGriseRecto',
        'carteGriseVerso',
        'permisRecto',
        'permisVerso',
        'releveInformation',
        'pv',
        'rib',
        'copieJugement',
        'visiteMedicale',

        'certificatCession',
        'carteVitale',
        'carteMutuelRecto',
        'carteMutuelVerso',
        'attestationSecuriteSociale',

        'carteProfesionnelleRecto',
        'carteProfesionnelleVerso',
        'K-Bis',

        'status_id',
        'client_id',
        'situation_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function guest(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function situation(){
        return $this->belongsTo(Situation::class);
    }
}
