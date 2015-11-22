<!DOCTYPE html>
<html>
<head>
	<style>
		#map {
			width: 500px;
			height: 400px;
		}
	</style>
</head>
<body>
	<div id="map"></div>
</body>
<script type="text/javascript" src="gmap_utils.js"></script>
<script>
		function initMap() {
			var mapCanvas = document.getElementById('map');
			var mapOptions = {
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				rotateControl: true
			};
			var map = new google.maps.Map(mapCanvas, mapOptions);
			setCurrentPosition(map);
		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgYE-d_EX4Jq0b-D-eB2px1NTQxYXW0&callback=initMap">
</script>
</html>