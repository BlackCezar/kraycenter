<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('connect.php');
    $name = basename($_FILES["advokat_resident"]["name"]);
    $tmp_name = $_FILES["advokat_resident"]["tmp_name"];
    ini_set('display_errors','On');
    error_reporting('E_ALL');
    $err = "";
    print_r($_FILES["advokat_resident"]["name"] != "");
    if ($_FILES["advokat_resident"]["name"] != "") {
        if($_FILES["advokat_resident"]["size"] > 1024*3*1024) {
            $err = '{err: "max_size"}';
            exit;
        }
        
        if(is_uploaded_file($_FILES["advokat_resident"]["tmp_name"])) {
            move_uploaded_file($tmp_name, '../img/uploads/'.$name);
        } else $err = '{err: "Dont downloaded"}';
        
    }
    include_once('mail.php');

    sendMessage();
    

}