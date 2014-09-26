(function() {

	'use strict';
	
	// create map object using HTML5 location
	// TODO add error handling: use a default location in Bandung
	
	google.maps.event.addDomListener(window, 'load', function() { navigator.geolocation.getCurrentPosition(function(position) {
		var mapOptions = {
			center: {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			},
			zoom: 13
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		$.get("http://localhost/ngidesehat/index.php/api/facilities", function(facilities) {
			// generate map markers from facilities
			var markers = [];
			for (var i = 0; i < facilities.length; i++)
			{
				var marker = new google.maps.Marker({
					id: facilities[i].id,
					title: facilities[i].name,
					position: new google.maps.LatLng(facilities[i].lat, facilities[i].lng),
					map: map
				});
				markers.push(marker);
				
				// add click event to created marker
				// TODO change DOM on click
				google.maps.event.addListener(marker, 'click', function() {
					alert(this.id);
				});
			}
		});

	})});

}());
