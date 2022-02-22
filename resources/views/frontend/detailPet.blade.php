@extends('frontend.master1') 
@section('css')
<link rel="stylesheet" href="{{asset('/frontend/css/detail.css')}}" />
<meta name="csrf" content="{{ csrf_token() }}"> 
@endsection
@section('main')
<div class="product-container" id="pet">
  <div class="product-warp">
    <div class="procduct-gallery">
      <div class="slider-for">
            @foreach ($pet->hinhanhthucung as $value)
              <img src="{{asset($value->hinhanh)}}" alt="" />
            @endforeach
      </div>
      <div class="slider-nav">
            @foreach ($pet->hinhanhthucung as $value)
              <img src="{{asset($value->hinhanh)}}" alt="" />
            @endforeach
      </div>
    </div>
    <div class="content">
      {{-- <div class="breadcrumb">Trang chủ/ thú cưng/ hamter</div> --}}
      <div class="product-name">
            {{$pet->tieude}}
      </div>
      <div class="price"><span>Giá: </span>
            {{$pet->giaban}}
      <span>Đ</span></div>
      <div class="product-content">
        <p>
            {{$pet->noidung}}
        </p>
      </div>
      
      <div class="pay">
        <a href="#" 
        class="add-to-cart"
        data-url = "{{route('add-to-cart-pet',['id'=>$pet->mathucung])}}"
        >thêm vào giỏ</a>
      </div>

    </div>
  </div>
</div>
  <div class="carousel-contain">
    <h2 class="title">liên quan</h2>
    <div class="carousel">
      @foreach ( $relevant as $value )
        <a href="{{route('petBreedList',['namePetType'=>$value->loaithucung->slug,'namePetBreed'=>$value->slug])}}" class="carousel-item">
          <img src="{{asset($value->hinhanh)}}" alt="" />
          <p>{{$value->tengiongthucung}}</p>
        </a>
      @endforeach
        
      </div>
</div>
@endsection
@section('script')
<script> 
  function addToCart(event){
   event.preventDefault();
   let urlAddCart = $(this).data('url');
   $.ajax({
     type: 'GET',
     url: urlAddCart,
     success: function(data){
      alert('thêm thành công')
     },
     error: function(){
      window.location='{{route('login')}}';
     }
   })
  }
  $(function(){
    $('.add-to-cart').on('click',addToCart)
  })

</script>
@endsection