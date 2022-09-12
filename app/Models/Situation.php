<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function folder(){
        return $this->hasMany(Folder::class);
    }
    public function guest(){
        return $this->hasMany(Client::class);
    }

}
