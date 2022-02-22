<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoaivatdungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vatdung = ['thức ăn cho mèo',
                    'chuồng nuôi cho mèo',
                     'chuồng nuôi cho chó',
                    'thức ăn cho chó',
                    'thức ăn cho chuột'];
        for ($i = 0; $i < count($vatdung); $i++) {
            DB::table('loaivatdung')->insert(
                ['maloaisanpham'=> 2,
                 'tenloaivatdung' => $vatdung[$i],
                 'slug' => Str::slug($vatdung[$i]),
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i]
            );
        }
    }
}
