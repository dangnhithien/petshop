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
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
      />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous">


        <link rel="stylesheet" href="{{asset('/frontend/css/header.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/menu.css') }}"/>
        <link rel="stylesheet" href="{{asset('/frontend/css/footer.css')}}" />
        <link rel="stylesheet" href="{{asset('/frontend/css/sidebarUser.css')}}" />
        
        @yield('css')
    </head>
    <body>
       @include('frontend/components.header')
       <main>

         <div class ="main">
            <div class="sidebar">
               <ul>
                  <li><a href="{{route('profile')}}">Hồ sơ</a></li>
                  <li><a href="{{route('cart')}}">Giỏ Hàng</a></li>
                  <li><a href="">Hóa đơn</a></li>
               </ul>
            </div>
            <div class="content w-100 h-100 p-5">
               <div class="wrap col-lg-10">
                  @yield('main')

               </div>
            </div>
         </div>
        <!--  endmain -->
       </main>
       
        @include('frontend/components.footer')

        
      <script src="{{asset('/frontend/js/header.js')}}"></script>
      <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"
        ></script>
        <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
      
    ></script>
        {{-- <script src="{{asset('/frontend/js/sidebarUser.js')}}"></script> --}}
        @yield('script')
        
    </div>
</html>