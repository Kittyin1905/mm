<?php
session_start();
$_SESSION['score']=15;
$arr=array("img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg","img/1.jpg");
$arrName=array("anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity","anonymity");
$targetName=array("allan","adkind","auchter","bannern","andrews");

$_SESSION['soldierimg']=$arr;
$_SESSION['soldiername']=$arrName;
$_SESSION['soldierID']=0;
$_SESSION['day']=7;
$_SESSION['target']=$targetName[rand() % 5];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Aussie History</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Game/town.css">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="stylesheet" href="css/GalMenu.css" />
		<script type="text/javascript" src="js/fresco/fresco.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/fresco/fresco.css"/>
		<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/GalMenu.js"></script>
		
		<style>
			.start{
				margin-left: 40%;
				margin-top:16%;
				opacity: 0.8;
				cursor: pointer;
			}
			.back{
				margin-left: 40%;
				margin-top:5%;
				opacity: 0.8;
				cursor: pointer;
			}
			.start:hover {
				opacity: 1.5;
			}
			.back:hover {
				opacity: 1.5;
			}
			#loading {
				position: fixed;
				background: white url(images/test.gif) no-repeat center center;
				height: 100%;
				width: 100%;
				top :0;
				left:0;

			}
			body.loaded #loading{
				opacity:0;
				visibility: hidden;
			}
			.hide{
				opacity:0;
				visibility: hidden;
			}
		</style>
 </head>
	

    <body  style="background-image: url('Game/img/scene/alldark.jpg');background-size:cover;background-repeat: no-repeat;">

	<div id="loading"></div>
	<main class = "hide">
		<div class="talk-bubble tri-right border round btm-left-in start">
			<div class="talktext">
			  <p style="text-align: center;">Start Game</p>
			</div>
		</div>
		<a href="img2/guide.jpg" class = "fresco"><div class="talk-bubble tri-right border round btm-left-in back ">
			<div class="talktext">
			  <p style="text-align: center; color:black;" >Read Before Start</p>
			</div>
		</div></a>
	</main>
	<div class="GalMenu GalDropDown">
				<div class="circle" id="gal">
					<div class="ring">
						<a href="../Timeline/timeline.html" title="" class="menuItem"></a>
						<a href="../MapTest/index.php" title="" class="menuItem"></a>
						<a href="../index.html" title="" class="menuItem"></a>
						<a href="../AboutUs/AboutUs.html" title="" class="menuItem"></a>
						<a href="img2/1.PNG" title="" class="menuItem fresco" data-fresco-group="resource"data-fresco-group-options="ui: 'inside'"></a>
						<a href="../Video/Video.html" title="" class="menuItem"></a>
					</div>
					<audio id="audio" src="../audio/niconiconi.mp3"></audio>
				</div>
		</div>
		<div id="overlay" style="opacity: 1; cursor: pointer;"></div>
		<a href="img2/2.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/3.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/4.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/5.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/6.png" title="" class="fresco" data-fresco-group="resource" ></a>
<script>
	setTimeout(function() {
					$("body").addClass("loaded");
					$("main").removeClass("hide");

					}, 2000); // 2 second delay
</script>
<script>
	$( ".start" ).click(function() {

	window.location.href="Game/crossroad.php";
});



</script>
<script type="text/javascript">
			var items = document.querySelectorAll('.menuItem');
			for (var i = 0,l = items.length; i < l; i++) {
					items[i].style.left = (50 - 35 * Math.cos( - 0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";
					items[i].style.top = (50 + 35 * Math.sin( - 0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%"
					}
</script>
<script type="text/javascript">
			$(document).ready(function() {
			$('body').GalMenu({
			'menu': 'GalDropDown'
			})
		});
</script>
</body>
	
</html>
