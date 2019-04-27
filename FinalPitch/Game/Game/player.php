<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");
session_start();
    if($_SESSION['score']>0){
        $id=$_SESSION['soldierID'];
        $_SESSION['soldierimg'][$id]= "'".$_POST['soldierimg']."'";
        $_SESSION['soldiername'][$id]=$_POST['soldiername'];

        $_SESSION['soldierID']=$id+1; 
        $_SESSION['score']=$_SESSION['score']-1;
        $json_arr = array("message"=>$_SESSION['score']);
    }
    else{
        $json_arr = array("message"=>-1); 
    }
 /*   $id=$_SESSION['soldierID'];
    $_SESSION['soldierimg'][$id]= "'".$_POST['soldierimg']."'";
    $_SESSION['soldiername'][$id]=$_POST['soldiername'];
    $json_arr = array("url"=>$_SESSION['soldiername'][$id]);
    $_SESSION['soldierID']=$id+1;
    */
$json_obj = json_encode($json_arr);
echo $json_obj;

?>