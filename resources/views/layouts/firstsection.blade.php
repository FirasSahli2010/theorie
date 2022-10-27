@if (session('status'))
<section class="d-flex justify-content-center align-items-center">
  <div class="container position-relative aos-init aos-animate" id="firstsec">
    <div class="container justify-content-center">
      <div class="col-md-12">
        <div class="card " style="width: 100%">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            You are normal user.
          </div>

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif

            {{ __('auth.you_are_logged_in') }}, {{ __('messages.welcome') }}
            {{ $date_message }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<section id="hero" class="d-flex justify-content-center align-items-center" style="color: #1A3E73; background-color: transparent;">
  <div class="container position-relative aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
    <h1 style="color: #1A3E73; ">vandaag leren, morgen rijden</h1>
    <h2 style="color: #1A3E73">Veilig en zorgeloos autorijden leren.</h2>
    <p>
      <!-- <i class="ri-command-fill"></i> -->
      <i class="fa-regular fa-w"></i>
      Het halen van een rijbewijs moet volgens Autorijschool Walat financieel mogelijk zijn, daarom heb ik goedkope pakketten samengesteld.
    </p>
    <p>
      <!-- <i class="ri-command-fill"></i> -->
      <i class="fa-regular fa-w"></i>

      Mijn streven is om samen op een prettige, ontspannen manier je rijbewijs te behalen.
    </p>
    <p style="color: #1A3E73; background-color: transparent;">
      <!-- <i class="ri-command-fill"></i> -->
      <i class="fa-regular fa-w"></i>

      Dit om je zo goed, veilig en zelfstandig mogelijk aan het verkeer deel te laten nemen.
    </p>
    <a href="courses.html" class="btn-get-started">Some text</a>
  </div>
</section>
