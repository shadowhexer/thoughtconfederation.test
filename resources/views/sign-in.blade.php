@php
    session_id();
    session_start();

    if(session()->has('id'))
    {
      return redirect()->route('profile');
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('head')

  <!-- =======================================================
  * Template Name: Sailor
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body 
style="background-image: url('assets/img/slide/slide-1.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;">



<main id="main">

<!-- ======= Login Section ======= -->
<section id="login" class="login">
  <div class="container" data-aos="zoom-in">

    <div class="row">

      <div>

        <div class="login-page">

          <div class="login-form" data-aos="fade-up" data-aos-duration="5000">
            <h4>Login with your account</h4>

            <form action="{{route('login')}}" method="GET">
              @csrf

              <div class="row">
                <div class="col-md-6 form-group">
                  <input name="email" type="text" id="email" class="form-control" placeholder="Email">
                </div>
                
              </div>
              <div class="col-md-6 form-group">
                <input name="passkey" type="password" id="passkey" class="form-control" placeholder="Password">
              </div>

              <div class="row">
					
                <div class="col-12 py-1">
                <div class="form-text" id="passmessage"> </div>
                </div>
              </div>

              <div class="row">

              <div class="col-md-6 form-group">
                <button type="submit" id="submitform" class="btn btn-primary login" name="login" disabled="true">Login</button>
              </div>

              <div class="col-md-6 form-group">
                <p class="form-check-label">Don't have an account?
                  <a href="{{route('sign-up')}}" class="new_account" style="text-decoration: none; color: rgb(12, 72, 0); cursor: pointer;">Create account</p>  
              </div>

              </div>

            </form>

          </div>

        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->

</main><!-- End #main -->

  @include('foot')
  <script src="{{asset('assets/js/login.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/emailChecker.js')}}"></script>
</body>

</html>