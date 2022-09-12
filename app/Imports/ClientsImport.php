<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Suppport\Facades\Hash;


use Throwable;

class ClientsImport implements ToModel
{
   
    public function model(array $row)
    {
        return new Client([
            'civilite'=> $row[0],
            'prenom'=> $row[1],
            'nom'=> $row[2],
            'raisonSociale'=>$row[3],
            'adresse'=> $row[4],
            'complementAdresse'=> $row[5],
            'tele'=> $row[6],
            'email'=> $row[7],
            'codePostal'=> $row[8],
            'ville'=> $row[9]
        ]);
    }

    public function onError(Throwable $error){

    }
}
