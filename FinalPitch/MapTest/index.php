<!doctype html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Aussie History</title>
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
		<link rel="stylesheet" type="text/css" href="strip.css"/>
		<link rel="stylesheet" type="text/css" href="map.css"/>
		<link rel="stylesheet" href="css/GalMenu.css" />
		<link rel="stylesheet" type="text/css" href="css/tipped/tipped.css"/>
		<link rel="stylesheet" type="text/css" href="css/fresco/fresco.css"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>

	<body>	
		
			<div id="loading"></div><br><br>
			<main class = "hide">
				<article id="map"></article>

				<aside id="marker-details"></aside>
			</main>
			<div class="GalMenu GalDropDown">
				<div class="circle" id="gal">
					<div class="ring">
						<a href="../Timeline/timeline.html" title="" class="menuItem"></a>
						<a href="../Game/index.php" title="" class="menuItem"></a>
						<a href="../index.html" title="" class="menuItem"></a>
						<a href="../AboutUs/AboutUs.html" title="" class="menuItem"></a>
						<a href="img2/1.PNG" title="" class="menuItem fresco" data-fresco-group="resource"data-fresco-group-options="ui: 'inside'"></a>
						<a href="../Video/Video.html" title="" class="menuItem"></a></div>
						<audio id="audio" src="../audio/niconiconi.mp3"></audio>
				</div>
			</div>
			<div id="overlay" style="opacity: 1; cursor: pointer;"></div>
			<a href="img2/2.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
			<a href="img2/3.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
			<a href="img2/4.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
			<a href="img2/5.PNG" title="" class="fresco" data-fresco-group="resource" ></a>
			<a href="img2/6.png" title="" class="fresco" data-fresco-group="resource" ></a>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/fresco/fresco.js"></script>
		<script type="text/javascript" src="js/tipped/tipped.js"></script>
		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
		<script>
			
			
			setTimeout(function() {
					$("body").addClass("loaded");
					$("main").removeClass("hide");

					}, 2000); // 2 second delay
			
			//This is using OpenStreetMap api.
			// Setup the map as per the Leaflet instructions
			// https://leafletjs.com/examples/quick-start/
			var myMap = L.map('map',{inertia:true,worldCopyJump:true,renderer: L.svg()}).fitWorld().setView([-27.489593198118687, 153.04614272729611], 11).locate({ enableHighAccuracy: true, maximumAge: 60000, watch: false});

			var searchLayer = L.layerGroup().addTo(myMap);
			var gridLayerOptions = {minZoom:3, maxZoom: 18,};
			//... adding data in searchLayer ...
			//myMap.addControl( new L.Control.Search({layer: searchLayer}) );
			// .setView([-27.489593198118687, 153.04614272729611], 10);
			// 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
			
			// https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png
			L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?access_token={accessToken}", {
				maxZoom: 18,
				minZoom: 3,
				attribution:'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>' ,
				accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw',
				id: "mapbox.streets"
			}).addTo(myMap);
			// L.gridLayer(gridLayerOptions);

			function onLocationFound(e) {
    			 var radius = e.accuracy / 2;

				L.marker(e.latlng).addTo(myMap).bindPopup("<p style="+"'"+"font-family:fantasy;"+"'"+">"+"Wow, You are within " + radius + " meters from this point ! "+"</p>").openPopup();

    			 L.circle(e.latlng, radius).addTo(myMap);
    			

			}

				myMap.on('locationfound', onLocationFound);

				function onLocationError(e) {
    					alert(e.message);
							}

				myMap.on('locationerror', onLocationError);

				
				var data = {
					resource_id: "f5ecd45e-7730-4517-ad29-73813c7feda8",
					limit: 150
					}
				$.ajax({
					url: "https://data.gov.au/api/3/action/datastore_search",
					data: data,
					dataType: "jsonp", 
					cache: true,
					success: function(data) {
						iterateRecords(data)
					}
				});
				function iterateRecords(data) {
				$.each(data.result.records, function(recordKey, recordValue) {
				var space = recordValue["dcterms:spatial"].split(";"); 
				var recordLatitude = space[1];
				//console.log(recordLatitude);
			
				if(recordLatitude) {
					var latLong = recordLatitude.split(",");
					var lat = latLong[0];
					var lng = latLong[1];
					var recordImage = recordValue["150_pixel_jpg"];
					var title = recordValue["dc:title"];
					var recordImageLarge = recordValue["1000_pixel_jpg"];
					// Use the latlong to position the marker, add to map, then associate a popup with the record remarks
					var marker = L.marker([lat, lng],{riseOnHover:true}).addTo(myMap).bindPopup("<h2 style="+"'"+"font-family:Montserrat;"+"'"+">" + recordValue["dc:title"] + "</h2>"+"<h3 style="+"'"+"font-family:Montserrat;"+"'"+">"+recordValue["dcterms:temporal"]+"</h3>"+"<main>"+"<a href ="+"'"+recordImageLarge+"'"+" "+"class ="+"strip"+" "+"data-strip-caption = "+"'"+title+"'"+">"+"<img src ="+ "'"+recordImage+"'"+"/>"+"</a>"+"</main>"+"<p style="+"'"+"font-family:Montserrat; font-weight: bold;"+"'"+">" + recordValue["dc:description"] + "</p>",{maxHeight:160});
					
				}
				});
				}

						
		</script>
		
		<script type="text/javascript">
			var items = document.querySelectorAll('.menuItem');
			for (var i = 0,l = items.length; i < l; i++) {
					items[i].style.left = (50 - 35 * Math.cos( - 0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%";
					items[i].style.top = (50 + 35 * Math.sin( - 0.5 * Math.PI - 2 * (1 / l) * i * Math.PI)).toFixed(4) + "%"
					}
		</script>
		<script type="text/javascript" src="js/GalMenu.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			$('body').GalMenu({
			'menu': 'GalDropDown'
			})
		});
		</script>
		<script type="text/javascript" src="strip.pkgd.min.js"></script>

	</body>
</html>