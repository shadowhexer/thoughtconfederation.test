<?php
    require 'forms/profile.php';

    if(!isset($_SESSION['id']))
    {
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
    <link href="/project/assets/img/favicon.png" rel="icon">
    <link href="/project/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


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
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/profile.css" rel="stylesheet">
    <link href="assets/css/intlTelInput.css" rel="stylesheet">
    <link href="assets/css/intlTelInput.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
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
    </head>

    <body>

        <!-- Body Credits to Bootdey @ https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details -->
        <div class="container-xl px-4 mt-4" id="profile">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">

                            <!-- Profile picture image-->
                            <img id="avatarContainer" class="img-account-profile rounded-circle mb-2"
                                src="https://www.gravatar.com/avatar/<?php echo md5($result['email']); ?>?s=200" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">Use Gravatar to sync Profile Picture</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form class="profile" id="profile" action="forms/update.php" method="POST">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="first_name">First name</label>
                                        <input name="first_name" class="form-control" type="text"
                                            placeholder="Enter your first name"
                                            value="<?php echo $result['first_name']; ?>">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="last_name">Last name</label>
                                        <input name="last_name" class="form-control" type="text"
                                            placeholder="Enter your last name"
                                            value="<?php echo $result['last_name']; ?>">
                                    </div>
                                </div>
                                <!-- Form Row -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="display_name">Display Name</label>
                                        <input name="display_name" class="form-control" type="text"
                                            placeholder="Enter your Display Name"
                                            value="<?php echo $result['display_name']; ?>">
                                    </div>
                                    <!-- Form Group (location)-->
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group region">
                                            <label for="region" class="small mb-1">Region</label>
                                            <select id="region" name="region" class="form-select"
                                                onchange="fetch_provinces()" value="<?php echo $result['region']; ?>">
                                                <option disabled selected>-Select Region-</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select hidden="true" id="region1" name="region1" class="form-select"
                                                value="<?php echo $result['region']; ?>">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <div class="form-group province">
                                            <label for="province" class="small mb-1">Province</label>
                                            <select id="province" name="province" class="form-select"
                                                onchange="fetch_cities()" value="<?php echo $result['province']; ?>">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group province">
                                            <select hidden="true" id="province1" name="province1" class="form-select"
                                                value="">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <div class="form-group city">
                                            <label for="city" class="small mb-1">City/Municipality</label>
                                            <select id="city" name="city" class="form-select"
                                                onchange="fetch_barangays()" value="<?php echo $result['city']; ?>">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select hidden="true" id="city1" name="city1" class="form-select" value="">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col mb-3">
                                        <div class="form-group barangay">
                                            <label for="barangay" class="small mb-1">Barangay</label>
                                            <select id="barangay" name="barangay" class="form-select"
                                                value="<?php echo $result['barangay']; ?>">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select hidden="true" id="barangay1" name="barangay1" class="form-select"
                                                value="">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email address</label>
                                    <input name="email" class="form-control" type="email"
                                        placeholder="Enter your email address" value="<?php echo $result['email']; ?>">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <div>
                                            <label class="small mb-1" for="phone">Phone number</label>
                                        </div>
                                        <input name="phone_number" class="form-control" id="phone" type="tel"
                                            value="<?php echo $result['phone_number']; ?>">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="birthdate">Birthday</label>
                                        <input class="form-control" name="birthdate" id="birthdate" type="date"
                                            placeholder="Enter your birthday"
                                            value="<?php echo $result['birthdate']; ?>">
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <label for="biography" class="mb-2">Bio</label>
                                    <div class="col form-group">
                                        <textarea name="biography" class="form-control" placeholder="Say something..."
                                            maxlength="50"><?php echo $result['biography']; ?></textarea>
                                    </div>

                                    <div id="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 50</span>
                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <button type="submit" class="btn btn-primary" id="update" name="update">Save
                                    Changes</button>

                                <!-- Delete account button-->
                                <button type="submit" class="btn btn-danger" id="delete"
                                    formaction="forms/delete.php">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js">
        </script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
        </script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js">
        </script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js">
        </script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js">
        </script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js">
        </script>
        <script src="assets/vendor/php-email-form/validate.js">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="assets/js/md5.min.js" type="text/javascript"></script>

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
        <script src="assets/js/address.js" type="text/javascript"></script>
        <script src="assets/js/emailChecker.js"></script>

        <!-- Responsible for implementing the Telephone JS -->
        <script>
        const input = document.querySelector("#phone");

        window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: callback => {
                fetch("https://ipapi.co/json").then(res => res.json()).then(data => callback(data
                        .country_code))
                    .catch(() => callback("us"));
            },
            utilsScript: "/intl-tel-input/js/utils.js?"
        });

        $('textarea').keyup(function() {
            var characterCount = $(this).val().length,
                current = $('#current'),
                maximum = $('#maximum'),
                theCount = $('#the-count');

            current.text(characterCount);
        });
        </script>

    </body>

</html>