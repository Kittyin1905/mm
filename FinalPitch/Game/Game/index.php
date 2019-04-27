<?php
session_start();
$_SESSION['score']=20;
$arr=array("img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg");
$arrName=array("anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity");
$targetName=array("allan","adkind","auchter","bannern","andrew");

$_SESSION['soldierimg']=$arr;
$_SESSION['soldiername']=$arrName;
$_SESSION['soldierID']=0;
$_SESSION['day']=7;
$_SESSION['target']=$targetName[rand() % 5];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgl - equirectangular panorama</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="town.css">
		<style>
			.start{
				margin-left: 40%;
				margin-top:16%;
			}
		</style>
 </head>

    <body style="background-image: url('img/scene/alldark.jpg');">



<div class="talk-bubble tri-right border round btm-left-in start">
	<div class="talktext">
	  <p style="text-align: center;">Start Game</p>
	</div>
</div>

 
	</body>
<script>
	$( ".start" ).click(function() {

	window.location.href="crossroad.php";
});

</script>	
</html>
