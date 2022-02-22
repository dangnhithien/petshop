<?php

namespace App\Http\Controllers;

use App\Models\Giongthucung;
use App\Models\Hinhanhthucung;
use App\Models\Hinhanhvatdung;
use App\Models\Loaivatdung;
use App\Models\Thucung;
use App\Models\User;
use App\Models\Vatdung;
use Dotenv\Validator;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BackendController extends Controller
{
    // giao diện danh sách
    public function listPet(){   
        $petList = Thucung::with(
            [
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung');
                }
            ]
        )->get(['mathucung','tieude','magiongthucung','giaban','ngaydang']);
        return View('backend.pages.listPet',compact('petList'));
    }
    public function listItem(){
        $itemList = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select(['hinhanh','mavatdung'])->where('anhdaidien',1);
                },
                'loaivatdung'=> function ($query) {
                    $query->select('tenloaivatdung','maloaivatdung');
                },
                
            ]
        )->get(['mavatdung','maloaivatdung','tenvatdung','tieude','giaban','ngaydang']);
        return View('backend.pages.listItem',compact('itemList'));
    }
    public function listAccount(){
        $userList = User::where('isadmin',0)->get(['id','name','email','sodienthoai','hoatdong']);
        return View('backend.pages.listAccount',compact('userList'));
    }

    //giao diện thêm sản phẩm
    public function addPet(){   
        return View('backend.pages.addPet');
    }
    public function changeBreedPet(){
        $id = $_POST['idTypePet'];
        $breedPet = Giongthucung::where('maloaithucung',$id)->get(['magiongthucung','tengiongthucung'])->toArray();
        // session()->forget('giongthucung');
        // session()->put('giongthucung',$breedPet);
        // echo "<pre>";
        // print_r(session('giongthucung'));
        return json_encode($breedPet);
        

    }
    public function addItem(){
        $typeItemList = Loaivatdung::get(['maloaivatdung','tenloaivatdung']);
        return View('backend.pages.addItem',compact('typeItemList'));
    }

    //thêm sản phẩm là thú cưng
    public function setDataPet(Request $request){
        // dd($request->all());
       $data = Thucung::insertGetId([
            'magiongthucung' => $request->magiongthucung,
            'tieude'         => $request->tieude,
            'slug'           => '',
            'noidung'        => $request->noidung,
            'giaban'         => $request->giaban,
            'ngaydang'       => date('Y-m-d h:m:s')
        ]);
        Thucung::where('mathucung',$data)->update([
            'slug'=>Str::slug($request->tieude.$data)
        ]);
        $this->storePet($request,$data);


        return back();

    }
    public function storePet(request $request,$idPet) {
        $anhdaidien = 1;
        // dd($request->hasfile('images'));
        if($request->hasfile('images'))
        {
            // dd($request->images);
           
            foreach($request->file('images') as $file)
            {
                
                $imgPet = new Hinhanhthucung();
                $extenstion = $file->getClientOriginalName();
                $filename = time().'.'.$extenstion;
                $file->move('frontend/images', $filename);
                $imgPet->hinhanh = 'frontend/images/'.$filename;
                $imgPet->anhdaidien = $anhdaidien;
                $anhdaidien =0;
                $imgPet->mathucung = $idPet;
                $imgPet->save();
                unset($imgPet);
            }
            
         }
    }
    
    //thêm sản phẩm la phụ kiện
    public function setDataItem(Request $request){
        // dd($request->all());
        $data=Vatdung::insertGetId([
            'maloaivatdung'  => $request->maloaivatdung,
            'maloaithucung'  => $request->maloaithucung,
            'tieude'         => $request->tieude,
            'tenvatdung'     => $request->tenvatdung,
            'slug'           => Str::slug($request->tieude),
            'noidung'        => $request->noidung,
            'giaban'         => $request->giaban,
            'ngaydang'       => date('Y-m-d h:m:s')
        ]);
        Vatdung::where('mavatdung',$data)->update([
            'slug'=>Str::slug($request->tieude.$data)
        ]);
        $this->storeItem($request,$data);
        return back();
    }
    public function storeItem(request $request,$idItem) {
        $anhdaidien = 1;
        if($request->hasfile('images'))
        {
            
            foreach($request->file('images') as $file)
            {
                // dd($file);
                $imgItem= new Hinhanhvatdung();
                $extenstion = $file->getClientOriginalName();
                $filename = time().'.'.$extenstion;
                $file->move('frontend/images', $filename);
                $imgItem->hinhanh = 'frontend/images/'.$filename;
                $imgItem->anhdaidien = $anhdaidien;
                $anhdaidien =0;
                $imgItem->mavatdung = $idItem;
                $imgItem->save();
            }
            
         }

        return;
    }

    //xóa sản phẩm
    public function deletePet(request $request){
       return Thucung::where('mathucung',$request->mathucung)->delete()?back():back();
    }
    public function deleteItem(request $request){
       return Vatdung::where('mavatdung',$request->mavatdung)->delete()?back():back();
    }

    // thay đổi hoạt động của tài khoản
    public function disableAccount(request $request){
       return User::where('id',$request->id)->update(['hoatdong'=>0])?back():back();
    }
    public function enableAccount(request $request){
       return User::where('id',$request->id)->update(['hoatdong'=>1])?back():back();
    }

    //sửa sản phẩm là thú cưng
    public function updatePet(request $request){
        $breedPet = Giongthucung::get(['magiongthucung','tengiongthucung']);
        $update = Thucung::where('mathucung',$request->mathucung)
                ->first();
        return View('backend.pages.updatePet',compact('breedPet','update'));
    }
    public function updateDataPet(Request $request){
        // dd($request->all());
        Thucung::where('mathucung',$request->mathucung)->update([
            'magiongthucung' => $request->magiongthucung,
            'tieude'         => $request->tieude,
            'slug'           => Str::slug($request->tieude),
            'noidung'        => $request->noidung,
            'giaban'         => $request->giaban,
            'ngaydang'       => date('Y-m-d h:m:s')
        ]);
        return redirect()->route('backend.pages.listPet');

    }

    // sửa sản phẩm là phụ kiện
    public function updateItem(request $request)
    {
        $update = Vatdung::where('mavatdung',$request->mavatdung)
                ->first();
        return View('backend.pages.updateItem',compact('update'));
    }
    public function updateDataItem(Request $request){
       
        Vatdung::where('mavatdung',$request->mavatdung)->update([
                'maloaivatdung'  => $request->maloaivatdung,
                'maloaithucung'  => $request->maloaithucung,
                'tieude'         => $request->tieude,
                'tenvatdung'     => $request->tenvatdung,
                'slug'           => Str::slug($request->tieude),
                'noidung'        => $request->noidung,
                'giaban'         => $request->giaban,
                'ngaydang'       => date('Y-m-d h:m:s')
            ]);
           
        return redirect()->route('backend.pages.listItem');

    }

}

