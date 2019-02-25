<?php 
include_once('connect.php');
// var_dump(htmlspecialchars(strip_tags(trim($_POST['pass']))));
if(isset($_POST['email']) && isset($_POST['pass'])) {
    $name = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
    $org = htmlspecialchars(strip_tags(trim($_POST['org'])));

    // print($pass);
    $pass = password_hash($pass, PASSWORD_BCRYPT);

    try {
        $res = $pdo->query("INSERT INTO `users` (`id`, `name`, `pas`, `org`) VALUES (NULL, '$name', '$pass', '$org')");
        if ($res) {
            print("OK");
        }
    } catch(PDOException $e) {
        print("Error $e");
    }
} else {
    print("Error");
}