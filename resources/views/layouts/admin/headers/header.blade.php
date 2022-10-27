<header class="navbar navbar-light sticky-top bg-white flex-md-nowrap p-0 shadow" style="white-space: nowrap;">
  <div class="col-12 d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">

    <div class="col-md-3 col-lg-2 me-0 px-3">
          <h1 class="logo me-auto" style="font-size: 50px;">
        <!-- class="navbar-brand" -->
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 " style="font-weight: 700;" href="{{ url('/') }}" >
        <!-- <img src="{{asset('img/logo.jpg')}}" style="border-width: 0px; border-style: none;" /> -->
        <!-- <img src="{{asset('img/logo.webp')}}" style="border-width: 0px; border-style: none;" /> -->
          QuICT CMS
        </a>
      </h1>

  </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md-9 col-lg-10 justify-content-end align-content-end navbar-nav">

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a style="font-size: 16px;" class="p-2 text-dark active" aria-current="page" href="#">Home</a>

        <a style="font-size: 16px;" class="p-2 text-dark" href="/admin/site_settings">Site identity</a>
        <a style="font-size: 16px;" class="p-2 text-dark" href="/admin/setting">Site Theme</a>
        <a style="font-size: 16px;" class="p-2 text-dark" href="/admin/mainmenu">Main Menu</a>
        <a style="font-size: 16px;" class="p-2 text-dark" href="/admin/contact">Contacts</a>
        <a href="{{ route('logout') }}" class="p-2 text-dark" href="/admin/site_settings" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="ni ni-user-run"></i>
          <span>{{ __('Logout') }}</span>
        </a>
      </nav>
    </div>

  </div>


<!-- /TOP NAVIGATION TOGGLER -->
</header>
