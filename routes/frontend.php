<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;

use App\Http\Controllers\BackendController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

// trang chủ
Route::get('/', [FrontendController::class,'home'])->name('home');
// trang sản phẩm là thú cưng
Route::get('/pet', [CategoryController::class,'pet'])->name('pet');
// trang sản phẩm là phụ kiện
Route::get('/item', [CategoryController::class,'item'])->name('item');

// trang chi tiết sản phẩm là thú cưng
Route::get('/detail/pet/{slug}', [DetailController::class,'detailPet'])->name('detailPet');
// trang chi tiết sản phẩm là phụ kiện
Route::get('/detail/item/{slug}', [DetailController::class,'detailItem'])->name('detailItem');

// tìm kiếm sản phẩm thú cưng theo loại
Route::get('/pet/{namePetType}', [CategoryController::class,'petTypeList'])->name('petTypeList');
// tìm kiến sản phẩm phụ kiện theo loại
Route::get('/item/{nameItemType}', [CategoryController::class,'itemTypeList'])->name('itemTypeList');

// tìm kiếm sản phẩm thú cưng theo giống
Route::get('/pet/{namePetType}/{namePetBreed}', [CategoryController::class,'petBreedList'])->name('petBreedList');

Auth::routes();

// sau đăng nhập
Route::middleware(['auth', 'isUser'])->group(function () {
  // giao diện cập nhật thông tin cá nhân
  Route::get('/profile',[FrontendController::class,'userProfile'])->name('profile');
  // cập nhật thông tin cá nhân 
  Route::post('/updateProfile',[FrontendController::class,'updateProfile'])->name('updateProfile');

  // giỏ hàng
  Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
  // thêm sản phẩm là thú cưng vào giỏ hàng
  Route::get('/add-to-cart-pet/{id}',[FrontendController::class,'addToCartPet'])->name('add-to-cart-pet');
  // xóa sản phẩm khỏi giỏ hàng
  Route::get('/del-to-cart/{type}/{id}',[FrontendController::class,'delToCart'])->name('del-to-cart');
  // thêm sản phẩm là phụ kiện vào giỏ hàng
  Route::post('add-to-cart-item',[FrontendController::class,'addTocartItem'])->name('add-to-cart-item');
  // tính tổng tiền của giỏ hàng
  Route::get('/total-price',[FrontendController::class,'totalPriceCart'])->name('total-price');
  // cập nhật lại giỏ hàng sau khi thanh toán thành công
  Route::post('payment-success',[FrontendController::class,'paymentSuccess'])->name('payment-succsess');
});



// admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // trang admin
    Route::get('/admin', function () {
      return view('backend.dashboard');
    })->name('dashboard');
    
    // giao diệndanh sách thú cưng
    Route::get('/listPet', [BackendController::class,'listPet'] )->name('backend.pages.listPet');
    // giao diện danh sách phụ kiện
    Route::get('/listItem', [BackendController::class,'listItem'] )->name('backend.pages.listItem');
    // giao diện danh sách tài khoản
    Route::get('/listAccount', [BackendController::class,'listAccount'] )->name('backend.pages.listAccount');
    // giao thêm sản phẩm là thú cưng
    Route::get('/addPet', [BackendController::class,'addPet'] )->name('backend.pages.addPet');
    // trả về danh sách giống thú cưng
    Route::post('/changeBreedPet', [BackendController::class,'changeBreedPet'] )->name('changeBreedPet');
    // giao thêm phụ kiện
    Route::get('/addItem', [BackendController::class,'addItem'] )->name('backend.pages.addItem');

    // thêm thú cưng 
    Route::post('/setDataPet',[BackendController::class,'setDataPet'])->name('backend.setDataPet');
    // thêm phụ kiện
    Route::post('/setDataItem',[BackendController::class,'setDataItem'])->name('backend.setDataItem');

    // xóa thú cưng
    Route::post('/deletePet',[BackendController::class,'deletePet'])->name('backend.deletePet');
    // xóa phụ kiện
    Route::post('/deleteItem',[BackendController::class,'deleteItem'])->name('backend.deleteItem');

    // khóa tài khoản khách hàng
    Route::post('/disableAccount',[BackendController::class,'disableAccount'])->name('backend.disableAccount');
    // mở lại tài khoản khách hàng
    Route::post('/enableAccount',[BackendController::class,'enableAccount'])->name('backend.enableAccount');

    // giao diện cập nhật thông tin thú cưng
    Route::post('/updatePet',[BackendController::class,'updatePet'])->name('backend.updatePet');
    // cập nhật lại thông tin thú cưng
    Route::post('/updateDataPet',[BackendController::class,'updateDataPet'])->name('backend.updateDataPet');
    
    // giao diện cập nhật thông tin phụ kiện
    Route::post('/updateItem',[BackendController::class,'updateItem'])->name('backend.updateItem');
    // cập nhật lại thông tin phụ kiện
    Route::post('/updateDataItem',[BackendController::class,'updateDataItem'])->name('backend.updateDataItem');
  });

//   Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware(['auth','verified'])->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//   $request->fulfill();

//   return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// use Illuminate\Http\Request;

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');