<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ITE18 - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center" id="includeHtml">@include('header')</div> 
    <!-- "/*@*/include" to include a specific file in any part of the code as if it was there -->
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-wrap="false" class="carousel slide carousel-fade">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->

        <div class="carousel-item active headline" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>THOUGHT CONFEDERATION</span></h2>
              <p class="animate__animated animate__fadeInUp">Dive in and discover what are the creators' thoughts about
                the content of a web page.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">AKIMA's THOUGHTS</h2>
              <p class="animate__animated animate__fadeInUp">Writing, Manga, Drawing? Discover Akima's ideas.</p>
              <a href="profile.php?user_id=" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visit
                Akima</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">JOSH's THOUGHTS</h2>
              <p class="animate__animated animate__fadeInUp">Anime? Try to find out what are Josh's thoughts.</p>
              <a href="profile.php?user_id=" class="btn-get-started animate__animated animate__fadeInUp scrollto">Visit
                Josh</a>
            </div>
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">HEXER's THOUGHTS</h2>
              <p class="animate__animated animate__fadeInUp">Constitutions? See what Hexer's cooking.</p>
              <a href="profile.php?user_id=c948e28857"
                class="btn-get-started animate__animated animate__fadeInUp scrollto">Visit Hexer</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2 data-aos="fade-right" data-aos-duration="1000">APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES</h2>
            <h3 data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">An Information Science
              course subject focused on web development</h3>
            <br><br>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p data-aos="fade-left" data-aos-duration="1000">
              In the age of modernisation and technological advancement, it is necessary for people to catchup with the
              changing times, thus, the Information Technology was born. With the advancement of technology, information
              is now accessible at our fingertips, so does the thoughts of everyone. This page is all about the thoughts
              of the Creators and was made in compliance of the ITE18 activity. The content of the site include, but not
              limited to:
            </p>
            <ul data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
              <li><i class="ri-check-double-line"></i> Reviews about anime, manga, and other otaku stuffs</li>
              <li><i class="ri-check-double-line"></i> Illustations, video games, and e-Sports</li>
              <li><i class="ri-check-double-line"></i> Politics and social issues</li>
            </ul>
            <p class="fst-italic" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
              The views and opinions of the author does not reflect the view of all the Creators.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">@include('footer')</footer><!-- End Footer -->
  @include('foot')
  
  <script src="{{asset('assets/js/heroCarousel.js')}}"></script>

</body>

</html>