@php

    $id = isMethod('get', 'user_id');
    require 'forms/user.php';

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

    <title><?php echo $result['display_name'];?> | Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Include Quill stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/user.css" rel="stylesheet">

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

    <div class="container" style="max-width: 100%;">
        <div class="page-inner no-page-title">
            <!-- start page main wrapper -->
            <div id="main-wrapper">
                <div class="row" style="padding: 0;">
                    <div class="col-lg-5 col-xl-3">
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">
                                <h4 class="card-title">
                                    <?php
                                        if($result['role'] === 'admin')
                                        {
                                            echo 'Admin';
                                        } else { echo 'User';}
                                    ?> Profile</h4>
                            </div>
                            <div class="card-body user-profile-card mb-3">
                                <img id="profile-pic"
                                    src="https://www.gravatar.com/avatar/<?php echo md5($result['email']); ?>?s=200"
                                    class="user-profile-img rounded-circle" alt="Profile">
                                <h4 class="text-center h6 mt-2"><strong><?php echo $result['display_name']; ?></strong>
                                </h4>
                                <p class="text-center small">BSIT - 2nd Year</p>
                                <button class="btn btn-theme btn-sm">Follow</button>
                                <button class="btn btn-theme btn-sm">Message</button>
                            </div>

                            <input type="file" id="profile-pic-input" style="display: none;" accept="image/*">
                            <hr>
                            <div class="card-heading clearfix mt-3">
                                <h4 class="card-title">Bio</h4>
                            </div>
                            <div class="card-body mb-3">
                                <p class="mb-0"><?php echo $result['biography']; ?></p>
                            </div>
                            <hr />
                            <div class="card-heading clearfix mt-3">
                                <h4 class="card-title">Contact Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 text-muted">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td><?php echo $result['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address:</th>
                                                <td>89 Guild Street 542B, Gingoog City</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-6">

                        <?php
                        if(($result['role']) === 'admin' && $_SESSION['id']  === $result['user_id'])
                        {
                            echo '<div class="card card-white grid-margin">
                            <div class="card-body">
                                <div class="post">
                                <form action="/project/forms/add-post.php" method="POST">
                                    <!-- Replace the textarea with CKEditor -->
                                    <textarea name="editor" id="editor" rows="4"></textarea>
                                    <input name="user_id" type="text" value="'.$result['user_id'].'"
                                            hidden="true">
                                    <div class="post-options">
                                        <a href="#"><i class="fa fa-camera"></i></a>
                                        <a href="#"><i class="fas fa-video"></i></a>
                                        <a href="#"><i class="fa fa-music"></i></a>
                                        <button class="btn btn-outline-primary float-right" id="postBtn"
                                            style="background-color: #143642; border: none; color:aliceblue; margin-left: 500px; margin-top: -30px;">Post</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>';
                        }
                        else { echo '';} ?>

                        <div class="profile-timeline">
                            <section id="blog" class="blog">
                                <div class="container" data-aos="fade-up">
                                    <div class="col-lg-8 entries" id="field">
                                        <?php
                                                $index = 1;
                                                if(isset($post['post_title']))
                                                {
                                                    foreach($posts as $post)
                                                    {
                                                        echo '<article class="entry" data-aos="zoom-in" data-aos-duration="1000"><h2 class="entry-title"><a href="/project/post.php?post_id='.$post['post_id'].'">'.$post['post_title'].'</a></h2><div class="entry-meta" ><ul><li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="" id="posterName">'.$post['display_name'].'</a></li><li class="d-flex align-items-center"><i class="bi bi-clock"></i><timeid="datePost">'.$post['date_post'].'</time></li><li class="d-flex align-items-center"></li></ul></div></article>';
                                                    }
                                                }
                                            ?>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3">
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">
                                <h4 class="card-title">Suggestions</h4>
                            </div>
                            <div class="card-body">
                                <div class="team">
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                    </div>
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                    </div>
                                    <div class="team-member">
                                        <div class="online off"></div>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">
                                <h4 class="card-title">Some Info</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    Oh, 'di ba? Nakakaputang ina
                                    Tayo'y lumilipad, at ako'y iniwan mo
                                    Oh, 'di ba? Pinagmukha mo 'kong tanga
                                    Tayo'y lumilipad, at ako'y iniwan mo
                                    'Di mo agad sinabi
                                    Na may duda na sa 'yong isip (duda, duda)
                                    Pinalalim mo pa
                                    Ang sugat dito sa aking dibdib
                                    Oh, shit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>
            <!-- end page main wrapper -->

        </div>

    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>ITE18</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!--======   JavaScript   =======-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script for handling post submission -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/js/user.js" type="text/javascript"></script>


    <!-- At the end of your HTML file, just before the closing </body> tag -->

    <!-- Include CKEditor library -->
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    <script>
    CKEDITOR.replace('editor');
    </script>
</body>

</html>