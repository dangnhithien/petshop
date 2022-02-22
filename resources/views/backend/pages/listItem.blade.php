@extends('backend.master') 
@section('main')
<!-- --------------------------------------------------------Thien---------------------------------------------------------- -->
<!-- Main content -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách phụ kiện</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Tiêu đề</th>
                  <th>Tên vật dụng</th>
                  <th>Giá bán </th>
                  <th>Loại</th>
                  <th>Ngày đăng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ( $itemList as $value)
                  <tr>
                    <td>{{$value->mavatdung}}</td>
                    <td>{{$value->tieude}}</td>
                    <td>{{$value->tenvatdung}}</td>
                    <td>{{$value->giaban}}</td>
                    <td>{{$value->loaivatdung->tenloaivatdung}}</td>
                    <td>{{$value->ngaydang}}</td>
                    <td>
                      <div class="row">
                        <div class="col-md-4">
                          <form action="{{route('backend.deleteItem')}}" class ="card-body " method="POST">
                            @csrf
                            <button type="submit" class="sumary btn btn-outline-danger" name="mavatdung" value="{{$value->mavatdung}}">xóa</button>
                          </form>

                        </div>
                        <div class="col-md-4">
                          <form action="{{route('backend.updateItem')}}" class ="card-body " method="POST">
                            @csrf
                            <button type="submit" class="sumary btn btn-outline-info" name="mavatdung" value="{{$value->mavatdung}}">sửa</button>
                          </form>

                        </div>

                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
 
@endsection