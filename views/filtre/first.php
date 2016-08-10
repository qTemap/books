<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script>
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
        
          
         
    //вывод всех меток на карту
    myMap.geoObjects
        .add(new ymaps.Placemark([55.684758, 37.738521], {
            balloonContent: ''
        }));    
}
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
            display: none;
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
	<a href="filtre/global"><input type="button" value="Загальнодержавні проекти" name="global" class="global"></a>
	<input type="button" value="Рiдне місце" name="city" class="city">
	<a href="all_project"><input type="button" value="Усі проекти" name="all" class="all"></a>
	<input type="button" class="back" value="Перейди до фільтру">
    <?php 
       print_r($newsList);
     ?>

<div id="map"></div> 
</body>
</html>
<script>
	$(document).ready(function() {

		$('.city').click(function() {
			$('#map').css({'display':'block'});
			$('.global').css({'display':'none'});
			$('.city').css({'display':'none'});
			$('.back').css({'display':'block'});
		});

		$('.back').click(function() {
			$('#map').css({'display':'none'});
			$('.global').css({'display':'block'});
			$('.city').css({'display':'block'});
			$('.back').css({'display':'none'});
		});

	});
</script>