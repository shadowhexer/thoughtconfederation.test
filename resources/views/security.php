<?php
    session_id();
    session_start();

    if(!isset($_SESSION['id']))
    {
        echo 'Does not exist';
        header("Location: /project/sign-in.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
        <title>Profile</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
    
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
        <!-- Template Main CSS File -->
        <link href="assets/css/profile.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/intlTelInput.css" rel="stylesheet">
        <link href="assets/css/intlTelInput.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $(function() {
        $("#includeHtml").load("header.php");
    });
    </script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center" id="includeHtml"></div>
    </header><!-- End Header -->

        <!-- Body Credits to Bootdey @ https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details -->

            <div class="container-xl px-4 mt-4" id="profile">
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Password Details</div>
                            <div class="card-body">
                                <form class="profile" id="profile" action="forms/update.php" method ="POST">
                                    <!-- Form Row-->

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (username)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="passkey">Change Password</label>
                                            <input class="form-control" name="passkey" id="passkey" type="password" autocomplete="new-password" placeholder="Enter your password" value="" required oninvalid="this.setCustomValidity('Enter your password to confirm change')" oninput="this.setCustomValidity('')">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="checkpass">Confirm Password</label>

                                            <input class="form-control" id="checkpass" type="password" autocomplete="new-password" placeholder="Confirm your password" value="">
                                        </div>
                                    </div>
                                    
                                    <!-- Save changes button-->
                                    <button type="submit" class="btn btn-primary" id="secureUpdate" name="secureUpdate">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div><!-- End #main -->
      
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
        <!-- Telephone Code JS Files -->
        <script src="assets/js/data.js" type="text/javascript"></script>
        <script src="assets/js/data.min.js" type="text/javascript"></script>
        <script src="assets/js/intlTelInput-jquery.js" type="text/javascript"></script>
        <script src="assets/js/intlTelInput-jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/intlTelInput.js" type="text/javascript"></script>
        <script src="assets/js/intlTelInput.min.js" type="text/javascript"></script>
        <script src="assets/js/utils.js" type="text/javascript"></script>
    
        <!-- Template Main JS File -->
        <script src="assets/js/main.js" type="text/javascript"></script>
        <script src="assets/js/security.js" type="text/javascript"></script>
    
        <!-- Responsible for implementing the Telephone JS -->
        <script>
        const input = document.querySelector("#phone");
        
        window.intlTelInput(input, {initialCountry: "auto", geoIpLookup: callback => {fetch("https://ipapi.co/json").then(res => res.json()).then(data => callback(data.country_code)).catch(() => callback("us"));},utilsScript: "/intl-tel-input/js/utils.js?"});

        </script>
    
        <script src="assets/js/emailChecker.js"></script>
    
      </body>
</html>