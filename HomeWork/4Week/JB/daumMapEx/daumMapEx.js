/**
 * @author Administrator
 */

window.onload = function() {
	var map = new daum.maps.Map(document.getElementById('map'), {
		center :  new daum.maps.LatLng(37.56613702849907, 126.97775967253064),//중앙이 서울
		level : 4,
		mapTypeId : daum.maps.MapTypeId.HYBRID
	});
	
	var marker = new daum.maps.Marker({
		position : new daum.maps.LatLng(37.56613702849907, 126.97775967253064)
	});
	
	var massage = new daum.maps.InfoWindow({
	//	positon : new daum.maps.LatLng(37.56613702849907, 126.97775967253064),
		content :"<table boder='1'><tr></tr>ggg<tr>Hansung Univercity center</tr></table>" ,
		//removable : true,
		disableAutoPan : false
		
	});
	marker.setMap(map);
	
	daum.maps.event.addListener(marker,"click", function(){
		massage.open(map, marker);
	});
	
	
	
}

function printMassage(marker){
	alert('a');
	
	
	massage.open(map, marker);
}




//37.56613702849907, 126.97775967253064//서울시청
//37.58173943182874,127.00991888676375한성대공학관