<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Notif extends Model
{
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['message',
                            'user_id',
                            'EmailClient'
                        ];
}
