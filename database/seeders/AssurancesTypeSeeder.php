<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssurancesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assurance_type')->insert([
            ['nom' => 'Complémentaire santé'],
            ['nom' => 'Assurance Auto'],
            ['nom' => 'Assurance Moto'],
            ['nom' => 'Assurance Habitation'],
            ['nom' => 'Assurance Obséque'],
            ['nom' => 'Assurance Animal'],
            ['nom' => 'Responsabilité décès'],
            ['nom' => 'Emprunteur Au cas de décès'],
            ['nom' => 'Emprunteur (PTIA)'],
            ['nom' => 'Emprunteur (ITT)'],
            ['nom' => 'Emprunteur (IPT/IPP)'],
        ]);
    }
}
