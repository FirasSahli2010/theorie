<section id="secondsection" class="secondsection">
  <div class="container aos-init aos-animate" >
    <hr class="featurette-divider">
    <div class="row ">
      @foreach ($postList as $post)
      <div class="col-4 justify-content-center py-5 px-5">
        <a class="card" style="margin: 0 10px 0 10px; width: 100%; border-style: solid; border-color: #00A3CE; border-width: 1px;">
          <?php
            if ($post->img ) {
              ?>
              <img src="img/post/<?=$post->img?>" />
              <?php
            }
            else {
              ?>
              <svg class="bd-placeholder-img rounded-circle image" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
              <?php
            }
          ?>

          <h2 class="description">{{ $post->title }}</h2>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
