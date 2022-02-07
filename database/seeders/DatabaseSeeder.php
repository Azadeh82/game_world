<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            GammeSeeder::class,
            ArticleSeeder::class,
            PromotionSeeder::class,
            PromotionArticlesSeeder::class,
        ]);
    }
}
