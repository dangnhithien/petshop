
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
                <form method="POST" action="{{url('setDataPet')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Loại thú cưng</label>
                        <select class="form-control " name ='maloaithucung' id="type-pet" >
                          @foreach ($typePet as $value)
                          <option value="{{$value->maloaithucung}}">{{$value->tenloaithucung}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                      <!-- /.form-group -->
                      <div class="col-md-6">
                        <div class="form-group" id="breed-pet">
                          {{-- <label>Giống thú cưng</label>
                          @if (session()->has('giongthucung'))
                          <select class="form-control " name="magiongthucung" >
                            @foreach (session('giongthucung') as $value)
                            <option value="{{$value['magiongthucung']}}">{{$value['tengiongthucung']}}</option> 
                            @endforeach
                            
                          </select>
                          @endif --}}
                        </div>
                        <!-- /.form-group -->
                      </div>
                  </div>
                    
                  
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name='tieude' required>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="giaban" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label>Nội dung</label>                      
                          <textarea id="summernote" name="noidung" style="height: 150px" required>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus vitae nemo quisquam perferendis alias obcaecati repellat consectetur eveniet dolor,
                             nisi porro odit veniam natus asperiores pariatur exercitationem sequi voluptatem quos?
                          </textarea>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- ./row -->
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class ="row">
                         <input type="file"  name="images[]" multiple required>
                          <label  for="customFile"></label>
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
@section('script')
<script>
  function createSelect(data){
    $('<label>').appendTo('#breed-pet').text('Giống thú cưng');
    var sel = $('<select>').appendTo('#breed-pet');
    sel.addClass('form-control');
    sel.attr('name','magiongthucung');
    $(data).each(function() {
    sel.append($("<option>").attr('value',this.magiongthucung).text(this.tengiongthucung));
    });
  }
  function change(){
    let id = $('#type-pet').val();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=csrf]').attr('content')
            }
        });
    $.ajax({
      type: "post",
      url: '{{route('changeBreedPet')}}',
      data: {'idTypePet':id},
      success: function(data) {
        // $('#breed-pet').load(location.href +'#breed-pet');
        // $('#breed-pet').removeClass('d-none');
        data = JSON.parse(data);
        $('#breed-pet').empty();
        createSelect(data);
        // $('#breed-pet').empty();

      },
      error: function() {
        alert('error');
      }
    });
  }
  $(function(){
    $('#type-pet').on('change',change)
  })
 change();
</script>
@endsection