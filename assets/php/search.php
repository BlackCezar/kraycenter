<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include_once('connect.php');
        if ($_GET['table'] == 'advokats') {
            $word = $_GET['word'];
            $mode = $_GET['mode'];
            try {
                if ($word) {
                    if ($mode != '') {
                        $result = $pdo->query("SELECT * FROM `advokats` WHERE  (`id` LIKE '$word' or `name` LIKE \"%$word%\"  or `reg_num` LIKE '$word' or `num_udostover` LIKE '$word') and `$mode` <> '' ORDER BY name ASC");
                    } else {
                        $result = $pdo->query("SELECT * FROM `advokats` WHERE `id` LIKE '$word' or `name` LIKE \"%$word%\"  or `reg_num` LIKE '$word' or `num_udostover` LIKE '$word' ORDER BY name ASC");
                    }
                } else {
                    if ($mode != '') {
                        $result = $pdo->query('SELECT * FROM `advokats`  WHERE `'.$mode.'` <> ""');
                    } else $result = $pdo->query('SELECT * FROM `advokats` LIMIT 20');
                }
                if ($result) {
                    $resultf = $result->fetchAll($pdo::FETCH_ASSOC);
                    if (!$word) array_push($resultf ,array(finded => 'true'));        
                } else $resultf = array("finded" => 'false');                    
            } catch (Exception $e) {
                print_r("failes");
                $resultf = array("finded" => 'crushed');                    
            }
        }
        if ($_GET['table'] == 'advokats_org') {
            $word = $_GET['word'];
            try {
                if ($word) {
                    $result = $pdo->query("SELECT * FROM `advokats_org` WHERE `id` LIKE '$word' or `name` LIKE \"%$word%\"  or `form` LIKE \"%$word%\"  or `director` LIKE \"%$word%\"  ORDER BY name ASC");
                } else {
                    $result = $pdo->query('SELECT * FROM `advokats_org` LIMIT 20');
                }
                if ($result) {
                    $resultf = $result->fetchAll($pdo::FETCH_ASSOC);
                    if (!$word) array_push($resultf ,array(finded => 'true'));        
                } else $resultf = array("finded" => 'false');                    
            } catch (Exception $e) {
                print_r("failes");
                $resultf = array("finded" => 'crushed');                    
            }
        }
        if ($_GET['table'] == 'med_companys' ) {
            $word = $_GET['word'];
            try {
                if ($word) {
                    $result = $pdo->query("SELECT * FROM `med_companys` WHERE `id` LIKE '$word' or `name` LIKE \"%$word%\"  or `address` LIKE \"%$word%\" ORDER BY name ASC");
                } else {
                    $result = $pdo->query('SELECT * FROM `med_companys`');
                }
                if ($result) {
                    $resultf = $result->fetchAll($pdo::FETCH_ASSOC);
                    if (!$word) array_push($resultf ,array(finded => 'true'));        
                } else $resultf = array("finded" => 'false');                    
            } catch (Exception $e) {
                print_r("failes");
                $resultf = array("finded" => 'crushed');                    
            }
        }
        if ($_GET['table'] == 'obrazov_org' ) {
            $word = $_GET['word'];
            try {
                if ($word) {
                    $result = $pdo->query("SELECT * FROM `obrazov_org` WHERE `id` LIKE '$word' or `name` LIKE \"%$word%\"  or `address` LIKE \"%$word%\" ORDER BY name ASC");
                } else {
                    $result = $pdo->query('SELECT * FROM `obrazov_org`');
                }
                if ($result) {
                    $resultf = $result->fetchAll($pdo::FETCH_ASSOC);
                    if (!$word) array_push($resultf ,array(finded => 'true'));        
                } else $resultf = array("finded" => 'false');                    
            } catch (Exception $e) {
                print_r("failes");
                $resultf = array("finded" => 'crushed');                    
            }
        }
        print_r(json_encode($resultf));
    // if ($finded) {print_r(',[{"finded":"true"}]');} else {print_r(',{"finded": false}');}
}   


