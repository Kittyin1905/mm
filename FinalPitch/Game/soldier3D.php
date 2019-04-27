<!DOCTYPE html>

<html lang="en">

	<head>

		<title>Aussie History</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
		<link rel="stylesheet" href="css/GalMenu.css" />
		<script type="text/javascript" src="js/fresco/fresco.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/fresco/fresco.css"/>
		<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/GalMenu.js"></script>
        <style>

			body {

				background-color: #000000;

				margin: 0px;

				overflow: hidden;

				touch-action: none;

			}



			#info {

				position: absolute;

				top: 0px; width: 100%;

				color: #ffffff;

				padding: 5px;

				font-family:Monospace;

				font-size:13px;

				font-weight: bold;

				text-align:center;

			}

            #card {

				

				top: 200px; width: 100%;

				color: #ffffff;

				padding: 5px;

				font-family:Monospace;

				font-size:13px;

				font-weight: bold;

				text-align:center;

			}

			a {

				color: #ffffff;

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

	<body>


		<div id="loading"></div>
		<main class = "hide">
        <div id="container"></div>

        <div id="card">good</div>

		<div id="info">

			drag to find more soldier.

		</div>

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

		<script src="build/three.js"></script>


		<script>
			setTimeout(function() {
							$("body").addClass("loaded");
							$("main").removeClass("hide");

							}, 500); // 2 second delay
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
		
		
		
		<script>

             var  names=new Array()

            names[0]='Jack'

            names[1]='Jack'

            names[2]='Jack'

            names[3]='Jack'

            names[4]='Jack'

			names[5]='Jack'

            names[6]='Jack'

            names[7]='Jack'

            names[8]='Jack'

            names[9]='Jack'

            var  imgs=new Array()

            imgs[0]='img/22.jpg'

            imgs[1]='Jack'

            imgs[2]='Jack'

            imgs[3]='Jack'

            imgs[4]='Jack'

            imgs[5]='Jack'

            imgs[6]='Jack'

            imgs[7]='Jack'

            imgs[8]='Jack'

			imgs[9]='Jack'

			var cubes=new Array(5);

		//	var names=new Array(5);

		//	var imgs=new Array(5);

            var index=0;

			var camera, scene, renderer , mouse,raycaster ,INTERSECTED;

        //    var cube1, cube2, cube3, cube4,cube5;

		//	var cube6, cube7, cube8,cube9, cube10, cube11, cube12,cube13, cube14, cube15; 

			var isUserInteracting = false,

			onMouseDownMouseX = 0, onMouseDownMouseY = 0,

			lon = 0, onMouseDownLon = 0,

			lat = 0, onMouseDownLat = 0,

			phi = 0, theta = 0;

            getData();

			init();

			animate();



			function init() {



				var container, mesh;



				container = document.getElementById( 'container' );



				camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1100 );

				camera.target = new THREE.Vector3( 500, 0, 0 );



				scene = new THREE.Scene();

				raycaster = new THREE.Raycaster();

				mouse = new THREE.Vector2();

				var geometry = new THREE.SphereBufferGeometry( 500, 60, 40 );

				// invert the geometry on the x-axis so that all of the faces point inward

				geometry.scale( - 1, 1, 1 );



				var material = new THREE.MeshBasicMaterial( {

					map: new THREE.TextureLoader().load( 'img/MOK.jpg' )

				} );



				mesh = new THREE.Mesh( geometry, material );

				

				scene.add( mesh );

				////////////////////////////////

				//addcube();

        

///////A

       



	function initCube(imageUrl,Name) {

			var geometry = new THREE.BoxGeometry(2, 2, 2);

			var material;

			if (imageUrl) {

			//  material= new THREE.MeshFaceMaterial({

			// material = new THREE.MeshLambertMaterial({

				material = new THREE.MeshBasicMaterial( { 

					map: new THREE.TextureLoader().load( imageUrl )

				//	map: new THREE.TextureLoader().load( 'img/MOK.jpg' )

				//	map: THREE.ImageUtils.loadTexture(imageUrl)

				});

			} else {

				material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );

				material = new THREE.MeshLambertMaterial();

			}

			var cube = new THREE.Mesh(geometry, material);

			cube.name = Name;

			scene.add(cube);

			return cube;

		}



		// 添加物体

		 cube0 = initCube('img/soldier1.jpg',0);

		 cube1 = initCube('img/soldier2.jpg',1);

		 cube2 = initCube('img/soldier3.jpg',2);

		 cube3 = initCube('img/soldier4.jpg',3);

		 cube4 = initCube('img/soldier5.jpg',4);

		 cube5 = initCube('img/soldier6.jpg',5);

		 cube6 = initCube('img/soldier7.jpg',6);

		 cube7 = initCube('img/soldier8.jpg',7);

		 cube8 = initCube('img/soldier9.jpg',8);

		 cube9 = initCube('img/soldier10.jpg',9);

		

		cube0.position.set(15, 3, 1);

		cube1.position.set(3, -7, 2);

		cube2.position.set(-2, 0, 7);

		cube3.position.set(0, -8, 10);

		cube4.position.set(1, 7, -3);

		cube5.position.set(-25, 3, 6);

		cube6.position.set(-15, 7, 1);

		cube7.position.set(3, -8, 10);

		cube8.position.set(-2, 12, 3);

		cube9.position.set(6, 6, 6);

		

		

     /*  for (var i=0;i<15;i++){

		   cubes[i]=initCube('img/soldier1.jpg',i);

		   cubes[i].position.set(i, i+2, i+3);

	   }

	*/			



