function getYear(year) {
	if(year) {
		return year.match(/[\d]{4}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
	}
}

function iterateRecords(data) {

	console.log(data);

	$.each(data.result.records, function(recordKey, recordValue) {

		var recordTitle = recordValue["dc:title"];
		var recordYear = getYear(recordValue["dcterms:temporal"]);
		var recordImage = recordValue["150_pixel_jpg"];
		var recordDescription = recordValue["dc:description"];

		if(recordTitle && recordYear && recordImage && recordDescription) {

			$("#records").append(
				$('<section class="record">').append(
					$('<h2>').text(recordTitle),
					$('<h3>').text(recordYear),
					$('<img>').attr("src", recordImage),
					$('<p>').text(recordDescription)
				)
			);

		}

	});

}

$(document).ready(function() {

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
			iterateRecords(data);
		}
	});

});