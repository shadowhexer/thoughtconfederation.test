<?php
    require 'connect.php';

    $posts = "SELECT u.user_id, u.display_name, u.biography, MD5(u.email) as email, p.post_id, p.title_image, p.image_caption, p.post_title, p.blog_post, p.date_post FROM account.users u JOIN (SELECT post_id, title_image, image_caption, post_title, user_id, blog_post, date_post FROM account.post GROUP BY post_id, blog_post, date_post) p ON u.user_id = p.user_id AND p.post_id = :id";

    $postQuery = $db->prepare($posts);
    $postQuery->bindParam(":id", $id, PDO::PARAM_STR);
    $postQuery->execute();
    $post = $postQuery->fetch(PDO::FETCH_ASSOC);

    // Category query
    $cat = "SELECT * FROM account.categories ca JOIN (SELECT post_id FROM account.post) p ON ca.post_id = p.post_id";
    $catQuery = $db->prepare($cat);
    $catQuery->execute();
    $category = $catQuery->fetch(PDO::FETCH_ASSOC);
    
    header('Content-Type: text/html; charset=utf-8'); // This peace of sht is what took me 4 days to find out.
?>