@extends('frontend.master2') 
@section('main')
<div class="product">
  {{-- <h2 class="title">Thú cưng</h2> --}}
  <div class="product-list">
    @foreach ( $petList as $item)
    <div class="box">
      <a href="{{route('detailPet',['slug'=>$item->slug])}}" class="box-img">
        {{-- {{dd($petList)}} --}}
        <img src="{{asset($item->hinhanhthucung[0]->hinhanh)}}" alt="" class="product-img" />
      </a>
      <div class="box-text">
        <p class="product-type">{{$item->giongthucung->tengiongthucung}}</p>
        <a href="{{route('detailPet',['slug'=>$item->slug])}}" class="product-name">
          {{$item['tieude']}}
        </a>
        <div class="price">Giá: <span>{{$item['giaban']}} đ</span></div>
      </div>
    </div>
    @endforeach
    {{$petList->links()}}
    {{-- {{dd($petList)}} --}}
  </div>
</div>
<div class="carousel-contain">
  <h2 class="title">thú cưng</h2>
  <div class="carousel">
    @foreach ( $carouselPet as $item)
      <a href="{{route('petTypeList',['namePetType'=>$item->slug])}}" class="carousel-item">
        <img src="{{asset($item['hinhanh'])}}" alt="" />
        <p>{{$item['tenloaithucung']}}</p>
      </a>
    @endforeach
    </div>
</div>
<div class="carousel-contain">
  <h2 class="title">phụ kiện thú cưng</h2>
  <div class="carousel">
    @foreach ( $carouselItem as $item)
      <a href="{{route('itemTypeList',['nameItemType'=>$item->slug])}}" class="carousel-item">
        <img src="{{asset($item['hinhanh'])}}" alt="" />
        <p>{{$item['tenloaivatdung']}}</p>
      </a>
    @endforeach
    </div>
</div>




@endsection