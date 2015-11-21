<!DOCTYPE html>
<html>
<head>
	<style>
		#map {
			width: 500px;
			height: 400px;
		}
	</style>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script>
		function initMap() {
			var mapCanvas = document.getElementById('map');
			var mapOptions = {
				center: new google.maps.LatLng(44.5403, -78.5463),
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				rotateControl: true
			}
			var map = new google.maps.Map(mapCanvas, mapOptions)
		}
	</script>
</head>
<body>
	<div id="map"></div>
</body>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgYE-d_EX4Jq0b-D-eB2px1NTQxYXW0&callback=initMap">
</script>
</html>