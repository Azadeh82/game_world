<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::create([
            'nom' => 'Promotions Fevrier',
            'reduction' => 20,
            'date_debut' => '2022-02-07',
            'date_fin' => '2022-02-17',
        ]);

        Promotion::create([
            'nom' => 'Promotions printemps',
            'reduction' => 15,
            'date_debut' => '2022-03-25',
            'date_fin' => '2022-04-05',
        ]);
    }
}
