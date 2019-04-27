<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");

session_start();

$_SESSION['day']= $_SESSION['day']-1;
$json_arr = array("sss"=>$_SESSION['day']);
$json_obj = json_encode($json_arr);
echo $json_obj;


?>