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
                  <th>id</th>
                  <th>name</th>
                  <th>email</th>
                  <th>sodienthoai</th>
                  <th>hoatdong</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ( $userList as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->sodienthoai}}</td>
                    <td>{{$value->hoatdong}}</td>
                    <td>
                      @if ($value->hoatdong == 1)
                      <div class="row ">
                        <form action="{{route('backend.disableAccount')}}" class ="card-body " method="POST">
                          @csrf
                          <button type="submit" class="sumary btn btn-outline-danger" name="id" value="{{$value->id}}">disable</button>
                        </form>
                      </div>

                      @elseif($value->hoatdong == 0)
                      <div class="row ">
                        <form action="{{route('backend.enableAccount')}}" class ="card-body " method="POST">
                          @csrf
                          <button type="submit" class="sumary btn btn-outline-success" name="id" value="{{$value->id}}">enable</button>
                        </form>

                      </div>
                      @else

                      @endif
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