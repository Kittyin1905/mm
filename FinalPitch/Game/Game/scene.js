function getYear(year) {
	if(year) {
		//return year.match(/[\d]{4}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
		return year.match(/[\d]{2}/)
	}
}

function iterateRecords(data) {
	var i=0;
	
/*
    // .text() returns the value. if put somethig into (), then change the value to what is put.
    $("#filter-count strong").text($(".record:visible").length);
	//keyuq() 打字时。
	$("#filter-text").keyup(function(){
		var searchTerm = $(this). val();
		$(".record").hide();
		$(".record:contains('"+searchTerm+"')").show();
		$("#filter-count strong").text($(".record:visible").length);


	});
  */  

	$.each(data.result.records, function(recordKey, recordValue) {
	
		var recordTitle = recordValue["title"];
		//var recordYear = getYear(recordValue["temporal"]);
		var recordYear = recordValue["temporal"];
		var recordImage = recordValue["500_pixel"];
        var recordDescription = recordValue["decsription"];
        
		var recordImageLarge = recordValue["1000_pixel"];
		var recordId = recordValue["_id"];
		var date=recordYear.toString();
		//var date="'"+recordYear+"'";
		var month = {'Jan':"01",'Feb':"02",'Mar':"03",'Apr':"04",'May':"05",'Jun':"06",'Jul':"07", 'Aug':"08",'Sep':"09",'Oct':"10",'Nov':"11",'Dec':"12"};

		if(recordTitle && recordYear && recordImage && recordDescription) {

			if(recordId >51) { // Only get records from the 19th century
				var dateList = recordYear.split("-");

				var key = dateList[1];
				var year = dateList[2];
				
				dateList[1]=month[key];
				
                var dataDate=dateList[0]+"/"+dateList[1]+"/"+"19"+dateList[2];
                //replace
               
				$("#records").append(
					//$('<li>').append(
                    $('<li>').attr("data-date", dataDate).append(
					//	$('<h2>').text(recordTitle),
					//	$('<em>').text(recordYear),
						
						
						
						// $('<a>').attr("href", recordImageLarge).addClass("strip").attr("data-strip-caption",recordTitle).append($('<img>').attr("src", recordImage)),
						 $('<img>').attr("src", recordImage),
						
					//	$('<p>').text(recordDescription)
					)
				);
				
				$("#text").append(
					
                    $('<li>').append(
						$('<p>').text(recordDescription)
					)
				);
			$("p").attr("class", "centre");
			}
		}
		
	});
					
}
				
function getData(){	
var data = {
    resource_id: "5bc00f98-2d96-47d6-a0ca-2089ebd1130d",
    limit: 63
}

$.ajax({
    url: "https://data.gov.au/api/3/action/datastore_search",
    data: data,
    dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
    cache: true,
    success: function(data) {
        
        localStorage.setItem("sqlData", JSON.stringify(data));
        // iterateRecords(data);
        iterateRecords(data);
        
        
        }
    
});
}
/*$(document).ready(function() {

		var data = {
			resource_id: "5bc00f98-2d96-47d6-a0ca-2089ebd1130d",
			limit: 63
		}

		$.ajax({
			url: "https://data.gov.au/api/3/action/datastore_search",
			data: data,
			dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
			cache: true,
			success: function(data) {
				
				localStorage.setItem("sqlData", JSON.stringify(data));
				// iterateRecords(data);
				iterateRecords(data);
				
				
				}
			
	});
	// }

});
*/