<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhanhthucungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = 0;
        for ($i = 1; $i < 41; $i++) {
            for ($j = 1; $j < 5; $j++) {
                $img ++;
                if($j == 1){
                    DB::table('hinhanhthucung')->insert(
                        ['mathucung' => $i,
                        'hinhanh' => 'https://picsum.photos/1280/625?random=' . $img,
                        'anhdaidien' => 1,
                        ]
                    );
                }
                    DB::table('hinhanhthucung')->insert(
                        ['mathucung' => $i,
                        'hinhanh' => 'https://picsum.photos/1280/625?random=' . $img,
                        'anhdaidien' => 0,
                        ]
                    );
            }
        }
    }
}
