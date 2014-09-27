(function() {

	'use strict';
	
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
		
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay = new google.maps.DirectionsRenderer();
		directionsDisplay.setMap(map);
		
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
			
		});
		
	}
	google.maps.event.addDomListener(window, 'load', initialize);

}());
