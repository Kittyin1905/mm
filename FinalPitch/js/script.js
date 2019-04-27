function getYear(year) {
	if(year) {
		// return year.match(/[\d]{4}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
		return year.match(/-[\d]{2}/);
	}
}

function iterateRecords(data) {

	console.log(data);

	$.each(data.result.records, function(recordKey, recordValue) {

		var recordTitle = recordValue["title"];
		var recordYear = getYear(recordValue["temporal"]);
		var recordImage = recordValue["150_pixel"];
		var recordDescription = recordValue["decsription"];
		var recordId = recordValue["_id"];

		if(recordTitle && recordYear && recordImage && recordDescription && recordId) {

			if(recordYear< 20) { // Only get records from the 19th century

				$("#records").append(
					$('<article class="record">').append(
						$('<h2>').text(recordTitle),
						$('<h3>').text(recordYear),
						$('<img>').attr("src", recordImage),
						$('<p>').text(recordDescription)
					)
				);

			}

		}

	});
	console.log($(".record:visible").length);
	// $("#filter-count strong").text("Here");
	$("#filter-count strong").text($(".record:visible").length);
	$("#filter-text").keyup(function(){
		var searchTerm =$(this).val();
		console.log(searchTerm);
		$(".record").hide();
		$(".record:contains('"+searchTerm+"')").show();
		$("#filter-count strong").text($(".record:visible").length);
	});
}

$(document).ready(function() {

	var data = {
		resource_id: "26b0b235-13f0-4132-ae47-5ccf3d1c8e89",
		limit: 50
	}

	$.ajax({
		url: "http://data.gov.au/api/action/datastore_search",
		data: data,
		dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
		cache: true,
		success: function(data) {
			iterateRecords(data);
		}
	});

});