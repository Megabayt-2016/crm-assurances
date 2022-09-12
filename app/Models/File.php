<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'situation',
        'assurancePersonne_id',
        'permis_conduire_name',
        'permis_conduire_path',
        'carte_grise_name',
        'carte_grise_path',
        'RIB_name',
        'RIB_path',
        'relever_information_name',
        'relever_information_path',
        'copie_jugement_name',
        'copie_jugement_path',
        'document_3F_name',
        'document_3F_path',
        'carte_vitale_name',
        'carte_vitale_path',
        'CIN_name',
        'CIN_path',
        'attestation_droit_name',
        'attestation_droit_path',
        'carte_mutuelle_name',
        'carte_mutuelle_path',
        'CP_CPA_name',
        'CP_CPA_path'
    ];
}
