<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");

session_start();

$_SESSION['score']= $_SESSION['score']+$_POST['score'];
$json_arr = array("sss"=>$_SESSION['score']);
$json_obj = json_encode($json_arr);
echo $json_obj;
?>

