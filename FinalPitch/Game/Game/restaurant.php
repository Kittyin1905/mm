<?php
session_start();
$TargetName=$_SESSION['target'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Aussie History</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="Modal/css/default.css" />
		<link rel="stylesheet" type="text/css" href="Modal/css/component.css" />
		<script src="Modal/js/modernizr.custom.js"></script>
		<style>
			.start{
				margin-left: 40%;
				margin-top:7%;
            }
            
       /*     button{

            background:#1AAB8A;
            color:#fff;
            border:none;
            position:relative;
            height:60px;
            font-size:1.0em;
            padding:0 2em;
            cursor:pointer;
            transition:800ms ease all;
            outline:none;
            }
            button:hover{
            background:#fff;
            color:#1AAB8A;
            }

            button:before,button:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: #1AAB8A;
            transition:400ms ease all;
            }
            button:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
            }
            button:hover:before,button:hover:after{
            width:100%;
            transition:800ms ease all;
            }
*/
				body{
				background-repeat: no-repeat;
				background-attachment: fixed;
				/* background-attachment: absolute; */
				background-size:cover;
	
			}
		</style>
 </head>

    <body style="background-image: url('img/scene/alldark.jpg');">
   <div class="start">
   <img src ="img/slot.png" width="300" height="300"></img>
   </div>
   <div style="margin:0 auto;width:600px;">
   <p style="color:white;" ALIGN = CENTER>exchange one character of mysterious soldier with 5 score!</p>
    </div>
    <div style="margin:0 auto;width:250px;">
   <button  class="md-trigger" data-modal="modal-4">Click to exchange!</button>
    </div>
    <div class="md-modal md-effect-4" id="modal-4">
			<div class="md-content">
				<h3>The character is: <strong><?php echo $TargetName[mt_rand(0,4)]?> </strong></h3>
				<div>
					
					<button id="lottery"class="md-close">Close me!</button>
				</div>
			</div>
		</div>
<!-- classie.js by @desandro: https://github.com/desandro/classie -->
<script src="Modal/js/classie.js"></script>
<script src="Modal/js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="Modal/js/cssParser.js"></script>
		

	</body>
<script>
	$( ".start" ).click(function() {
	window.location.href="crossroad.php";
    });

    $( "#lottery" ).click(function() {
		<?php $_SESSION['score']=$_SESSION['score']-5?>	
        <?php $_SESSION['day']=$_SESSION['day']-1?>	
        setTimeout(function(){window.location.href="crossroad.php"}, 300);
     
   // window.location.href="crossroad.php";
    });

</script>	
</html>
