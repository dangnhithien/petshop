
@extends('backend.master') 
@section('main')

    <!-- Main content -->
    <section class="content">

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Phụ kiện</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{url('updateDataItem')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Loại thú cưng</label>
                          <select class="form-control " name ='maloaithucung'>
                            @foreach ($typePet as $value)
                            @if($value->maloaithucung== $update->maloaithucung)
                                <option value="{{$value->maloaithucung}}" selected>{{$value->tenloaithucung}}</option>
                            @else
                                <option value="{{$value->maloaithucung}}">{{$value->tenloaithucung}}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Loại vật dụng</label>
                        <select class="form-control" name="maloaivatdung">
                          @foreach ($typeItem as $value)
                            @if ($value->maloaivatdung == $update->maloaivatdung)
                                <option value="{{$value->maloaivatdung}}" selected>{{$value->tenloaivatdung}}</option>
                            @else 
                                <option value="{{$value->maloaivatdung}}">{{$value->tenloaivatdung}}</option>
                            @endif
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                      
                  </div>
                    
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tên vật dụng</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name ="tenvatdung" required value="{{$update->tenvatdung}}">
                      </div>
                    
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name ="tieude" required value="{{$update->tieude}}">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" placeholder="Enter ..."name="giaban" required value="{{$update->giaban}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Nội dung</label>                      
                          <textarea id="summernote" name="noidung" >
                            {{$update->noidung}}
                          </textarea>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                  {{-- <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class ="row">
                         <input type="file"  name="images[]" multiple>
                          <label  for="customFile"></label>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="row">
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="mavatdung" value={{$update->mavatdung}}>Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection