<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaisanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaisanpham')->insert(
            [
             'tenloaisanpham' =>  'thú cưng',
             ]
        );
        DB::table('loaisanpham')->insert(
            [
             'tenloaisanpham' =>  'vật dụng',
             ]
        );
    }
}
