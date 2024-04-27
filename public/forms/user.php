<?php
    require 'connect.php';

    $stmt = $db->prepare("SELECT * FROM account.users WHERE user_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Post query
    $posts = "SELECT p.blog_count, u.user_id, u.display_name, p.post_id, p.title_image, p.image_caption, p.post_title, p.blog_post, p.date_post FROM account.users u JOIN (SELECT COUNT(*) AS blog_count, post_id, title_image, image_caption, post_title, user_id, blog_post, date_post FROM account.post GROUP BY post_id, blog_post, date_post) p ON u.user_id = :id AND u.user_id = p.user_id ORDER BY p.date_post DESC";

    $postQuery = $db->prepare($posts);
    $postQuery->bindParam(':id', $id, PDO::PARAM_STR);
    $postQuery->execute();
    $posts = $postQuery->fetchAll(PDO::FETCH_ASSOC);

    foreach($posts as $post)
    {
        $postID = $post['post_id'];
        
        // Comment count
        $count = "SELECT COUNT(*) AS num_comments, post_id FROM account.comment WHERE post_id = :postID GROUP BY post_id";

        $stmtCount = $db->prepare($count);
        $stmtCount->bindParam(':postID', $postID, PDO::PARAM_STR);
        $stmtCount->execute();
        $numComments = $stmtCount->fetch(PDO::FETCH_ASSOC)['num_comments'];
        $numOfComments = array('count' => $numComments);
    }

    header('Content-Type: text/html; charset=utf-8'); // This peace of shit is what took me 4 days to find out.
?>