<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once('connect.php');

    if ($_GET['get'] != '' && !isset($_GET['scroll'])) {
        $result = $pdo->query('SELECT  `name`, `reg_num`, `status`, `num_udostover` FROM `'.$_GET['loaded'].'` WHERE `'.$_GET['get'].'` <> "" ORDER BY `name` ASC ');
    } else {
        $result = $pdo->query('SELECT * FROM '.$_GET['get'].' ORDER BY `name` ASC LIMIT '.$_GET['loaded'].', 20');
    }
    
    $resultf = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($resultf));
}   


