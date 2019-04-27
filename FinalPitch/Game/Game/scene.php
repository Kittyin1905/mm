<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Aussie History</title>
		<meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1" />
	<!--	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <!--   <script src="scene.js"></script>-->
     <script src="scene.js"></script>
    <link rel="stylesheet" type="text/css" href="scene.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <style>

      .button1 {
        background-color:#4d2800; /* Green */
          border: none;
          color: green;
          padding: 16px 15px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
         /* margin: 4px 2px;*/
          -webkit-transition-duration: 0.4s; /* Safari */
          transition-duration: 0.4s;
          cursor: pointer;

        
      }
	  .centre{
		  text-align: center;
		  font-family:Montserrat;
		  font-size:20px;
	  }
   
	
</style>
 </head>
 
 <script>
 //   alert("body");
  //  getData();
    </script>
    <body style="background-image: url('img/scene/scene.jpg');background-size:cover;background-attachment:fixed; background-repeat: no-repeat;overflow-y:scroll;">
       
        <a href="canvasline/matching.php" class="button">Go Testing</a>
  <ul class="container" id="text">
   <!--   <p class="larger">read the tutorial </p> 
      <p class="larger">read the tutorial </p> 
   -->  
  </ul>
  

<div class="container" id="container">
<ul id="records">                          
</ul>
</div>



	


</body>
<script>

 // alert("beforedoc");
   


 //$(document).ready(function() {
 
//  alert("indocdata");
getData();
setTimeout(addEffect,1000);
//setTimeout(showText,1000);
addEffect();
//showText()
//});
 function addEffect() {

 
    var width = 400;
    height = 550;
    var numberOfBlinds = 10;
    var margin = 2;
    //var color = '#696969';
    var color ='#4d2800';
   // var color ='#855E42';
    //var color='#331a00';
    gapHeight = 100;
  
    var container = $('#container');
  
    container.width(width).height(height);
    var blindWidth = width / numberOfBlinds;
  
    images = new Array();
    $('ul li', container).each(function() {
      images.push($(this)); 
    });
  
    images[0].addClass('active');
    ///////////////////////////////////
    paragraphs = new Array();
    $('#text li').each(function() {
      paragraphs.push($(this)); 
    });
    paragraphs[0].show();
    ////////////////////////////////////
    activeImage = 0;
    for (var i = 0; i < numberOfBlinds; i++) {
      var tempEl = $(document.createElement('span'));
      var borders = calculateBorders();
  
      tempEl.css({
        'left': i * blindWidth,
        border: margin + 'px solid ' + color,
        borderTop: borders.borderWidthTop + 'px solid ' + color,
        borderBottom: borders.borderWidthBottom + 'px solid ' + color,
        'height': height,
        'width': blindWidth,
        'margin-top':26
      });
          
      container.prepend(tempEl);
    };
  
    blinds = $('span', container);
    setTimeout(animateBorders, 1000);
   
}
  function calculateBorders() {
    var random = Math.floor((Math.random()*9)+1);
    var borderWidthTop = (random / 10) * gapHeight;
    var borderWidthBottom = gapHeight - borderWidthTop;
  
    return {borderWidthTop: borderWidthTop, borderWidthBottom: borderWidthBottom};
  }
  
  function animateBorders() {
    var changeOccuredOnce = false;
  
    blinds.animate({
      borderTopWidth: height / 2,
      borderBottomWidth: height / 2
    }, 5000, function() {
      if(!changeOccuredOnce) {
        images[activeImage].removeClass('active');
        //text start
        paragraphs[activeImage].hide();
         //text end
        activeImage = (activeImage + 1) % images.length;
        images[activeImage].addClass('active');
        //text start
        paragraphs[activeImage].show();
        //text end
        setTimeout(animateBorders, 3000);
        changeOccuredOnce = true;
      }
  
      var borders = calculateBorders();
  
      $(this).delay(300).animate({
        borderTopWidth: borders.borderWidthTop,
        borderBottomWidth: borders.borderWidthBottom
      }, 3000);
    });
  }
  
   
  </script>
</html>