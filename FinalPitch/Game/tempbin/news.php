
<?php

ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
   
</head>
<body>
<h2 style="color :red; ">(This Page Is Under Construction!)</h2>
<img src=<?php echo $_SESSION['soldierimg']?>  alt="soldier-img" height="100" width="100" />
<div><?php echo $_SESSION['soldiername']?></div>
    
</body>
</html>
