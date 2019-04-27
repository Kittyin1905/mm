

function iterateRecords(data) {

	console.log(data);
	
    // .text() returns the value. if put somethig into (), then change the value to what is put.
    $("#filter-count strong").text($(".record:visible").length);
	
	$("#filter-text").keyup(function(){
		var searchTerm = $(this). val();
		$(".record").hide();
		$(".record:contains('"+searchTerm+"')").show();
		$("#filter-count strong").text($(".record:visible").length);


	});
    
    	
    
    
    //These urls are about the World War 1 searched from Youtube.
	var videos = ["https://www.youtube.com/watch?v=kTjE50bBCZM",
				"https://www.youtube.com/watch?v=gJoT4uhYl7s",
				"https://www.youtube.com/watch?v=g1CsXrSJNUE",
				"https://www.youtube.com/watch?v=faM42KMeB5Q",
				"https://www.youtube.com/watch?v=EJfab2aXRKs",
				"https://www.youtube.com/watch?v=nOcEX3dYn3s",
				"https://www.youtube.com/watch?v=0bt1ycpezn0",
				"https://www.youtube.com/watch?v=McsEN1_HfQM",
				"https://www.youtube.com/watch?v=mcqM1J78_ag",
				"https://www.youtube.com/watch?v=OK6ZTXrEUfc",
				"https://www.youtube.com/watch?v=FZX5ov5R1FQ",
				"https://www.youtube.com/watch?v=vTnb3xRbXdw",
				"https://www.youtube.com/watch?v=lfqTWur1EPI",
				"https://www.youtube.com/watch?v=Wnwop62pTxI",
				"https://www.youtube.com/watch?v=jGU7qYxtAoY",
				"https://www.youtube.com/watch?v=8ClB_DSwHOI",
				"https://www.youtube.com/watch?v=dMEFg_-26Ms",
				"https://www.youtube.com/watch?v=r77_ZYEjV20",
				"https://www.youtube.com/watch?v=8pRabavi2rU",
				"https://www.youtube.com/watch?v=AdmAfsm18tA",
				"https://www.youtube.com/watch?v=lfqTWur1EPI&t=4s",
				"https://www.youtube.com/watch?v=IhRwGIa3xtw",
				"https://www.youtube.com/watch?v=eLZxnSdivm8",
				"https://www.youtube.com/watch?v=3Yld6xQbktY",
				"https://www.youtube.com/watch?v=o70yKzzOvAQ",
				"https://www.youtube.com/watch?v=wkCcrJpn5ks",
				"https://www.youtube.com/watch?v=rt9Ove7w5mM",
				"https://www.youtube.com/watch?v=_p2_AUBDFLc",
				"https://www.youtube.com/watch?v=17UZhpx5hsA",
				"https://www.youtube.com/watch?v=cvOI4RPe8v0",
				"https://www.youtube.com/watch?v=gUbMDTJrNL0",
				"https://www.youtube.com/watch?v=zPVx4tYBvK4",
				"https://www.youtube.com/watch?v=acLl5nuJ-f4",
				"https://www.youtube.com/watch?v=rWTv6TX4ang",
				"https://www.youtube.com/watch?v=LWmvK1fb76E",
				"https://www.youtube.com/watch?v=6sM4TWL3ynQ",
				"https://www.youtube.com/watch?v=-LzjzL3Jwtk",
				"https://www.youtube.com/watch?v=Tjdh7wo3DUs",
				"https://www.youtube.com/watch?v=Pxb3j6Ps44c",
				"https://www.youtube.com/watch?v=P0ZVazB0bIg",
				"https://www.youtube.com/watch?v=l1lxixAHDp4",
				"https://www.youtube.com/watch?v=FzlT2P2sldY",
				"https://www.youtube.com/watch?v=LFiT6xlFr3c",
				"https://www.youtube.com/watch?v=uhtpTcww9d0",
				"https://www.youtube.com/watch?v=Nj43X-VBEPE",
				"https://www.youtube.com/watch?v=nsSkL3Yl0rA",
				"https://www.youtube.com/watch?v=2QRftl3vFZ4",
				"https://www.youtube.com/watch?v=yaXvf-R7nl4",
				"https://www.youtube.com/watch?v=MM8IhNPLnfU",
				"https://www.youtube.com/watch?v=DKjYSOwiHvc"];
				
	var i = 0;
	
	$.each(data.result.records, function(recordKey, recordValue) {
		var video = videos[i];
		var recordTitle = recordValue["Title"];
		var recordPublish = recordValue["Published"];
		var recordImage = recordValue["Link"];
		var recordSummery = recordValue["Summary"];
		//var recordImageLarge = recordValue["1000_pixel_jpg"];

		if(recordTitle && recordPublish && recordImage && recordSummery) {

			// if(recordYear < 1900) { // Only get records from the 19th century

				$("#records").append(
					$('<article class="record">').append(
						$('<h2>').text(recordTitle),
						$('<h3>').text(recordPublish),
						//$('<img>').attr("src", recordImage),
						$('<a>').attr("href", video).addClass("strip").attr("data-strip-options","width: 853,height: 480,youtube: { autoplay: 0 }").append($('<img>').addClass("watch").attr("src", recordImage)),
						
						$('<p>').text(recordSummery)
						
						
					)
				);
				 
				
				i++;
				Tipped.create(".watch", "Click Picture to Watch Video!", { position: 'right'});
			}

		// }

	});

}

setTimeout(function() {
	$("body").addClass("loaded");
}, 1000); // 2 second delay

$(document).ready(function() {
	// var sqlData = JSON.parse(localStorage.getItem("sqlData"));
	// if(sqlData){
		// console.log("Source:Local Storage");
		// iterateRecords(sqlData);
	// }
	// else{
		var data = {
			resource_id: "8a215164-ef93-4312-b5fe-618dab0e32cc",
			limit: 50
		}

		$.ajax({
			url: "https://data.gov.au/api/3/action/datastore_search",
			data: data,
			dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
			cache: true,
			success: function(data) {
				// localStorage.setItem("sqlData", JSON.stringify(data));
				iterateRecords(data);
			}
	});
	// }
	
	

});
