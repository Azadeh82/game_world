<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gammes')->insert([
            'nom' => 'Jouet électronique',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Peluche',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Jeux de societé',
        ]);
    }
}
