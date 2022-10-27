@include('layouts.admin.head')
@auth()
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
@endauth
<body style="width: 100%; margin 0 0 0 0; padding: 0 0 0 0; background-color: #ffffff;">
  @include('layouts.admin.headers.header')


  <div class="container-fluid">
    <div class="row">

        @include('layouts.admin.navbars.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            @yield('content')
        </main>

        <!-- <div id="app">
    </div> -->
    {{-- @include('layouts.footers.guest') --}}
    @guest()
          @include('layouts.admin.footers.guest')
      @endguest
      @auth()
        @include('layouts.admin.footers.auth')
      @endauth

        @stack('js')
      </div>
    </div>
</body>
</html>
