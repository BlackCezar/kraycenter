<?php 
include_once('connect.php');
session_start();

if(isset($_POST['email']) && isset($_POST['pass'])) {
    $name = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
    $res = $pdo->query("SELECT * FROM `users`")->fetchAll(PDO::FETCH_ASSOC);
    $status = '404';
    foreach ($res as $row) {
        if ($row['name'] == $name) {
            if (password_verify($pass, $row['pas'])) {
                $_SESSION['token'] = md5($name);
                $status = '200';
            } else $status = '403';
        }
    }
    print_r($status);
} else {
    print(500);
}