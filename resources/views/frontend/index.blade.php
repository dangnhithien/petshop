@extends('frontend.master1') 

@section('css')
<link rel="stylesheet" href="{{asset('/frontend/css/banner.css')}}" />
@endsection

@section('main')
<div class="slider-contain">
    <div class="slider">
      @foreach ( $slide as $item)
        
      <div class="slider-item">
          <img src="{{asset($item['hinhanh'])}}" alt="" />
      </div>
      @endforeach
    </div>
</div>
<div class="banner">
    <div class="banner-row">
        <div class="img-item">
            <img src="{{asset('/frontend/images/static1.jpg')}}" alt="" />
        </div>
        <div class="img-item">
            <img src="{{asset('/frontend/images/static2.jpg')}}" alt="" />
        </div>
        <div class="img-item">
            <img src="{{asset('/frontend/images/static3.jpg')}}" alt="" />
        </div>
    </div>
    <div class="banner-row">
        <div class="card-item">
            <img src="{{asset('/frontend/images/static4.png')}}" alt="" />
            <span>Giao hàng toàn quốc</span>
            <p>
                Vận chuyển hàng hoá nhanh chóng và an toàn nhất trên toàn quốc.
            </p>
        </div>
        <div class="card-item">
            <img src="{{asset('/frontend/images/static5.png')}}" alt="" />
            <span>Nhiều ưu đãi</span>
            <p>
                Luôn có nhiều chính sách ưu đãi & khuyến mại cho khách hàng cũ &
                mới.
            </p>
        </div>
        <div class="card-item">
            <img src="{{asset('/frontend/images/static6.png')}}" alt="" />
            <span>Bảo hành & tư vấn</span>
            <p>Chế độ bảo hành đầy đủ và tư vấn chăm sóc miễn phí trọn đời.</p>
        </div>
    </div>

    <div class="section-content">
        <h2>Thú Cưng</h2>
        <p>Người bạn nhỏ nhắn, xinh xắn đáng yêu</p>
    </div>
    
</div>
<div class="carousel-contain">
    <h2 class="title">Thú cưng</h2>
    <div class="carousel">
      @foreach ( $carouselPet as $item)
        <a href="{{route('petTypeList',['namePetType'=>$item->slug])}}" class="carousel-item">
          <img src="{{asset($item['hinhanh'])}}" alt="" />
          <p>{{$item['tenloaithucung']}}</p>
        </a>
      @endforeach
    </div>
</div>
<div class="product">
    <h2 class="title">Thú cưng</h2>
    <div class="product-list">
      @foreach ( $petList as $item)
        <div class="box">
          <a href="{{route('detailPet',['slug'=>$item->slug])}}" class="box-img">
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
      
    </div>
    <a href="{{route('pet')}} " class = 'see-more'>xem thêm</a>
</div>
<div class="product">
    <h2 class="title">Phụ kiện thú cưng</h2>
    <div class="product-list">
      @foreach ( $itemList as $item)
        <div class="box">
          <a href="{{route('detailItem',['slug'=>$item->slug])}}" class="box-img">
            <img src="{{asset($item->hinhanhvatdung[0]->hinhanh)}}" alt="" class="product-img" />
          </a>
          <div class="box-text">
            <p class="product-type">{{$item->loaivatdung->tenloaivatdung}}</p>
            <a href="{{route('detailItem',['slug'=>$item->slug])}}" class="product-name">
              {{$item['tieude']}}
            </a>
            <div class="price">Giá: <span>{{$item['giaban']}} đ</span></div>
          </div>
        </div>
      @endforeach
    </div>
    <a href="{{route('item')}} " class = 'see-more'>xem thêm</a>
</div>

@endsection
