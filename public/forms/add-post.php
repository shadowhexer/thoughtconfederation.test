<?php
    session_id();
    session_start();
    require 'connect.php';

    $id = bin2hex(random_bytes(5));
    $title = 'Post Title';
    $title_image = 'image Title';
    $post = $_POST['editor'];
    $date_post = date('Y-M-d');
    $user = $_POST['user_id'];
    $caption = null;

    $statement = "INSERT INTO account.post (post_id, blog_post, date_post, user_id, post_title, title_image, image_caption) VALUES (:id, :post, :date_post, :user, :title, :title_image, :caption);";
    $stmt = $db->prepare($statement);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':title_image', $title_image, PDO::PARAM_STR);
    $stmt->bindParam(':post', $post, PDO::PARAM_STR);
    $stmt->bindParam(':date_post', $date_post);
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);

    $stmt->execute();
    header('Location: //thoughtconfederation.test/project/profile.php?user_id='.$user);
    exit();
?>