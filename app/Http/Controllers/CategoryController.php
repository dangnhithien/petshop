<?php

namespace App\Http\Controllers;

use App\Models\Giongthucung;
use Illuminate\Http\Request;
use App\Models\Loaithucung;
use App\Models\Thucung;
use App\Models\Vatdung;
use App\Models\Loaivatdung;
use Illuminate\Database\Eloquent\Relations\Relation;

class CategoryController extends Controller
{
    // giao diện sản phẩm
    public function pet(){

        $petList = Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select('hinhanh','mathucung')->where('anhdaidien',1);
                },
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung');
                }
            ]
        )->paginate(9,['mathucung','tieude','slug','magiongthucung','giaban']);
        return view('frontend.pet',compact('petList'));
    }
    public function item(){
        $itemList = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select(['hinhanh','mavatdung'])->where('anhdaidien',1);
                },
                'loaivatdung'=> function ($query) {
                    $query->select(['tenloaivatdung','maloaivatdung']);
                },   
            ]
        )->paginate(9,['mavatdung','maloaivatdung','tieude','slug','giaban']);
        
        // dd($carousel);
        
        // return view('test',['petList'=>$petList,'itemList'=>$itemList]);
        return view('frontend.item',compact('itemList'));
    }

    // trả về theo sidebar
     public function petTypeList(Request $request,$slug){
         $petTypeId = Loaithucung::Where('slug',$slug)->first('maloaithucung');
         if(!$petTypeId) return abort('404');
         $listBreed = Giongthucung::Where('maloaithucung',$petTypeId->maloaithucung)
         ->get('magiongthucung')->toArray();
         // dd($listBreed);
        $petList = Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select('hinhanh','mathucung')->where('anhdaidien',1);
                },
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung');
                }
            ]
        )->whereIn('magiongthucung',$listBreed)->paginate(9,['mathucung','tieude','slug','magiongthucung','giaban']);
        // dd($petList);
        return view('frontend.pet',compact('petList'));
    }
     public function petBreedList(Request $request,$slug,$slug1){

        $breedId = Giongthucung::Where('slug',$slug1)
                        ->first('magiongthucung');
        // dd($listBreed);
        if(!$breedId) return abort('404');
        $petList = Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select('hinhanh','mathucung')->where('anhdaidien',1);
                },
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung');
                }
            ]
        )->where('magiongthucung',$breedId->magiongthucung)->paginate(9,['mathucung','tieude','slug','magiongthucung','giaban']);
        return view('frontend.pet',compact('petList'));
     }
     public function itemTypeList(Request $request,$slug){
        
        $itemTypeId = Loaivatdung::where('slug',$slug)->first('maloaivatdung');
        if(!$itemTypeId) return abort('404');
        $itemList = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select('hinhanh','mavatdung')->where('anhdaidien',1);
                },
                'loaivatdung'=> function ($query) {
                    $query->select('tenloaivatdung','maloaivatdung');
                },   
            ]
        )->where('maloaivatdung',$itemTypeId->maloaivatdung)->paginate(9,['mavatdung','maloaivatdung','tieude','slug','giaban']);
        
        // dd($carousel);
        
        // return view('test',['petList'=>$petList,'itemList'=>$itemList]);
        return view('frontend.item',compact('itemList'));
     }
}
