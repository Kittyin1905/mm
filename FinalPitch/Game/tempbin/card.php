
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Aussie History</title>
		<link rel="stylesheet" href="soldier.css">
		
		<link rel="stylesheet" href="css/GalMenu.css" />
		<link rel="stylesheet" type="text/css" href="css/fresco/fresco.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	</head>
	<body>
		
		<main class = "hide">
			<h2>Choose a soldier to be your partner</h2>
			<div id="soldiers" class="content"></div>
		</main>
		<div id="loading"></div></br></br>
		
		<div class="GalMenu GalDropDown">
				<div class="circle" id="gal">
					<div class="ring">
						<a href="#" title="" class="menuItem">News</a>
						<a href="../MapTest/index.php" title="" class="menuItem">Map</a>
						<a href="https://www.uq.edu.au/" title="" class="menuItem">About Us</a>
						<a href="../index.html" title="" class="menuItem">Homepage</a>
						<a href="img2/1.PNG" title="" class="menuItem fresco" data-fresco-group="resource"data-fresco-group-options="ui: 'inside'">Resource</a>
						<a href="../Video/Video.html" title="" class="menuItem">Video</a></div>
						<audio id="audio" src="../audio/niconiconi.mp3"></audio>
				</div>
		</div>
		<div id="overlay" style="opacity: 1; cursor: pointer;"></div>
		<a href="img2/2.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/3.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/4.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/5.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
		<a href="img2/6.png" title="" class="fresco" data-fresco-group="resource" ></a>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>	
		<script type="text/javascript" src="js/fresco/fresco.js"></script>
<script>
	function iterateRecords(data) {

<!-- console.log(data); -->

$.each(data.result.records, function(recordKey, recordValue) {

	var recordTitle = recordValue["Title of image"];
	recordTitle = recordTitle.replace("-", "").split(',')[0];
	
	//var recordYear = getYear(recordValue["dcterms:temporal"]);
	var recordImage = recordValue["Medium resolution image"];
	//var recordDescription = recordValue["dc:description"];

	if(recordTitle  && recordImage ) {

		
		$("#soldiers").append(
			$('<a class="card">').append(
				$('<div class="front">')
				.attr("style",'background-image:url(' + recordImage + ');')
				.append(
				

				),
				$('<div class="back" style="background-image: url(img/moon.jpg);background-size:cover">').append(	
					$('<button class="button">').text('Pick'+recordTitle),

				)
				
			)
		);


	}

});

}

setTimeout(function() {
					$("body").addClass("loaded");
					$("main").removeClass("hide");
					

					}, 2000); // 2 second delay

$(document).ready(function() {


$('#soldiers').on('click', '.button', function(){ 
		
		
		 
		var  soldierimg=$(this).parent().prev().attr("style");
		var  soldierimgurl= soldierimg.slice(21, -2);
		var  soldiername=$(this).text().slice(5,-1); 
		
		
			$.ajax({
				type:"POST",
				url: "player.php",
                data:{"soldierimg":soldierimgurl,"soldiername":soldiername},
				success:function(data){
					url="news.php";window.location.href=url;
				},
				dataType:"text"
				
			})




        });


$.ajax({
      type:"GET",
      url:"https://data.gov.au/api/3/action/datastore_search?resource_id=cf6e12d8-bd8d-4232-9843-7fa3195cee1c&limit=5",
      success:function(data){
        var jsonBlock=JSON.parse(data);
        iterateRecords(jsonBlock);
      },
      dataType:"text"
      
  })

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
		<script type="text/javascript" src="js/GalMenu.js"></script>
	</body>
</html>