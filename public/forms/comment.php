<?php
    session_id();
    session_start();
    require 'connect.php';

    if(!isset($_SESSION['id']))
    {
        header("Location: /project/sign-in.php");
        exit();
    }

    date_default_timezone_set('UTC');

    $user = $_SESSION['id'];
    $post = $_POST['post-id'];
    $comment = $_POST['comment'];
    $date = date('Y-M-d');

    if($comment === NULL)
    {
        $response = array('response' => 'Field cannot be empty');
        $json = json_encode($response, JSON_PRETTY_PRINT); // To arrange JSON's data

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
        echo $json;
        exit();
    }

    $say = "INSERT INTO account.comment (user_id, post_id, blog_comment, date_comment) VALUES (:user, :post, :comment, :date_comment);";

    $stmt = $db->prepare($say);

    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->bindParam(':post', $post, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date_comment', $date);

    $stmt->execute();

    header('Location: //thoughtconfederation.test/project/post.php?post_id='.$post);
	exit();
?>