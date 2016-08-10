<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 <script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script> 
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>
    ymaps.ready(init);

function init() {
    var myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [48.848506, 31.531127],
            zoom: 6
        }, {
            searchControlProvider: 'yandex#search'
        });     

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
          
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);

            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
            	
                getAddress(myPlacemark.geometry.getCoordinates());
            });
            

        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

           myPlacemark.properties
                .set({
                    iconCaption: firstGeoObject.properties.get('name'),
                    balloonContent: firstGeoObject.properties.get('text')
                });
                var place = myPlacemark.properties._data.balloonContent;
                var coord_1 = coords[0];
                var coord_2 = coords[1];

                $.ajax({
					type: "POST",
					url: "#",
					data: {place: place, coord_1: coord_1, coord_2: coord_2},
					success: function(data) {
						
					}
				});
        });
    }
}
$(document).ready(function() {
 // $('#map').click(function() {
 //    	alert("sdgfds");
 //    });
});

</script>
    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 14px;
        }

        #map {
            width: 1000px;
            height: 600px;
            margin: auto;
            border: 1px solid;
        }

        .header {
            width: 1000px;
            margin: auto;
            height: 70px;
            background-color: #444;
        }

        .name {
          margin-top: 20px;
          font-size: 20px;
          float: right;
        }

        a.entry {
          text-decoration: none;
          width: 50px;
          height: 30px;
          font-size: 20px;
          color: #111;
          background-color: #999;
        }

        .back {
        	display: none;
        }
    </style>
</head>
<body>

<div id="map"></div> 
</body>
</html>
