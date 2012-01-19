/**
 * @author Hyosun
 */

$(document).ready(init);
var mapInfo = {
	map : null
};

function init() {
	initMap();
	$('#btnEngineer').bind('click', goEngineer);
}
			
function initMap() {
	var position = new daum.maps.LatLng(37.567168, 126.977963); // 서울 시청
	mapInfo.map = new daum.maps.Map(document.getElementById('map'), {
		center: position,
		level: 4
	});
	var zoomControl = new daum.maps.ZoomControl();
	mapInfo.map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
	var mapTypeControl = new daum.maps.MapTypeControl();
	mapInfo.map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);
}

function goEngineer() {
	var latlng = new daum.maps.LatLng(37.581836, 127.009852);	// 한성대학교 공학관
	var marker = new daum.maps.Marker({
		position: latlng
	});
	mapInfo.map.panTo(latlng);
	
	var infowindow = new daum.maps.InfoWindow({
		/* Q. 로컬API 사용해서 주소 얻어와 지명과 주소 보여주고 싶은데... xml파싱ㅠ.ㅠ */
		content: '<p class="place">한성대학교 공학관</p><p>서울특별시 성북구 삼선동2가 395</p>', 
		removable : true
	});
	daum.maps.event.addListener(marker, 'click', function() {
		infowindow.open(mapInfo.map, marker);
	})
	marker.setMap(mapInfo.map);
}

