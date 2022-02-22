<?php

namespace App\Http\Controllers;

use App\Models\CTHDthucung;
use App\Models\CTHDvatdung;
use App\Models\Giongthucung;
use App\Models\Loaisanpham;
use App\Models\Loaithucung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\Thucung;
use App\Models\Vatdung;
use App\Models\Hoadon;
use App\Models\Slide;
use App\Models\User;
use Laravel\Ui\Presets\React;
use PHPUnit\Util\Json;

class FrontendController extends Controller
{
    public function home(){
        $slide = Slide::get(['maslide','hinhanh']);
        $petList = Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select(['hinhanh','mathucung'])->where('anhdaidien',1);
                },
                'giongthucung'=> function ($query) {
                    $query->select(['magiongthucung','tengiongthucung']);
                }
            ]
        )
        ->take(9)
        // ->orderBy('mathucung', 'desc')
        ->get(['mathucung','tieude','slug','magiongthucung','giaban']);
        $itemList = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select(['hinhanh','mavatdung'])->where('anhdaidien',1);
                },
                'loaivatdung'=> function ($query) {
                    $query->select(['tenloaivatdung','maloaivatdung']);
                },
                
            ]
        )->take(9)->get(['mavatdung','maloaivatdung','tieude','slug','giaban']);
        // dd($carousel);
        
        // return view('test',['slide'=>$slide,'petList'=>$petList,'itemList'=>$itemList]);
        return view('frontend.index',compact('petList','itemList','slide'));
    }
    

    public function userProfile(){
        return view('frontend.profile');
    }
    public function updateProfile(Request $request){
        User::where('id',$request->id)->update(
            [
                'name' => $request->name,
                'sodienthoai' =>$request->sodienthoai,
                'taikhoan' =>$request->taikhoan,
            ]
            );
            return redirect()->route('home');
    }

    public function cart()
    {
        // $this->totalPriceCart();
       return view('frontend.cart');
    }
    public function addToCartPet($id){
        // session()->forget('cart');
        $pet =Thucung::with(
            [
                'hinhanhthucung'=> function ($query) {
                    $query->select('hinhanh','mathucung')->where('anhdaidien',1);
                },
                'giongthucung'=> function ($query) {
                    $query->select('magiongthucung','tengiongthucung');
                }
            ]
        )->where('mathucung',$id)->first(['mathucung','magiongthucung','giaban','slug']);
        $typePet = Giongthucung::with('loaithucung')->where('magiongthucung',$pet->magiongthucung)->first();
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            //thông báo đã chọn
        }
        else{
            $cart['thucung'][$id] = [
                "tenloaithucung" => $typePet->loaithucung->tenloaithucung,
                "slug"           =>$pet->slug,
                "tengiongthucung" => $pet->giongthucung->tengiongthucung,
                "hinhanh"        => $pet->hinhanhthucung[0]->hinhanh,
                "giaban"         => $pet->giaban,
            ];
        }
        session()->put('cart',$cart);
        $this->totalPriceCart();
        echo "<pre>";
        print_r(session('cart'));

    }
    public function delToCart($type,$id)
    {
        $product = session('cart');
        unset($product[$type][$id]);
        session()->put('cart',$product);
        $this->totalPriceCart();


    }
    public function addToCartItem(Request $request){
        $data = $_POST['data'];
        $id = $data['id'];
        $quantity =$data['quantity'];
        $item = Vatdung::with(
            [
                'hinhanhvatdung'=> function ($query) {
                    $query->select('hinhanh','mavatdung')->where('anhdaidien',1);
                },
                'loaivatdung'=> function ($query) {
                    $query->select('tenloaivatdung','maloaivatdung');
                },
                
            ]
        )->where('mavatdung',$id)->first(['mavatdung','maloaivatdung','tenvatdung','giaban','slug']);
        $cart = session()->get('cart');
        if(isset($cart['vatdung'][$id])){
            $cart['vatdung'][$id]['soluong'] = $cart['vatdung'][$id]['soluong'] + $quantity;
            // dd(isset($cart['vatdung'][$id]));
        }
        else{
            $cart['vatdung'][$id] = [
                "tenloaivatdung" => $item->loaivatdung->tenloaivatdung,
                "slug"           =>$item->slug,
                "tenvatdung"     => $item->tenvatdung,
                "hinhanh"        => $item->hinhanhvatdung[0]->hinhanh,
                "soluong"         => $quantity,
                "giaban"         => $item->giaban,
            ];
        }
        session()->put('cart',$cart);
        $this->totalPriceCart();
        // echo "<pre>";
        // print_r(session('cart'));
    }
    public function totalPriceCart(){
        session()->forget('totalPrice');
        $cart = session('cart');
        $totalPricePet = 0;
        $totalPriceItem = 0;
        if($cart != Null){
            if(isset($cart['thucung'])){
                if($cart['thucung'] != null)
                foreach($cart['thucung'] as $value){
                    $totalPricePet += $value['giaban'];
                }
            }
            if(isset($cart['vatdung'])){
                if($cart['vatdung']!=null)
                foreach($cart['vatdung'] as $value){
                    $totalPriceItem  += $value['giaban']*$value['soluong'];
                }
            }
        }

        $totalPrice['thucung'] = $totalPricePet;
        $totalPrice['vatdung'] =$totalPriceItem;
        $totalPrice['tong'] = $totalPricePet +$totalPriceItem;
        session()->put('totalPrice' , $totalPrice);
        return json_encode($totalPrice);
        
    }
    protected function createBill()
    {
        return Hoadon::insertGetId([
            'idUser' => Auth::id(),
            'tongtien' =>session('totalPrice')['tong'],
            'ngaytaohoadon' =>date('Y-m-d h:m:s'),
            'trangthaithanhtoan'=>1,
        ]);
    }
    protected function createInvoiceDetailsPet($idBill){
        $listCart = session('cart')['thucung'] ;
        if(isset($listCart) and $listCart != null){
            foreach($listCart as $value){
                CTHDthucung::insert([
                    'mahoadon'       =>$idBill,
                    'tenloaithucung' => $value['tenloaithucung'],
                    'tengiongthucung' => $value['tengiongthucung'],
                    'giaban'         => $value['giaban'],
                    'hinhanh'        => $value['hinhanh'],
                ]);
            }
        }
        return;
    }
    protected function createInvoiceDetailsItem($idBill){
        $listCart = session('cart')['vatdung'] ;
        if(isset($listCart) and $listCart!=null){
            foreach($listCart as $value){
                CTHDvatdung::insert([
                    'mahoadon'       =>$idBill,
                    'tenloaivatdung' => $value['tenloaivatdung'],
                    'tenvatdung'     => $value['tenvatdung'],
                    'giaban'         => $value['giaban'],
                    'soluong'        => $value['soluong'],
                    'hinhanh'        => $value['hinhanh'],
                ]);
            }
        }
        return;
    }
    
    public function paymentSuccess()
    {   
        $idBill=$this->createBill();
        $this->createInvoiceDetailsPet($idBill);
        $this->createInvoiceDetailsItem($idBill);
        session()->forget('cart');
        session()->forget('totalPrice');
    }
}
