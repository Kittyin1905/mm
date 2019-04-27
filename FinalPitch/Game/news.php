
<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aussie History</title>
    <link rel="stylesheet" href="win.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
    .exit{
      transform: translateZ(40px);
  cursor: pointer;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  font-weight: bold;
  color: white;
  padding: .5em 1em;
  border-radius: 100px;
  font: inherit;
  background: linear-gradient(135deg,rgb(248, 205, 205) ,rgb(31, 3, 7)    );
  border: none;
  position: relative;
  transform-style: preserve-3d;
  transition: 300ms ease;
    }
    </style>
</head>
<body style="background-image: url('Game/img/scene/back.jpg');">

<h1 style="text-transform: capitalize; color:white">Mysterious Soldier is: <?php echo $_SESSION['target']?></h1>
<a style="float:right;margin-right:20px;margin-top:0px;color:white;"href="index.php" class="exit">Exit</a>
<div class="wrap">
  <span class="vert-flag noise">★★★</span>
   <h1>Soldier You Found</h1>
   <img src=<?php echo $_SESSION['soldierimg']?>>
  <p>
  <div style=" color:white"><?php echo $_SESSION['soldiername']?></div> 
   </p> 
   <br />
</div>

   <br />
  
  <img id="state" src="Game/img/fail.png">  

<script>
   var find="<?php echo $_SESSION['soldiername']?>";
   var find2=find.toLowerCase();
   find2.toString();
   console.log(find);
   console.log(find2);
   console.log("<?php echo $_SESSION['target'];?>");
   console.log(find2=="<?php echo $_SESSION['target'];?>");
   
 if(find2=="<?php echo $_SESSION['target'];?>"){
    $("#state").attr("src","Game/img/win.png");
 }else{
   alert("Wrong!");
 }
  
 
</script>
</body>

</html>

