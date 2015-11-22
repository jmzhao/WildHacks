	var currentPosition = {};
	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
			'Error: The Geolocation service failed.' :
			'Error: Your browser doesn\'t support geolocation.');
	}

	function setCurrentPosition (map) {
				// Try HTML5 geolocation.
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						currentPosition = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						};
						var marker=new google.maps.Marker({
							position:currentPosition,
							animation:google.maps.Animation.BOUNCE
						});
						marker.setMap(map);
						map.setCenter(currentPosition);

					}, function() {
						handleLocationError(true, infoWindow, map.getCenter());
					});
				} else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
		  }
		}