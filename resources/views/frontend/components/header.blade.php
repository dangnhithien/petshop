<div id="site-header">
    <div class="top-bar">
      <img class="logo" src="{{asset('/frontend/images/logo.png')}}" alt="" />
      @if (Auth::user() != null)
      <div class="logged">
        <div  class="icon">
          <i class="fas fa-user"></i>
        </div>
        <span>{{Auth::user()->name}}</span>
        <div class="submenu">
          <ul >
            <li><a href="{{route('profile')}}">Quản lí thông tin</a></li>
            @if(Auth::user()->isadmin == 1)
              <li><a href="{{route('dashboard')}}">Trang quản trị</a></li>
            @endif
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>

            </li>
          </ul>
        </div>
      </div>
      @else
        <nav>
          {{-- <ul class="nav-links">
            <li><a href="">contact us</a></li>
            <li><a href="">mail</a></li>
          </ul> --}}
        </nav>
        <a href="{{route('login')}}" class="singup">
          <button>Đăng nhập</button>
        </a>
      @endif
    </div>
  </div>
<div class="navbars">
    <nav>
      <ul class="nav-links">
        <li><a href="{{route('home')}}" class="menu-item">Trang chủ</a></li>
        <li>
          <a href="{{route('pet')}}" class="menu-item">
            <span>Thú cưng</span>
            {{-- <i class="fas fa-angle-down"></i> --}}
          </a>
          {{-- <ul class="sub-menu">
            <ul class="col">
              <li><a href="">cửa hàng</a></li>
              <li><a href="">Chó cảnh</a></li>
              <li>
                <a href=""> Mèo cảnh</a>
              </li>
              <li><a href="">Chuột cảnh</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
            <ul class="col">
              <li><a href="">mua nhiều</a></li>
              <li><a href="">Chó cảnh</a></li>
              <li><a href="">Mèo cảnh</a></li>
              <li><a href="">Chuột cảnh</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
            <ul class="col">
              <li><a href="">sản phẩm mới</a></li>
              <li>
                <a href="">Chó cảnh</a>
              </li>
              <li><a href="">Mèo cảnh</a></li>
              <li><a href="">Chuột cảnh</a></li>
              <li>
                <a href="">Bò sát</a>
              </li>
              <li><a href="">Bò sát</a></li>
              <li><a href="">Bò sát</a></li>
              <li><a href="">Bò sát</a></li>
              <li><a href="">Bò sát</a></li>
              <li><a href="">Bò sát</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
          </ul> --}}
        </li>
        <li>
          <a href="{{route('item')}}" class="menu-item">
            <span>Phụ kiện</span>
            {{-- <i class="fas fa-angle-down"></i> --}}
          </a>
          {{-- <ul class="sub-menu">
            <ul class="col">
              <li><a href="">shop</a></li>
              <li><a href="">Chó cảnh</a></li>
              <li><a href="">Mèo cảnh</a></li>
              <li><a href="">Chuột cảnh</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
            <ul class="col">
              <li><a href="">shop</a></li>
              <li><a href="">Chó cảnh</a></li>
              <li><a href="">Mèo cảnh</a></li>
              <li><a href="">Chuột cảnh</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
            <ul class="col">
              <li><a href="">shop</a></li>
              <li><a href="">Chó cảnh</a></li>
              <li><a href="">Mèo cảnh</a></li>
              <li><a href="">Chuột cảnh</a></li>
              <li><a href="">Bò sát</a></li>
            </ul>
          </ul> --}}
        </li>
        {{-- <li><a href="" class="menu-item">Bài viết</a></li> --}}
        <li><a href="" class="menu-item">Liên hệ</a></li>
      </ul>
    </nav>
    <div class="search">
      <input type="search" placeholder="search" />
      <a href=""><i class="fas fa-search"></i></a>
    </div>
  </div>