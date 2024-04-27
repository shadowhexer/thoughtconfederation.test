<?php
  require 'forms/blog.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog Posts</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('head') <!-- Include the head tag elements -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center" id="includeHtml">@include('header')</div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries" id="field">

                      <?php
                        $index = 1;

                        if(isset($post['post_title']))
                        {
                          foreach($posts as $post)
                          {
                            echo '<article class="entry" data-aos="zoom-in" data-aos-duration="1000"><div class="entry-img"><img src="'.$post['title_image'].'" alt="" class="img-fluid"></div><h2 class="entry-title"><a href="/project/post.php?post_id='.$post['post_id'].'">'.$post['post_title'].'</a></h2><div class="entry-meta" ><ul><li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="" id="posterName">'.$post['display_name'].'</a></li><li class="d-flex align-items-center"><i class="bi bi-clock"></i><timeid="datePost">'.$post['date_post'].'</time></li><li class="d-flex align-items-center"></li></ul></div></article>';
                          }

                          if($post['blog_count'] > 1)
                          { $index++; }
                          
                          echo '<div class="blog-pagination"><ul class="justify-content-center"><li class="active"><a href="#">'.$index.'</a></li></ul></div>';
                        }

                      ?>

                        <!-- 
                        <article class="entry" data-aos="zoom-in" data-aos-duration="1000">

                            <div class="entry-img">
                                <img src="" id="title_image" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="" id="title">Title</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href=""
                                            id="posterName">Name</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            id="datePost">YYYY-mm-dd</time></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                        <div id="comments-count">N/A</div>
                                    </li>
                                </ul>
                            </div>
                        </article>

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li class="active"><a href="#">1</a></li>

                            </ul>
                        </div> -->

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
        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">@include('footer')</footer><!-- End Footer -->

    @include('foot')
    <script src="assets/js/blog.js"></script>
    <script src="assets/js/category.js"></script>

</body>

</html>