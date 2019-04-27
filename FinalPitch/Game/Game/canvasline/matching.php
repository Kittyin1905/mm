<!doctype html>
<html>
<head>
<meta charset="UTF-8">
  <title>Aussie History</title>
  <link rel="stylesheet" href="css/base.css"/>
  <link rel="stylesheet" href="css/onLine.css"/>
  <link rel="stylesheet" href="css/match.css"/>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>-->
  <script src="js/onLine.js"></script>
  <script type="text/javascript">
  $(function(){	
		var obj = $(".demo");
		var size = obj.size();
		for(var i=0; i<size; i++ ){
			obj.eq(i).onLine({
				regainCanvas: true
			});
		}
  });
  </script>
  <style>
	.font{
		font-size:14px;
		line-height:1.5;
		font-family:Montserrat;
	}
  </style>
</head>
<body style="background-image: url('../img/scene/back.jpg');background-size:cover;	background-repeat: no-repeat;"> 
<!--

   
-->
<!-------------------      -------------------------------------->
    <div id="test2" data-pair = 5 class="demo pt10">	
        <div class="show topBottom cb">
			<div class="tools">
		<!--	    <div class="savePair">savePair</div>-->
				<div class="getPair">Submit</div>
           		<div class="goBackBtn">Back</div>                                
                <div class="resetCanvasBtn">Reset</div>	
            </div>
            <div class="showtop"><!--左侧-->
            	<span class="showitem" data-id="L1">
                  <img class="scene" src="matchImg/4.jpg"/>
                </span>
                <span class="showitem" data-id="L2">
                    <img class="scene" src="matchImg/2.jpg"/>
				</span>
                <span class="showitem" data-id="L3">
                    <img class="scene" src="matchImg/3.jpg"/>
				</span>
                <span class="showitem" data-id="L4">
                     <img class="scene" src="matchImg/1.jpg"/>
				</span>
            <!--

           
                <span class="showitem" data-id="L5">
                     <img class="scene" src="2.jpg"/>
                </span>
                <span class="showitem" data-id="L6">
                     <img class="scene" src="2.jpg"/>
                </span>
            -->
            </div>
            <div class="showbottom"><!--右侧-->
                <span class="showitem" data-id="R1">
                    <p class="font">
                      Title: Queenslanders for the Front. G.P. Brown, photo. - Caption: 10th Reinforcements for the 47th Battalion. - Caption: 11th Reinforcements for the 4th Pioneers.
                     </p>    
                </span>
                <span class="showitem" data-id="R2">
                        <p class="font">
                         Title: Fighting lines East and West. Caption: How the French soldiers make themselves war villas at the front. One of the ingenious war villas erected by the French troops at the front. This photo was taken in the Woevre.
                        </p>
				</span>
                <span class="showitem" data-id="R3">
                        <p class="font">
                         Title: Cattle Drafting Competition at Toowoomba. - Caption: The camp, with a competitor cutting out a beast. - Caption: A breakaway. - Caption: W. Carver, the winner, working his first beast. 
                         </p>
                </span>
                <span class="showitem" data-id="R4">
                    <p class="font">
                         Title: Brisbane's Town Hall. Laying the foundation Stone on Saturday. F.W. Thiel, photo. - Caption: Mayor Hetherington addresses the Asssemblage. - Caption: Mr. Ryan addressing the gathering.
                    </p>
                </span>
                <!--

               
                <span class="showitem" data-id="R5">1/2 + 1/4 + 1/8 + 1/16 ......</span>
                <span class="showitem" data-id="R6"> pi</span>
            -->      	
            </div>
			<!-- -->
            <canvas class="canvas"></canvas>
            <canvas class="backcanvas"></canvas>
        </div>            
    </div>       
</body>
</html>