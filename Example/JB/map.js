/**
 * @author Administrator
 */
var map;
var lng;
var lat;

$(document).ready(function() {
	$('#searchLocalStart').bind('click', searchStart);
	$('#searchLocalNameStart').bind('click', searchNameStart);
});

window.onload = function drawMap() {
	var location = new daum.maps.LatLng(37.56613702849907, 126.97775967253064);
	map = new daum.maps.Map(document.getElementById('map'), {
		center : location,
		level : 5
	})
	daum.maps.event.addListener(map, "dragend", function() {
		var center = map.getCenter();
	$('#message').html("latitude : " + center.getLat() + "<br />longitude: " + center.getLng());
	});
}
function searchStart() {
	var searchName = $('#searchLocal').val();
	var script = document.createElement('script');
	var apikey = "d8d3ede8cd57c2a498843bae23df04ec71997639";
	script.type = "text/javascript";
	script.charset = 'utf-8';
	script.src = "http://apis.daum.net/local/geo/addr2coord?apikey=" + apikey + "&q=" + searchName + "&output=json&callback=moveMap";
	// alert("a");
	// alert(searchName);
	// alert(script.type);
	// alert(script.charset);
	// alert(script.src);
	document.getElementsByTagName('head')[0].appendChild(script);
}

function moveMap(data) {
	lat = data.channel.item[0].lat;
	lng = data.channel.item[0].lng;
	// alert(lat);
	// alert(lng);
	// alert(map.center);
	var location = new daum.maps.LatLng(lat, lng);
	map.panTo(location);
	var marker = new daum.maps.Marker({
		position : location
	})
	marker.setMap(map);

	var a = $('#searchLocal').val();
	$('#searchLocal').html("<p>" + a + "</p>");
	var b = $('#searchLocal').html();

	var massage = new daum.maps.InfoWindow({
		position : location,
		content : b
	});

	daum.maps.event.addListener(marker, 'click', function() {
		massage.open(map, marker);
	})
}

function searchNameStart() {
	var center = map.getCenter();
	var searchName = $('#searchLocal').val();
	var script = document.createElement('script');
	var apikey = "d8d3ede8cd57c2a498843bae23df04ec71997639";
	script.type = "text/javascript";
	script.charset = 'utf-8';

	script.src = "http://apis.daum.net/local/geo/coord2addr?apikey=" + apikey + "&longitude=" + center.getLng() + "&latitude=" + center.getLat() + "&output=json&callback=printName";
	// alert("a");
	// alert(searchName);
	// alert(script.type);
	// alert(script.charset);
	// alert(script.src);
	document.getElementsByTagName('head')[0].appendChild(script);
}

function printName(data) {
	$('#searchLocalName').val(data.fullName);
}