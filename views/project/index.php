<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <script src="https://api-maps.yandex.ru/1.1/index.xml" type="text/javascript"></script>
  <div id="YMapsID" style="width:600px;height:400px"></div>
  <script type="text/javascript">

    // Создает обработчик события window.onLoad
    YMaps.jQuery(function () {
        // Создает экземпляр карты и привязывает его к созданному контейнеру
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
            
        // Устанавливает начальные параметры отображения карты: центр карты и коэффициент масштабирования
        map.setCenter(new YMaps.GeoPoint(31.10, 48.89), 5);
         var placemark = new YMaps.Placemark(new YMaps.GeoPoint(36.238857,50.027812));

// Устанавливает содержимое балуна

placemark.name = "<a href=''>Харьков</a>";
placemark.description = "Столица Российской Федерации";

// Добавляет метку на карту
map.addOverlay(placemark); 
    });
    // Создает метку в центре Москвы



</script>

</body>
</html> -->

<head>
    <title>Примеры. Определение адреса клика на карте с помощью обратного геокодирования</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
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
          console.log(coords);
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
          console.log(coords);
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
        });
    }
}
</script>
    <style type="text/css">
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 14px;
        }
        #map {
            width: 100%;
            height: 80%;
        }
        .header {
            width: 1000px;
            margin: auto;
            height: 70px;
            background-color: #444;
        }
    </style>

</head>
<body>
<div class="header">
  <?php 
    if (isset($_COOKIE['name']) && isset($_COOKIE['sename'])) {
      echo "<div class='name'>".$_COOKIE['name']."</div>";
    } else { 
      echo("<a href='".$fb->get_link()."'><div class='entry'>Войти</div></a>");
    }
?>
</div>
<div id="map"></div> 



</body>
</html>

