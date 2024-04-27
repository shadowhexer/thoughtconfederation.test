<?php
    session_id();
    session_start();
    require 'connect.php';

    // Count category

    $q = "SELECT (SELECT COUNT(category) FROM account.categories WHERE category = 'Politics') as politics, (SELECT COUNT(*) FROM account.categories WHERE category = 'General') as general, (SELECT COUNT(category) FROM account.categories WHERE category = 'Digital Art') as digital_art, (SELECT COUNT(category) FROM account.categories WHERE category = 'Reviews') as reviews, (SELECT COUNT(category) FROM account.categories WHERE category = 'Education') as education FROM account.categories LIMIT 1";
    
    $countQuery = $db->prepare($q);
    $countQuery->execute();
    $counts = $countQuery->fetch(PDO::FETCH_ASSOC);

    $countCategories = array(
        'general' => $counts['general'], 
        'politics' => $counts['politics'], 
        'digital_art' => $counts['digital_art'],
        'reviews' => $counts['reviews'],
        'education' => $counts['education']
    );

    $json = json_encode($countCategories, JSON_PRETTY_PRINT); // To arrange JSON's data

    if ($json === false) 
    {
        // Avoid echo of empty string (which is invalid JSON), and
        // JSONify the error message instead:
        $json = json_encode(["jsonError" => json_last_error_msg()]);
        if ($json === false)
        {
            // This should not happen, but we go all the way now:
            $json = '{"jsonError":"unknown"}';
        }
        // Set HTTP response status code to: 500 - Internal Server Error
        http_response_code(500);
    }
    $db = null;
    echo $json;
    exit();
?>