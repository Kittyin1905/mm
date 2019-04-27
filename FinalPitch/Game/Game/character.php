<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");
session_start();
if($_SESSION['score']>4){
    $_SESSION['score']= $_SESSION['score']-5;
$json_arr = array("message"=>$_SESSION['score']);
$json_obj = json_encode($json_arr);
}
else{
    $json_arr = array("message"=>-1); 
    $json_obj = json_encode($json_arr);
}
?>
