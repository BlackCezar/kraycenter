<?php 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=kraycenter;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo = new PDO('mysql:host=localhost;dbname=id8321439_b174420_test;charset=utf8', 'id8321439_u174420', 'Hollywood75');
} catch (PDOException $e) {
    print("Error $e");
}
