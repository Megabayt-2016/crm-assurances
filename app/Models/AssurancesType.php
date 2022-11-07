<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssurancesType extends Model
{
    use HasFactory;
    protected $table = 'assurance_type';
    protected $fillable = [
        'nom',
    ];

}
