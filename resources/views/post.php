<?php 
  $id = $_GET['post_id'];
  require 'forms/post.php';
  require 'forms/comments.php';

  if(!isset($post['post_title'])) 
  { header ('Location: index.html'); }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $post['post_title']; ?></title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-vNKx4Svzk3LJFQV9PJwRxYZ6txazZmW4Vwbsj3Od7VrXuyY9yKLg2MIS0n1I/yzhzP4Nq3yxFIdSwxhu2ZBX5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <link href="assets/css/post.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $(function() {
        $("#includeHtml").load("header.php");
        $("#footer").load("footer.html");
    });
    </script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center" id="includeHtml"></div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="<?php echo $post['title_image']; ?>" alt="" class="img-fluid" id="entry-img">
                            </div>

                            <h2 class="entry-title" id="post-title"><?php echo $post['post_title']; ?></h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href=""
                                            id="posterName"></a><?php echo $post['display_name'] ?></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            id="datePost"><?php echo $post['date_post'] ?></time></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                        <div><?php if(isset($row['blog_comment'])) {echo $numComments.' Comment(s)';} else {echo '0 Comment';} ?></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content" id="post">
                                <?php echo $post['blog_post']; ?>
                            </div>

                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a
                                            href="<?php echo $category['category_url']; ?>"><?php echo $category['category']; ?></a>
                                    </li>
                                </ul>
                            </div>

                        </article><!-- End blog entry -->

                        <div class="blog-author d-flex align-items-center">
                            <img src="https://www.gravatar.com/avatar/<?php echo $post['email']; ?>?s=200"
                                class="rounded-circle float-left" alt="">
                            <div>
                                <h4 id="poster-name"><?php echo $post['display_name']; ?></h4>
                                <div class="social-links">
                                    <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                    <a href="https://www.facebook.com/hexerz"><i class="bi bi-facebook"></i></a>
                                    <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                </div>
                                <p id="poster-bio">
                                    <?php echo $post['biography']; ?>
                                </p>
                            </div>
                        </div><!-- End blog author bio -->

                        <div class="blog-comments">
                            
                            <h4 class="comments-count"><?php if(isset($row['blog_comment'])) {echo $numComments.' Comment(s)';} else {echo '0 Comment';} ?></h4>
                            <div id="comment-field"></div>

                            <?php
                                $index = 1;
                                if(isset($row['blog_comment']))
                                {
                                    foreach($rows as $row)
                                    {
                                        $hashed = $row['email'];
                                        $avatar = 'https://www.gravatar.com/avatar/'.md5($hashed).'?s=200';

                                        echo '<div id="comment_'.$index.'" class="comment"><div class="d-flex"><div class="comment-img"><img id="avatar" src="'.$avatar.'"></div><div><h5><a href="/project/profile.php?user_id='.$row['user_id'].'" id="name">'.$row['display_name'].'</a></h5><time id="date">'.$row['date_comment'].'</time><p id="comment_field">'.$row['blog_comment'].'</p></div></div></div>';

                                        $index++;
                                    }
                                }

                            ?>
                            
                            <!-- Comment Field -->

                            <div class="reply-form" data-aos="fade-up" data-aos-duration="5000">

                                <form action="forms/comment.php" method="post" id="identifier">
                                    <div class="row">
                                        <div class="col form-group" id="editor" style="height: 250px;"></div>
                                        <textarea name="comment" id="field" class="form-control" maxlength="500"
                                            placeholder="Your Comment" style="display: none;" hidden="" true></textarea>
                                        <input name="post-id" type="text" value="<?php echo $post['post_id']; ?>"
                                            hidden="true">
                                        <div id="count" style="text-align: end;">
                                            <span id="current">0</span>
                                            <span id="maximum">/ 500</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </form>
                            </div>
                        </div><!-- End blog comments -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <li><a href="#">General <span id="general">(0)</span></a></li>
                                    <li><a href="#">Digital Art <span id="digital_art">(0)</span></a></li>
                                    <li><a href="#">Politics <span id="politics">(0)</span></a></li>
                                    <li><a href="#">Reviews <span id="reviews">(0)</span></a></li>
                                    <li><a href="#">Education <span id="education">(0)</span></a></li>
                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                                    <h4><a href="blog-single.html">Post Name</a></h4>
                                    <time datetime="2024-01-01">YYYY-mm-dd</time>
                                </div>

                            </div><!-- End sidebar recent posts-->
                        </div><!-- End sidebar -->
                    </div><!-- End blog sidebar -->
                </div>
            </div>
        </section><!-- End Blog Single Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer"></footer><!-- End Footer -->

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="assets/js/post.js"></script>
    <script src="assets/js/category.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        $("#identifier").on("submit", function() {
            // Get the HTML content of the editor
            var editorHTML = $("#editor .ql-editor").html();

            // Remove the <p></p> tags from the HTML content
            var sanitizedHTML = editorHTML.replace(/<p>|<\/p>/g, '');

            // Set the sanitized HTML content as the value of the field
            $("#field").val(sanitizedHTML);
        });
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