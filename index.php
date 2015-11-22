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
<script>
		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		  infoWindow.setPosition(pos);
		  infoWindow.setContent(browserHasGeolocation ?
		                        'Error: The Geolocation service failed.' :
		                        'Error: Your browser doesn\'t support geolocation.');
		}

		function getCurrentPosition (map) {
			var pos = {};
				// Try HTML5 geolocation.
		  if (navigator.geolocation) {
		  	navigator.geolocation.getCurrentPosition(function(position) {
		  		 currentPosition = {
		  			lat: position.coords.latitude,
		  			lng: position.coords.longitude
		  		};
				var infoWindow = new google.maps.InfoWindow({map: map});
				infoWindow.setPosition(currentPosition);
      	infoWindow.setContent('Your Location.');
				map.setCenter(currentPosition);
		  		
		  	}, function() {
		  		handleLocationError(true, infoWindow, map.getCenter());
		  	});
		  } else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
		  }
		  return pos;
		}

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
			};
			var map = new google.maps.Map(mapCanvas, mapOptions);
			getCurrentPosition(map);
	}
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgYE-d_EX4Jq0b-D-eB2px1NTQxYXW0&callback=initMap">
</script>
</html>