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
              <h3 class="card-title">Danh sách thú cưng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã</th>
                  <th>Tiêu đề</th>
                  <th>Giá bán </th>
                  <th>Giống</th>
                  <th>Ngày đăng</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ( $petList as $value)
                  <tr>
                    <td>{{$value->mathucung}}</td>
                    <td>{{$value->tieude}}</td>
                    <td>{{$value->giaban}}</td>
                    <td>{{$value->giongthucung->tengiongthucung}}</td>
                    <td>{{$value->ngaydang}}</td>
                    <td>
                      <div class="row" >
                        <div class="col-md-4">

                          <form action="{{route('backend.deletePet')}}" class ="card-body " method="POST">
                            @csrf
                            <button type="submit" class="sumary btn btn-outline-danger" name="mathucung" value="{{$value->mathucung}}">xóa</button>
                          </form>
                        </div>
                          <div class="col-md-4">
                            
                          <form action="{{route('backend.updatePet')}}" class ="card-body " method="POST">
                            @csrf
                            <button type="submit" class="sumary btn btn-outline-info" name="mathucung" value="{{$value->mathucung}}">sửa</button>
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

