<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ThucungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 40; $i++) {
            $date = date('Y-m-d h:m:s');
            DB::table('thucung')->insert(
                ['magiongthucung' =>  random_int(1,16),
                'tieude' => 'thu cung dành cho bạn ',
                'slug' => Str::slug('thu cung dành cho bạn'.$i),
                'noidung' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ad, necessitatibus inventore quod tempore alias dolore quidem enim! Labore, aspernatur? Consectetur corporis dolores laboriosam ducimus, quos sapiente quibusdam tenetur provident!',
                'giaban' => 100000,
                'ngaydang' => $date,
                 ]
            );
        }
    }
}
