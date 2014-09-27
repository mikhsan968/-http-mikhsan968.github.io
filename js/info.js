(function() {

	'use strict';
	
	function initialize() {
	
		var map;
		$.get("http://localhost/ngidesehat/index.php/facility/get/" + main_id, function(loc) {
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				center: new google.maps.LatLng(loc.lat, loc.lng),
				zoom: 17
			});
		});
	
		$.get("http://localhost/ngidesehat/index.php/facility/locations", function(loc) {
			
			// generate map markers from facilities
			var markers = [];
			for (var i = 0; i < loc.length; i++)
			{
				var marker = new google.maps.Marker({
					id: loc[i].id,
					name: loc[i].name,
					position: new google.maps.LatLng(loc[i].lat, loc[i].lng),
					map: map
				});
				markers.push(marker);
				
				// add click event to created marker
				// TODO change DOM on click
				google.maps.event.addListener(marker, 'click', function() {
					window.location.assign("http://localhost/ngidesehat/index.php/info/faskes/" + this.id)
				});
			}
			
		});
		
	}
	google.maps.event.addDomListener(window, 'load', initialize);

}());
