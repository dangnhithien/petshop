@extends('frontend.master3') 
@section('main')
<div class="contain-fluid col-md-6 mx-auto ">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card-header bg-dark text-light ">
                <h4>PROFILE</h4>
            </div>
            <div class="card shadow-lg">
            <div class="card-body">
                    <form method="POST" action="{{route('updateProfile')}} "enctype="multipart/form-data">
                        @csrf
                      <div class="row">
                          <div class="form-group col-md-12">
                            <label for="" class="mt-2">Email</label>
                            <input type="email" class="form-control mt-2" value="{{Auth::user()->email}}" disabled>
                          </div>
                        <div class="form-group col-md-12">
                          <label for="" class ="mt-2">Tên</label>
                          <input type="text" class="form-control mt-2" name= "name" value="{{Auth::user()->name}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="" class="mt-2">Số điện thoại</label>
                          <input type="text" class="form-control mt-2" name="sodienthoai" value="{{Auth::user()->sodienthoai}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputState" class="mt-2">Tài khoản</label>
                            <input type="text" class="form-control mt-2" name="taikhoan" value="{{Auth::user()->taikhoan}}">
                          
                        </div>
                        <div class="col-md-4 ">
                            <button type="submit" class="btn btn-primary mt-2" name="id" value="{{Auth::user()->id}}">Thay đổi</button>
                        </div>
                    </form>
                </div>
            
            </div>
    </div>
</div>
</div>

@endsection