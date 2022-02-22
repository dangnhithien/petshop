<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
      />
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
        <link rel="stylesheet" href="{{asset('/frontend/css/header.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/menu.css') }}"/>
        <link rel="stylesheet" href="{{asset('/frontend/css/footer.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/slide.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/carousel.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/grid.css')}}" />
      @yield('css')
    </head>
    <body>
      @include('frontend/components.header')
        <!--  main -->
          @yield('main')
        <!--  endmain -->
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
        
        @yield('script')

        <script src="{{asset('/frontend/js/slide.js')}}"></script>
        <script src="{{asset('/frontend/js/carousel.js')}}"></script>
        <script src="{{asset('/frontend/js/header.js')}}"></script>
        <script src="{{asset('/frontend/js/detail.js')}}"></script>
        
        
    </body>
</html>