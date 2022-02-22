
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf" content="{{ csrf_token() }}"> 
        <title>Petshop</title>
        
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />

        <link rel="stylesheet" href="{{asset('/frontend/css/header.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/menu.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/footer.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/slide.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/carousel.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/grid.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/sidebar.css')}}" />

    </head>
    <body>
      @include('frontend/components.header')
          <div class="main">
            <div class="sidebar">
            <h3>danh mục sản phẩm</h3>
            <nav>
              <ul class="nav-links">
                @foreach ($typePet as $value)
                <li class="dorpdown">
                  <a href="{{route('petTypeList',['namePetType'=>$value->slug])}}">
                    {{$value->tenloaithucung}}
                  </a>
                  <i class="fas fa-angle-down"></i>
                  <ul class="drop-content">
                    @foreach ( $value->giongthucung as $v)
                      
                    <li>
                      <a href="{{route('petBreedList',['namePetType'=>$value->slug,'namePetBreed'=>$v->slug])}}">
                        {{$v->tengiongthucung}}
                      </a>
                    </li>
                    @endforeach
                    
                  </ul>
                </li>
                @endforeach
                @foreach ($typeItem as $value)
                <li class="dorpdown">
                  <a href="{{route('itemTypeList',['nameItemType'=>$value->slug])}}">
                    {{$value->tenloaivatdung}}
                  </a>
                </li>
                @endforeach
                
              </ul>
            </nav>
          </div>
          <div class = "main-right">
                  <!--  main -->
              @yield('main')
              <!--  endmain -->
          </div>
          </div>
          @include('frontend/components.footer')

        <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        ></script>

        <script src="{{asset('/frontend/js/slide.js')}}"></script>
        <script src="{{asset('/frontend/js/carousel.js')}}"></script>
        <script src="{{asset('/frontend/js/header.js')}}"></script>
    </body>
</html>