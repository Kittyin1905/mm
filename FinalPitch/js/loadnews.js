function iterateRecords(data) {

	console.log(data);

	$.each(data.result.records, function(recordKey, recordValue) {

		var recordTitle = recordValue["dc:title"];
		var recordYear = getYear(recordValue["dcterms:temporal"]);
		var recordImage = recordValue["150_pixel_jpg"];
		var recordImageLarge = recordValue["1000_pixel_jpg"];
		var recordDescription = recordValue["dc:description"];

		if(recordTitle && recordYear && recordImage && 
			recordDescription) {

			if(recordYear < 1900) { // Only get records from the 19th century

				$("#records").append(
					$('<article class="record">').append(
						$('<h2>').text(recordTitle),
						$('<h3>').text(recordYear),
						$('<a>').attr("href",recordImageLarge).addClass("strip" ).attr("data-strip-caption",
					recordTitle).append($
							('<img>').attr("src", recordImage)),
						//$('<img>').attr("src", recordImage),
						$('<p>').text(recordDescription)
					)
				);

			}

		}

	});
	//setTimeout(function(){
	//	$("body").addClass("loaded");
	//}, 2000);
	$("#filter-count strong").text($(".record.visible").length);
	$("#filter-text").keyup(function(){
		
	}

	);
};
$(document).ready(function() {
	var slqData=JSON.parse(localStorage.getItem("slqData"));
	if (slqData){
		console.log("Source: Local Storage");
		iterateRecords(slqData);
	}else{
		console.log("Source : API");

	var data = {
		resource_id: "f5ecd45e-7730-4517-ad29-73813c7feda8",
		limit: 50
	}

	$.ajax({
		url: "http://data.gov.au/api/action/datastore_search",
		data: data,
		dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
		cache: true,
		success: function(data) {
			localStorage.setItem("slqData",
		JSON.stringify(data));
			iterateRecords(data);

		}
	});
	}
});