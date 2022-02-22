<?php

namespace Database\Seeders;

use CreateLoaithucungTable;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            LoaisanphamSeeder::class,
            LoaithucungSeeder::class,
            GiongthucungSeeder::class,
            ThucungSeeder::class,
            LoaivatdungSeeder::class,
            VatdungSeeder::class,
     
           
            HinhanhthucungSeeder::class,
            HinhanhvatdungSeeder::class,
            SlideSeeder::class,
           
        ]);
    }
}
