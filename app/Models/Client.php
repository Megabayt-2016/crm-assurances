<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['civilite',
                            'nom',
                            'prenom',
                            'raisonSociale',
                            'adresse',
                            'complementAdresse',
                            'tele',
                            'email',
                            'codePostal',
                            'ville'
    ];
    
    public function situation(){
        return $this->belongsTo(Situation::class);
    }

    public function folder(){
        return $this->hasMany(Folder::class, 'client_id');
    }

}


