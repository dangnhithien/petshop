
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
                <form method="POST" action="{{url('setDataItem')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Loại thú cưng</label>
                        <select class="form-control " name ='maloaithucung'>
                          @foreach ($typePet as $value)
                          <option value="{{$value->maloaithucung}}">{{$value->tenloaithucung}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Loại vật dụng</label>
                        <select class="form-control" name="maloaivatdung">
                          @foreach ($typeItemList as $value)
                            <option value="{{$value->maloaivatdung}}">{{$value->tenloaivatdung}}</option>
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
                        <input type="text" class="form-control" placeholder="Enter ..." name ="tenvatdung" required>
                      </div>
                    
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name ="tieude" required>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" placeholder="Enter ..."name="giaban" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Nội dung</label>                      
                          <textarea id="summernote" name="noidung" >
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab voluptatem repudiandae recusandae illo molestiae consectetur quaerat, quisquam quidem!
                            Perspiciatis maiores dolorem soluta suscipit error esse placeat eius quasi quisquam eaque?
                          </textarea>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class ="row">
                         <input type="file"  name="images[]" multiple required>
                          <label  for="customFile"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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