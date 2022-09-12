<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situations')->insert([
            ['nom' => 'Auto. Risque simple'],
            ['nom' => 'Auto. Risque agravé'],
            ['nom' => 'Auto. Jeune conducteur'],
            ['nom' => 'Auto. VTC (Risque professionnel)'],
            ['nom' => 'Santé. Mutuel'],
        ]);
    }
}
