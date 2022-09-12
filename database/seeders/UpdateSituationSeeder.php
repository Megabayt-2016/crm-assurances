<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UpdateSituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('situations')->where('nom', 'xAuto. Risque simple')->delete();
        \DB::table('situations')->where('nom', 'xAuto. Risque agravé')->delete();
        \DB::table('situations')->where('nom', 'xAuto. Jeune conducteur')->delete();
        // \DB::table('situations')->where('nom', 'Risque simple')->update(['nom' => 'Auto. Risque simple']);
        // \DB::table('situations')->where('nom', 'Risque agravé')->update(['nom' => 'Auto. Risque agravé']);
        // \DB::table('situations')->where('nom', 'Jeune conducteur')->update(['nom' => 'Auto. Jeune conducteur']);
    }
}
