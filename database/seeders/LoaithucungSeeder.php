<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoaithucungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals = ['Chó', 'Mèo','Chuột','Bò sát'];

        for ($i = 0; $i < count($animals); $i++) {
            DB::table('loaithucung')->insert(
                ['maloaisanpham'=> 1,
                 'tenloaithucung' => $animals[$i],
                 'slug' => Str::slug($animals[$i],'-'),
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i]
            );
        }
    }
}
