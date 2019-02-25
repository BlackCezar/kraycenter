<?php 
    include_once('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $pdo->query("INSERT INTO `feedbacks` (`id`, `name`, `tel`, `ask`, `status`, `date`) VALUES (NULL, '$_POST[name]', '$_POST[tel]', '$_POST[ask]', '0', current_timestamp())");
    if ($result) {
        print_r('OK');
    } else var_dump($result);
} else {
    if ($_GET['onload'] == 'true') {
        $result = $pdo->query("SELECT * FROM `feedbacks`");
        $result = $result->fetchAll();
        if ($result) {
            print_r(json_encode($result));
        } else {
            print_r(json_encode("{error: true}"));
        }
    } else {
        if ($_GET['rechange'] == 'true') {
            $result = $pdo->prepare("UPDATE `feedbacks` SET `status`=1 WHERE `id`=$_GET[id]");
        } else {
            $result = $pdo->prepare("UPDATE `feedbacks` SET `status`=0 WHERE `id`=$_GET[id]");
        }
        $result = $result->execute();
        if ($result) {
            echo "OK";
        } else {
            header('HTTP/1.1 500 Something is false');
            print_r($result);
        }
    }
}