//////////////////////////////////////////////////////////////

				renderer = new THREE.WebGLRenderer();

				renderer.setPixelRatio( window.devicePixelRatio );

				renderer.setSize( window.innerWidth, window.innerHeight );

				container.appendChild( renderer.domElement );



				document.addEventListener( 'mousedown', onPointerStart, false );

				

				document.addEventListener( 'mousemove', onPointerMove, false );

				document.addEventListener( 'mouseup', onPointerUp, false );



				document.addEventListener( 'wheel', onDocumentMouseWheel, false );



				document.addEventListener( 'touchstart', onPointerStart, false );

				document.addEventListener( 'touchmove', onPointerMove, false );

				document.addEventListener( 'touchend', onPointerUp, false );



				document.addEventListener( 'click', ondbclick, false );

				//



				document.addEventListener( 'dragover', function ( event ) {



					event.preventDefault();

					event.dataTransfer.dropEffect = 'copy';



				}, false );



				document.addEventListener( 'dragenter', function ( event ) {



					document.body.style.opacity = 0.5;



				}, false );



				document.addEventListener( 'dragleave', function ( event ) {



					document.body.style.opacity = 1;



				}, false );



				document.addEventListener( 'drop', function ( event ) {



					event.preventDefault();



					var reader = new FileReader();

					reader.addEventListener( 'load', function ( event ) {



						material.map.image.src = event.target.result;

						material.map.needsUpdate = true;



					}, false );

					reader.readAsDataURL( event.dataTransfer.files[ 0 ] );



					document.body.style.opacity = 1;



				}, false );







				window.addEventListener( 'resize', onWindowResize, false );



		}



			

////////////////////////////////////////////////////////////	







