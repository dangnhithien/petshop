<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class VatdungSeeder extends Seeder
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
            DB::table('vatdung')->insert(
                ['tenvatdung' => 'vatdung',
                'maloaivatdung' => random_int(1,5),
                'maloaithucung' => random_int(1,4),
                'giaban' => 100000,
                'slug'=>Str::slug('vật dụng dành cho thú cưng'.$i),
                'tieude'=>'vật dụng dành cho thú cưng',
                'noidung' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est maiores sunt vitae laboriosam iusto fugiat ex beatae. Magni eligendi ab accusantium perferendis deserunt? Fugiat explicabo quisquam perspiciatis repellat! Nisi, rem.',
                'ngaydang'=>$date,
                ]
            );
        }
    }
}
