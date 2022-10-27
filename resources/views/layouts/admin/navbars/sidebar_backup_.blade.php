<!-- <div id="wrapper_content" class="d-flex flex-fill"> -->
<aside id="aside-main" class="aside-start aside-primary aside-hide-xs d-flex flex-column h-auto">
  <div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
      <div class="container-fluid">
        <!-- Navigation -->

        <!-- <ul class="navbar-nav"> -->
        <ul class="nav flex-column ">
          <li class="nav-item">
            <!-- Brand -->
            <a href="{{ route('home') }}">
                <!-- <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                <img src="{{ asset('assets') }}/img/brand/logo.png"  style="width:160px; margin-top: 5px; margin-bottom:2px;" alt="CMS">
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                  <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
              </a>
          </li>
          <!-- new items -->
          <li class="nav-item">
            <a class="nav-link" href="/category/">
              <i class="fas fa-th"></i>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/topic/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-richtext-fill" viewBox="0 0 16 16">
                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542l1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM5 9h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
              </svg>
              Pages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
                <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z"/>
              </svg>
              Blocks
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/menu/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
              Menus
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-edit fa-fw me-3"></i>
              Forms
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-ajax"href="#">
              <i class="fas fa-image fa-fw me-3"></i>
              templates
            </a>
          </li>
          <li>
            <a class="nav-link js-ajax"href="#">
              <i class="fas fa-plug fa-fw me-3"></i>
              Plugins
            </a>
          </li>
          <!-- End n ew items -->
          <li class="nav-item">
            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
              <i class="fab fa-laravel" style="color: #f4645f;"></i>
              <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
            </a>

            <div class="collapse show" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            {{ __('User profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            {{ __('User Management') }}
                        </a>
                    </li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('icons') }}">
                  <i class="ni ni-planet text-blue"></i>
                  {{ __('Icons') }}
              </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="{{ route('map') }}">
                  <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
              </a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Tables</span>
                </a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                  <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
              </a>
          </li>
          <!-- <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
              <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                  <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
              </a>
          </li> -->
        </ul>
        <!-- Divider -->
        <!-- <hr class="my-3"> -->
        <!-- Heading -->
        <!-- <h6 class="navbar-heading text-muted">Documentation</h6> -->
        <!-- Navigation -->
        <!-- <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                    <i class="ni ni-spaceship"></i> Getting started
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                    <i class="ni ni-palette"></i> Foundation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                    <i class="ni ni-ui-04"></i> Components
                </a>
            </li>
        </ul> -->
      </div>
    </nav>
  </div>
</aside>
