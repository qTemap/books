<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 <script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script> 
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>

         // $.ajax({
         //            type: "POST",
         //            url: "#",
         //            data: {},
         //            success: function(data) {
         //                alert(data);
         //                //window.location.href = "/project";
         //            }
         //        }); 

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


   

    $('.local_global input').click(function() {
    	$('.view_map').remove(); 
    	$('#map').remove();
    		$('.creat_project').click(function() {
				var h = '1';
				var name_project = $('.name_project input').val();
				var discription = $('.discription input').val();
				var price = $('.price input').val();
				var days = $('.days input').val();
				var type = $('.type select').val();
				var type_pay = $('.type_pay select').val();

                $.ajax({
					type: "POST",
					url: "#",
					data: {type: type, type_pay: type_pay, name_project: name_project, discription: discription, price: price, days: days, global: h},
					success: function(data) {
						alert(data);
						//window.location.href = "/project";
					}
				});		
		 });
	});

    $('.view_map').click(function() {
    	$('#map').css({'display':'block'});
    	$('.local_global').css({'display':'none'});
		$('.local_global input').css({'display':'none'});
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
        
                $('.creat_project').click(function() {
					var name_project = $('.name_project input').val();
					var discription = $('.discription input').val();
					var price = $('.price input').val();
					var days = $('.days input').val();
					var type = $('.type select').val();
					var type_pay = $('.type_pay select').val();
					var global = '0';
	                $.ajax({
						type: "POST",
						url: "#",
						data: {place: place, coord_1: coord_1, coord_2: coord_2, global: global, type: type, type_pay: type_pay, name_project: name_project, discription: discription, price: price, days: days},
						success: function(data) {

							//window.location.href = "/project";
						}
					});

				 });
        });
    }
}
$(document).ready(function() {
 // $('#map').click(function() {
 //    	alert("sdgfds");
 //    });

var i = 1400; //1400 грн нужно собрать
var f = 700; //собрано 1000 грн
var r = (f*100)/1400;
$('.col').css({'width':r+'%'});
$('.pr').html(f+'грн');
$('.pr').css({'width':r+'%'});

function readURL(input,i) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+i).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".Img").change(function(){
            var i = $(this).attr("id");
            readURL(this,i);
        });
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

        .bar {
        	width: 200px;
        	height: 30px;
        	border: 1px solid;
        	position: absolute;
        }

        .col {
			height: 30px;
			background-color: #444;
			position: relative;
        }

        .pr {
        	margin: auto;
        	height: 10px;
        	padding: 8px;
        }

        .img_1 img {
            width: 150px;
        }

		       


    </style>
</head>
<body>
<div class="name_project">Название проекта:      <input type="text"></div>
<form action="#" method="post">
<div class="image_project">Изображение проекта:     <div class="img_1"><img id="1" src='' alt=""></div> 
<input type="file" name="picture" id="1" class="Img" /></div>
</form>
<div class="discription">Описание к проекту:      <input type="text"></div>
<div class="price">Цена, нужная на реализацию идеи:      <input type="text"></div>
<div class="days">Количество дней, на сбор средств:      <input type="text"></div>
<div class="type">Выберите тип проекта: интернет проект или проект в реальной жизне: <select>
	<option value="online">Интернет проект</option>
	<option value="offline">Реальный проект</option>
</select></div>
<div class="type_pay">Выберите тип взносов: <select>
	<option value="charity">Благотворительные взносы</option>
	<option value="part">Долевые взносы в проект</option>
</select></div>
<div class="image1">Дополнительное изображение:      <input type="text"></div>
<div class="discription1">Дополнительное описание:      <input type="text"></div>
<div class="local_global">Проект общегосударственный: <input type="checkbox"></div>
<div class="view_map">Укажите на карте место реализации проекта или примерное его место нахождение: <input type="button" value="Показать карту"></div>
<div id="map"></div> 
<input type="submit" class="creat_project" value="Создать свой проект">

<div class="bar"><div class="col"><div class="pr"></div></div></div>

</body>
</html>

<script>

</script>
