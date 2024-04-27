<?php
    session_start();
    require 'connect.php';

    if(!isset($_SESSION['id']))
    {
        header("Location: http://127.0.0.1:3000/ITE%2018/ITE%2018%20(Website)/Group%20Activity/Activity%205%20(PHP)/login/login");
    }

    $id = $_SESSION['id'];

    $sql = "DELETE FROM account.users WHERE account_id = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam('id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $db = NULL;

    header("Location: http://127.0.0.1:3000/ITE%2018/ITE%2018%20(Website)/Group%20Activity/Activity%205%20(PHP)/login/index.html");
    session_destroy();
    exit();

?>