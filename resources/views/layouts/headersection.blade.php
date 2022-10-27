<div class="container-fluid col-12" style="padding: 0 0 0 0;margin-left: 0px;margin-right: 0px;">
  <div class="col-12" style="height: 1px; background-color:#99C83C;">&nbsp;</div>
  <div class="container-fluid col-12 d-flex flex-nowrap align-items-center justify-content-center justify-content-lg-start element_header">
    <div class="col-6 row align-items-center">
      <div class="col element_header_contents_text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </svg>
        Begin direct met oefenen!
      </div>
      <div class="col element_header_contents_text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </svg>Slaag ook in één keer!
      </div>
    </div>
    <div class="col-4">&nbsp;</div>
    <div class="col-2">
      <div class="align-items-end" style="text-align: left; " >
        <u class="navbar-nav flex-row flex-wrap ms-md-auto " style="text-align: left; ">
          <li class="nav-item col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://www.instagram.com/rijschoolwalat/" target="_blank" style="color: #FFFFFF;">
              <i class="fab fa-youtube" ></i>
            </a>
          </li>
          <li class="nav-item col-lg-auto">
            <a  class="nav-link py-2 px-0 px-lg-2" href="https://www.instagram.com/rijschoolwalat/" target="_blank"  style="color: #FFFFFF;">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li class="nav-item col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="https://www.facebook.com/Rijschool-Walat-105341058586963" target="_blank"  style="color: #FFFFFF; "><i class="fab fa-facebook"></i></a>
          </li>
        </u>
      </div>
    </div>
  </div>
  <div class="col-12" style="height: 1px; background-color:#99C83C;">&nbsp;</div>
</div>
<header class="container-fluid d-flex align-items-center navbar navbar-expand-lg navbar-white bd-navbar sticky-top">
    <!-- <div class="col-12 px-3 py-2 ">
      <div class="flex-nowrap">
            <a class="navbar-brand" href="{{ url('/') }}" >
            <img src="{{asset('img/logo.jpg')}}" style="border-width: 0px; border-style: none;" />
          </a>
      </div>
    </div> -->

      <div class="container-fluid align-items-end justify-content-end" style="background-color: transparent;">
        <h1 class="logo me-auto">
          <!-- class="navbar-brand" -->
          <a  href="{{ url('/') }}" >
          <!-- <img src="{{asset('img/logo.jpg')}}" style="border-width: 0px; border-style: none;" /> -->
          <!-- <img src="{{asset('img/logo.webp')}}" style="border-width: 0px; border-style: none;" /> -->
            Rijschool Walat
          </a>
        </h1>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- shadow-sm -->
        <nav class="navbar navbar-expand-md bg-white " style=" width: 100%;">
          <!-- <div class="collapse navbar-collapse align-items-end justify-content-end" id="navbarsExample04" >
            <ul class="" style="text-align: right; justify-content: end;">

            </ul>
          </div> -->
          <!-- <form role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
          </form> -->
            <div class="offcanvas-lg offcanvas-end flex-grow-1 align-items-end justify-content-end" id="navbarSupportedContent" style="background-color: red;">
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav me-auto mb-2 mb-md-0 align-items-end justify-content-end">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                  <ul class="dropdown-menu" aria-labelledby="dropdown04">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>


                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-black" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </nav>
      </div>


</header>
