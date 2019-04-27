<?php
session_start();
//$totalScore=$_SESSION['score'];
//echo $totalScore;
?>
<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Aussie History</title>
	<!--	<link rel="stylesheet" href="css/style.css">-->
	<link rel="stylesheet" href="soldier.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	</head>
<!--	<body style="background-image:url(img/back6.jpg);background-repeat:no-repeat;background-size:100% 100%;background-attachment: fixed;">
-->	
<body style="background-image:url('img/scene/back2.jpg');">

 <a style="float:right;margin-right:40px;margin-top:20px;"href="crossroad.php" class="button">Exit</a>
 	
	<div style="margin:40px;">
	<h2 style="color:  #ecf0f9; text-align:center">Choose your lucky card</h2>
	<div id="ShowScore" style="color:white;text-align:center">Score:<?php echo $_SESSION['score']?></div>
	<div>
		<div id="soldiers" class="content"></div>
		
		
		
<script>


	function iterateRecords(data) {

console.log(data);

$.each(data.result.records, function(recordKey, recordValue) {

	var recordTitle = recordValue["Title of image"];
	recordTitle = recordTitle.replace("-", "").split(',')[0];
	
	//var recordYear = getYear(recordValue["dcterms:temporal"]);
	var recordImage = recordValue["Medium resolution image"];
	//var recordDescription = recordValue["dc:description"];

	if(recordTitle  && recordImage ) {

		/*$("#records").append(
			$('<section class="record">').append(
				$('<h2>').text(recordTitle),
			//	$('<h3>').text(recordYear),
				$('<img>').attr("src", recordImage),
				$('<p>').text(recordDescription)
			)
		);*/
		$("#soldiers").append(
			$('<a class="card">').append(
				$('<div class="front" style="background-image: url(img/1.jpg);background-size:cover">'),
			//	.attr("style",'background-image:url(' + recordImage + ');')
			//	.append(
				//	$('<button class="button">')
				//	.text('Pick'),
			//	),
				$('<div class="back">')
				.attr("style",'background-image:url(' + recordImage + ');')
				.append(	
					$('<button class="button">')
					//.text('Pick'+recordTitle+' '),
					.text('Pick'),
					$('<p style="display:none">').text(recordTitle)
				)
			
			)
		);


	}

});

}

$(document).ready(function() {

	
	$('#soldiers').on('click', '.button', function(){ 
	//	$('#soldiers').on('click', '.front', function(){ //只要改这一行就可以了
		 // $(this).parent().remove();
		
		var  soldierimg=$(this).parent().attr("style"); 
	//	var  soldierimg=$(this).parent().prev().attr("style");
		var  soldierimgurl= soldierimg.slice(21, -2);
	//	var  soldiername=$(this).text().slice(5,-1); 
		var  soldiername=$(this).next().text(); 
		//alert( soldierimgurl);
		//alert( soldiername);
		 
		//  url="news.php?img=";
		//  window.location.href=url;
		
			$.ajax({
				type:"POST",
				url: "player.php",
                data:{"soldierimg":soldierimgurl,"soldiername":soldiername},
				success:function(data){
				//	url="news.php";window.location.href=url;
				if(data.message>=0){
			
				document.getElementById("ShowScore").innerHTML="scores:"+data.message;
				alert("The portrait is in your backpack")
				}
				else{
				document.getElementById("ShowScore").innerHTML="scores:0";
				alert("Your score is not enough~")
				}
				
		//	alert(data.message)
				},
				dataType:"json"
				
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
	</body>
</html>

