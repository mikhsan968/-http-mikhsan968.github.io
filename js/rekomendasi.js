(function() {

	'use strict';
	
	/* SO 979975 */
	var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    	// If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
    	// If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
    	// If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  } 
    return query_string;
} ();
	
	function getType(code) {
		switch (code) {
		case 'P1': return 'Puskesmas';
		case 'P2': return 'Dokter Umum Praktik Mandiri';
		case 'P3': return 'Dokter Gigi/Klinik Gigi';
		case 'P4': return 'Klinik Pratama';
		case 'P5': return 'Faskes Tk1 TNI';
		case 'P6': return 'Faskes Tk1 POLRI';
		case 'P7': return 'RS Klas D Pratama/RS Bersalin/Balai Pengobatan';
		case 'L1': return 'RSUP/RSUD';
		case 'L2': return 'RS TNI';
		case 'L3': return 'RS POLRI';
		case 'L4': return 'RS SWASTA';
		case 'L5': return 'RS Khusus Pemerintah';
		case 'L6': return 'KLINIK UTAMA/BALAI KESEHATAN MASYARAKAT';
		case 'S1': return 'APOTEK';
		case 'S2': return 'LAB';
		case 'S3': return 'OPTIK';
		case 'S4': return 'BIDAN/PERAWAT';
		default: return 'FASKES PENUNJANG LAIN';
		}
	}
	
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

		
		$.get("http://localhost/ngidesehat/index.php/recommendation/index/" + QueryString.kebutuhan, function(loc) {
		
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
