<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GiongthucungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cho = ['beagle','chihuahua','pug','alaska','poodle'];
        $meo = ['ragdoll','munchkin','bengal','american curl','maine coon'];
        $chuot = ['campbell','bear','robo','winter white'];
        $bosat = ['rùa chân đỏ', 'rồng úc'];
        for ($i = 0; $i < 5; $i++) {
            DB::table('giongthucung')->insert(
                ['tengiongthucung' => $cho[$i],
                'slug' => Str::slug($cho[$i]),
                 'maloaithucung' => 1,
                 'mota' => 'chó là một người bạn',
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i,
                 ]
            );
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('giongthucung')->insert(
                ['tengiongthucung' => $meo[$i],
                'slug' => Str::slug( $meo[$i]),
                 'maloaithucung' => 2,
                 'mota' => 'chó là một người bạn',
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i,
                 ]
            );
        }
        for ($i = 0; $i < 4; $i++) {
            DB::table('giongthucung')->insert(
                ['tengiongthucung' => $chuot[$i],
                'slug' => Str::slug( $chuot[$i]),
                 'maloaithucung' => 3,
                 'mota' => 'chó là một người bạn',
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i,
                 ]
            );
        }
        for ($i = 0; $i < 2; $i++) {
            DB::table('giongthucung')->insert(
                ['tengiongthucung' => $bosat[$i],
                'slug' => Str::slug( $bosat[$i]),
                 'maloaithucung' => 4,
                 'mota' => 'chó là một người bạn',
                 'hinhanh' => 'https://picsum.photos/1280/625?random=' . $i,
                 ]
            );
        }
        
    }
}
