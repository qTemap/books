<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="/template/css/style_project.css">
	<link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
</head>
<body>
	<input type="button" value="Вход" class="entry" name="entry">
	
	<div class="entry_panel">
		<input type="text">
		<input type="text">
	</div>
	
	<div class="fon"></div>
	
<div id="map"></div>
    <script>
      function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: false,
          zoom: 4
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFbEZZWcxtPyavxhJOzKEX0DVDlUHimcg&callback=initMap"
        async defer></script>


    
  </body>
</body>
</html>

// <script>
// 	$(document).ready(function() {

// 		$('.entry').click(function() {
// 			$('.entry_panel').css({'display':'block'});
// 		});

// 	});
// </script>