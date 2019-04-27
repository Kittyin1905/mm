<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");
session_start();

    $_SESSION['soldierimg']= "'".$_POST['soldierimg']."'";
    $_SESSION['soldiername']=$_POST['soldiername'];
    $json_arr = array("url"=>$_SESSION['soldiername']);
$json_obj = json_encode($json_arr);
echo $json_obj;


?>