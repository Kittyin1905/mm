<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);
header("Content-type:text/html;charset=utf-8");
session_start();
$totalScore=$_SESSION['score'];
$image=$_SESSION['soldierimg'];
$name=$_SESSION['soldiername'];
$ID=$_SESSION['soldierID'];
//$Day=$_SESSION['day'];

//echo $image[0];
//echo $image[1];
/*echo $image[2];
echo $name[0];
echo $_SESSION['soldierID'];
echo $name[1];
echo $name[2];
*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Aussie History</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="town.css">
		<style>
         
    </style>
 </head>

		<body style="background-image: url('img/scene/room.jpg');">
		<a style="float:right;margin-right:20px;margin-top:18px;color:white;"href="../index.php" class="exit">Exit</a>
<div id="backpack"style="position:fixed ;z-index:999">
    <img src='img/icons8-backpack.png'height="100" width="100">
	<div id="kalendar" style="color:white">Day:<?php echo $_SESSION['day']?></div>
	<div id="ShowScore" style="color:white">score:0</div>
	<div id="box"style="height:400px;width:90px;overflow:auto;border:8px solid yellowgreen;padding:2%;display:none;">
	
	<img height="100" width="80" src=<?php echo $image[0]?> > <?php echo $name[0]?>
	<img height="100" width="80" src=<?php echo $image[1]?>><?php echo $name[1]?>
	<img height="100" width="80" src=<?php echo $image[2]?>><?php echo $name[2]?>
	<img height="100" width="80" src=<?php echo $image[3]?>><?php echo $name[3]?>
	<img height="100" width="80" src=<?php echo $image[4]?>><?php echo $name[4]?>
	<img height="100" width="80" src=<?php echo $image[5]?>><?php echo $name[5]?>
	<img height="100" width="80" src=<?php echo $image[6]?>><?php echo $name[6]?>
	<img height="100" width="80" src=<?php echo $image[7]?>><?php echo $name[7]?>
	<img height="100" width="80" src=<?php echo $image[8]?>><?php echo $name[8]?>
	</div>
</div>

<div class="talk-bubble tri-right border round btm-left-in playground">
	<div class="talktext">
	  <p>Have a look at the playground</p>
	</div>
</div>
<div class="talk-bubble tri-right border round btm-left-in dormitory">
	<div class="talktext">
	  <p>Have a look at the dormitory</p>
	</div>
</div>
<div class="talk-bubble tri-right border round btm-right-in restaurant">
	<div class="talktext">
	  <p>Have a look at the restaurant</p>
	</div>
</div>

<div class="talk-bubble tri-right border round btm-right-in soldier">
	<div class="talktext">
	  <p>Search Soldier?</p>
	</div>
</div>


	</body>
<script>
	$( ".playground" ).click(function() {
	if(<?php echo $_SESSION['day']?><=0 ){
			alert("Time is up, please go to search soldier~");
	}else{
		var time="minus";
		$.ajax({
			type:"POST",
			url: "time.php",
			data:{"score":time},
			success:function(data){
			
			},
			dataType:"json"
			
		})
	window.location.href="scene.php";
  } 
});

$( ".dormitory" ).click(function() {
	if(<?php echo $_SESSION['day']?><=0 ){
			alert("Time is up, please go to search soldier~");
	}else{
				var time="minus";
					$.ajax({
						type:"POST",
						url: "time.php",
						data:{"score":time},
						success:function(data){
						
						},
						dataType:"json"
					})
			window.location.href="lottery.php";
			}
});

$( ".soldier" ).click(function() {
window.location.href="../soldier3D.php";
});

$( ".restaurant" ).click(function() {

	if(<?php echo $_SESSION['day']?><=0 ){
		alert("Time is up, please go to search soldier~");
		
	}else{
		if(<?php echo $_SESSION['score']?>>4){
			window.location.href="restaurant.php";
		}else{
			alert("Need at least 5 score,please go to playground to get score~");
		}

	}
	
});

$( "#backpack" ).click(function() {

		 $("#box").toggle();
});

$(".playground").mouseover(function() {
	$("body").css({
   'background-image':"url('img/scene/play.jpg')",
   'transition': 'all .8s'
		});
  }).mouseout(function(){
    $("body").css({"background-image":"url('img/scene/room.jpg')",
		'transition': 'all .8s'
		});
  });

$(".soldier").mouseover(function() {
	$("body").css({
   'background-image':"url('img/scene/pick.jpg')",
   'transition': 'all .8s'
		});
  }).mouseout(function(){
    $("body").css({"background-image":"url('img/scene/room.jpg')",
		'transition': 'all .8s'
		});
	});
	
$(".dormitory").mouseover(function() {
	$("body").css({
   'background-image':"url('img/scene/dormitory.jpg')",
   'transition': 'all .8s'
		});
  }).mouseout(function(){
    $("body").css({"background-image":"url('img/scene/room.jpg')",
		'transition': 'all .8s'
		});
  });
 
$(".restaurant").mouseover(function() {
	$("body").css({
   'background-image':"url('img/scene/restaurant.jpg')",
   'transition': 'all .8s'
		});
  }).mouseout(function(){
    $("body").css({"background-image":"url('img/scene/room.jpg')",
		'transition': 'all .8s'
		});
  });
 

 
</script>	
<script>
	
	var score="<?php echo $totalScore?>";
    $("#ShowScore").text("score:"+score);

</script>
</html>
