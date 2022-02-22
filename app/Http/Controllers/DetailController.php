<?php

namespace App\Http\Controllers;

use App\Models\Giongthucung;
use App\Models\Loaivatdung;
use App\Models\Thucung;
use App\Models\Vatdung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    // chi tiết sản phẩm
    public function detailPet($slug)
    {
        $pet = Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select('hinhanh','mathucung');
                },
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung','maloaithucung');
                },
                // 'loaithucung'=> function ($query) {
                //     $query->select();
                // },

            ]
        )->where('slug',$slug)->first(['mathucung','tieude','slug','giaban','noidung','magiongthucung']);
        // dd(DB::getQueryLog());
        // dd($pet);/
        $relevant = Giongthucung::with(
            [
                'loaithucung'=> function ($query) {
                $query->select('maloaithucung','slug');
                },
            ])
        ->where('maloaithucung',$pet->giongthucung->maloaithucung)->take(5)
        ->get(['magiongthucung','maloaithucung','tengiongthucung','hinhanh','slug']);
        // dd($relevant);
        if(!$pet) abort('404');
        return view('frontend.detailPet',compact('pet','relevant'));
     
    }
    public function detailItem($slug)
    {
        $item = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select('hinhanh','mavatdung');
                },
                
            ]
        )->where('slug',$slug)->first(['mavatdung','maloaivatdung','tieude','slug','giaban','noidung']) ;
        $relevant =Loaivatdung::take(5)->get(['maloaivatdung','tenloaivatdung','hinhanh']);
        // dd($relevant);
        if(!$item) abort('404');
        return view('frontend.detailItem',compact('item','relevant'));
    }
}