//////////////////////////////////////////////////////////////

			function onWindowResize() {



				camera.aspect = window.innerWidth / window.innerHeight;

				camera.updateProjectionMatrix();



				renderer.setSize( window.innerWidth, window.innerHeight );



			}



			function onPointerStart( event ) {



				isUserInteracting = true;



				var clientX = event.clientX || event.touches[ 0 ].clientX;

				var clientY = event.clientY || event.touches[ 0 ].clientY;



				onMouseDownMouseX = clientX;

				onMouseDownMouseY = clientY;



				onMouseDownLon = lon;

				onMouseDownLat = lat;



			}



			function onPointerMove( event ) {



				if ( isUserInteracting === true ) {



					var clientX = event.clientX || event.touches[ 0 ].clientX;

					var clientY = event.clientY || event.touches[ 0 ].clientY;



					lon = ( onMouseDownMouseX - clientX ) * 0.1 + onMouseDownLon;

					lat = ( clientY - onMouseDownMouseY ) * 0.1 + onMouseDownLat;



				}



			}



			function onPointerUp( event ) {



				isUserInteracting = false;



			}



			function onDocumentMouseWheel( event ) {



				var fov = camera.fov + event.deltaY * 0.05;



				camera.fov = THREE.Math.clamp( fov, 10, 75 );



				camera.updateProjectionMatrix();



			}

	///////////		////////////////////////////////////////

			function ondbclick( event ) {





    mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;

    mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;



	raycaster.setFromCamera(mouse, camera);

				var intersects = raycaster.intersectObjects(scene.children);

			//	var intersects = raycaster.intersectObjects(scene.getObjectByName('back'));

			//	scene.getObjectByName('cube')

				if (intersects.length > 0) {

							if (INTERSECTED != intersects[0].object) {

								///////////////////I add

								

							//	if ( intersects[0].object.name=='back'   ) {

								if ( intersects[0].object.geometry.type=='BoxGeometry'   ) {

                                //    console.log(intersects[0].object.name);

                                 

						        //  alert("box");//

                                  var  soldiername=names[intersects[0].object.name];

                                  var  soldierimgurl=imgs[intersects[0].object.name];

                             //     console.log( soldierimgurl);

                                  sendData(soldierimgurl,soldiername); 

									if (INTERSECTED) INTERSECTED.material.color.setHex(INTERSECTED.currentHex);

										INTERSECTED = intersects[0].object;

										INTERSECTED.currentHex = INTERSECTED.material.color.getHex();

										INTERSECTED.material.color.set( 0xff0000 );

									//	console.log("box");	

									//	window.location.href='try1.html';

							    }

							}

				} else {

							if (INTERSECTED) INTERSECTED.material.color.set(INTERSECTED.currentHex);

							INTERSECTED = null;

								

				}



}



///////////////////////////////////////////////////////////////

			function animate() {



				requestAnimationFrame( animate );

				

						// object turn

				/*		for (i=0;i<15;i++){

							cubes[i].rotation.y += 0.03;

						}

						*/

 					cube1.rotation.y += 0.03;

					cube2.rotation.y += 0.02;

					cube3.rotation.y += 0.01;

					cube4.rotation.x -= 0.04;

					cube0.rotation.y += 0.03;

					cube5.rotation.y += 0.02;

					cube6.rotation.y += 0.01;

					cube7.rotation.x -= 0.04;



                    cube8.rotation.y += 0.03;

					cube9.rotation.y += 0.02;

					





				

				update();



			}



			function update() {



 





				if ( isUserInteracting === false ) {



					lon += 0.03;



				}



				lat = Math.max( - 85, Math.min( 85, lat ) );

				phi = THREE.Math.degToRad( 90 - lat );

				theta = THREE.Math.degToRad( lon );



				camera.target.x = 500 * Math.sin( phi ) * Math.cos( theta);

				camera.target.y = 500 * Math.cos( phi );

				camera.target.z = 500 * Math.sin( phi ) * Math.sin( theta );



				camera.lookAt( camera.target );

                

				/*

				// distortion

				camera.position.copy( camera.target ).negate();

				*/



				renderer.render( scene, camera );



			}

		

   ////////////////////////////////////////

   ///get data         

	function iterateRecords(data) {

            $.each(data.result.records, function(recordKey, recordValue) {



                var recordTitle = recordValue["Title of image"];

                recordTitle = recordTitle.replace("-", "").split(',')[0];

                

                //var recordYear = getYear(recordValue["dcterms:temporal"]);

                var recordImage = recordValue["Medium resolution image"];

                //var recordDescription = recordValue["dc:description"];



                if(recordTitle  && recordImage ) {

                    names[index]=recordTitle ;

                    imgs[index]=recordImage ;

                    index=index+1;

                }

            });

    }

    

    function getData(){

        $.ajax({

            type:"GET",

            async : false,

            url:"https://data.gov.au/api/3/action/datastore_search?resource_id=cf6e12d8-bd8d-4232-9843-7fa3195cee1c&limit=15",

            success:function(data){

                var jsonBlock=JSON.parse(data);

                iterateRecords(jsonBlock);

            },

            dataType:"text"

            

        })



    }

   /////////////////////////////////////

   /////////////////////send message

   function sendData(soldierimgurl,soldiername){

    $.ajax({

				type:"POST",

				url: "player.php",

                data:{"soldierimg":soldierimgurl,"soldiername":soldiername},

				success:function(data){

					url="news.php";window.location.href=url;

				},

				dataType:"text"

				

			})

   }



    

	</script>

	</body>

</html>

