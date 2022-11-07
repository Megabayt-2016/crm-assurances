<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->insert([
            ['nom' => 'Admin'],
            ['nom' => 'Gestionnaire'],
            ['nom' => 'Agent'],
        ]);
    }
}
