@extends('frontend.master1') 
@section('css')
<link rel="stylesheet" href="{{asset('/frontend/css/detail.css')}}" />
<meta name="csrf" content="{{ csrf_token() }}"> 
@endsection
@section('main')
<div class="product-container">
  <div class="product-warp">
    <div class="procduct-gallery">
      <div class="slider-for">
        
            @foreach ($item->hinhanhvatdung as $value)
              <img src="{{asset($value->hinhanh)}}" alt="" />
            @endforeach
        
      </div>
      <div class="slider-nav">
        
            @foreach ($item->hinhanhvatdung as $value)
              <img src="{{asset($value->hinhanh)}}" alt="" />
            @endforeach
        
      </div>
    </div>
    <div class="content">
      {{-- <div class="breadcrumb">Trang chủ/ thú cưng/ hamter</div> --}}
      <div class="product-name">
        
          {{$item->tieude}}
       
      </div>
      <div class="price"><span>Giá: </span>
          
            {{$item->giaban}}
          
      <span>Đ</span></div>
      <div class="product-content">
        <p>
          
            {{$item->noidung}}
       
        </p>
      </div>
     
      <div class="pay">
        <a href="#" 
        class="add-to-cart"
        {{-- data-url = "{{route('add-to-cart-item',['id'=>$item->mavatdung])}}" --}}
        >thêm vào giỏ</a>
        <input type="hidden" id="id-item" value="{{$item->mavatdung}}">
        <div class="quantity">
          <span class="input-number-decrement">–</span>
          <input class="input-number" type="text" id="quantity" value="1" min="1" max="30">
          <span class="input-number-increment">+</span>
        </div>
      </div>
    
    </div>
  </div>
</div>
  <div class="carousel-contain">
    <h2 class="title">liên quan</h2>
    <div class="carousel">
   
    @foreach ( $relevant as $value )
        <a href="" class="carousel-item">
          <img src="{{asset($value->hinhanh)}}" alt="" />
          <p>{{$value->tenloaivatdung}}</p>
        </a>
      @endforeach
    
        
      </div>
</div>
@endsection
@section('script')
<script> 
  function addToCart(event){
    var data = {
      id: $('#id-item').val(),
      quantity: $('#quantity').val()
    }
    console.log(data);
   event.preventDefault();
  //  let urlAddCart = $(this).data('url');
  $(document).ready(()=>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name=csrf]').attr('content')
            }
        });

        $.ajax({
     type: 'POST',
     url: '{{route('add-to-cart-item')}}',
     data: {'data': data},
     success: function(data){
      alert('thêm thành công')
     },
     error: function(){
      window.location='{{route('login')}}';
     }
    })
   })
  }
  $(function(){
    $('.add-to-cart').on('click',addToCart)
  })
</script>
@endsection