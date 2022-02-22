
@extends('backend.master') 
@section('main')
    <!-- Main content -->
    <section class="content">

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Thú cưng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{url('updateDataPet')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <!-- /.form-group -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Giống thú cưng</label>
                          <select class="form-control " name="magiongthucung" >
                            @foreach ( $breedPet as $value)
                                @if ($value->magiongthucung == $update->magiongthucung)
                                    <option value="{{$value->magiongthucung}}" selected>{{$value->tengiongthucung}}</option> 
                                @else
                                    <option value="{{$value->magiongthucung}}">{{$value->tengiongthucung}}</option> 
                                @endif     
                            @endforeach
                            
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div>
                  </div>
                    
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name='tieude' required value="{{$update->tieude}}">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="giaban" required value="{{$update->giaban}}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Nội dung</label>                      
                          <textarea id="summernote" name="noidung" required>
                            {{$update->noidung}}
                          </textarea>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                  
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class ="row">
                         <input type="file"  name="images[]" multiple>
                          <label  for="customFile"></label>
                        </div>
                      </div>

                    </div> --}}
                  
                  <div class="row">
                    <div class="card-footer">
                      <button type="submit" 
                      class="btn btn-primary" 
                      name="mathucung" 
                      value="{{$update->mathucung}}">
                      Submit
                    </button>
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