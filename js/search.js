(function() {

	'use strict';
	
	// create map object using HTML5 location
	// TODO add error handling: use a default location in Bandung
	function initialize() {
	
		var mapOptions = {
			center: new google.maps.LatLng(-6.9148644, 107.6082421),
			zoom: 13
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		var service = new google.maps.DistanceMatrixService();
		
		navigator.geolocation.getCurrentPosition(function(position) {
		  var pos = new google.maps.LatLng(position.coords.latitude,
										   position.coords.longitude);

		  var infowindow = new google.maps.InfoWindow({
			map: map,
			position: pos,
			content: 'Anda berada di sini.'
		  })});

		$.get("http://localhost/ngidesehat/index.php/recommendation/index/" + querystring, function(loc) {
		
			var ctrlat = map.getCenter().lat;
			var ctrlng = map.getCenter().lng;
			loc.sort(function(a, b) {
				var alat = a.lat - ctrlat;
				var alng = a.lng - ctrlng;
				var blat = b.lat - ctrlat;
				var blng = b.lng - ctrlng;
				var ad = alat * alat + alng * blng;
				var bd = blat * blat + blng * blng;
				return ad - bd;
			});
			
			// generate map markers from facilities
			var markers = [];
			var destinations = [];
			var maxRatio = loc[0];
			var maxRating = loc[0];
			for (var i = 0; i < loc.length; i++)
			{
				var marker = new google.maps.Marker({
					id: loc[i].id,
					name: loc[i].name,
					position: new google.maps.LatLng(loc[i].lat, loc[i].lng),
					map: map
				});
				markers.push(marker);
				
				if (i < 25) {
					destinations.push(new google.maps.LatLng(loc[i].lat, loc[i].lng));
				}
				
				if (loc[i].ratio > maxRatio.ratio) {
					maxRatio = loc[i];
				}
				
				if (loc[i].rating > maxRatio.rating) {
					maxRating = loc[i];
				}
				
				// add click event to created marker
				// TODO change DOM on click
				google.maps.event.addListener(marker, 'click', function() {
					$.get("http://localhost/ngidesehat/index.php/facility/get/" + this.id, function(data) {
						$("#info_name").text(data.name);
						$("#info_type").text(getType(data.type));
						$("#info_address").text(data.address);
						$("#info_tel").text(data.tel);
						$("#info_class").text(data['class']);
						$("#info_kec").text(data.kec);
					});
				});
			}
			
			$("#most_empty").text(maxRatio.name + " (" + maxRatio.address + ")");
			$("#empty_ratio").text(maxRatio.ratio);
			$("#most_rated").text(maxRating.name + " (" + maxRating.address + ")");
			$("#rating").text(maxRating.rating);
			
			navigator.geolocation.getCurrentPosition(function(pos) {
				
				service.getDistanceMatrix(
				  {
					origins: [ new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude) ],
					destinations: destinations,
					travelMode: google.maps.TravelMode.DRIVING
				  }, function(response, status) {
				  
						var imin = 0;
				  
						var results = response.rows[0].elements;
						for (var i = 1; i < results.length; i++) {
							var element = results[i];
							var duration = element.duration.value;
							if (results[imin].duration.value > duration) {
								imin = i;
							}
						}
						
						var element = results[imin];
						$("#closest_name").text(response.destinationAddresses[imin]);
						$("#closest_time").text(element.duration.text);
						$("#closest_distance").text(element.distance.text);
				  });
			
			});
		
		});
		
	}
	google.maps.event.addDomListener(window, 'load', initialize);

}());
