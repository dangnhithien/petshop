<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('slide')->insert(
            [
             'hinhanh' =>  'https://mew.vn/wp-content/uploads/2020/12/banner-trang-chu-1-1024x576.jpg',
             ]
        );
        DB::table('slide')->insert(
            [
             'hinhanh' =>  'https://mew.vn/wp-content/uploads/2020/12/banner-trang-chu-2-1024x576.jpg',
             ]
        );
        DB::table('slide')->insert(
            [
             'hinhanh' =>  'https://mew.vn/wp-content/uploads/2021/03/banner-trang-chu-3-1024x576.jpg',
             ]
        );
       
    
        
    }
}
