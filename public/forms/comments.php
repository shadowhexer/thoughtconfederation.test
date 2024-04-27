<?php
    session_id();
    session_start();
    require 'connect.php';

    
    // Comment Query
    $say = "SELECT u.user_id, u.display_name, u.email, c.blog_comment, c.date_comment FROM account.users u JOIN (SELECT * FROM account.comment) c ON u.user_id = c.user_id JOIN LATERAL (SELECT post_id FROM account.post) p ON c.post_id = p.post_id AND p.post_id = :id ORDER BY c.date_comment DESC";

    $stmt = $db->prepare($say);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all the results as an associative array
    foreach($rows as $row) {
        // Append each row to the response array

        // Comment count
        $count = "SELECT COUNT(*) AS num_comments FROM account.comment c JOIN LATERAL (SELECT post_id FROM account.post) p ON c.post_id = p.post_id AND p.post_id = :id";
        $stmtCount = $db->prepare($count);
        $stmtCount->bindParam(':id', $id, PDO::PARAM_STR);
        $stmtCount->execute();
        $numComments = $stmtCount->fetch(PDO::FETCH_ASSOC)['num_comments'];

    }

    header('Content-Type: text/html; charset=utf-8');
?>