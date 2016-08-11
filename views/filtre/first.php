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

         $.ajax({
            type: "POST",
            url: "#",
            data: {map: 'map'},
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                console.log(obj);
                //alert(obj.point4[1]);
                $.each(obj, function( index, value ) {
                    myMap.geoObjects
                        .add(new ymaps.Placemark([value[0], value[1]], {
                        balloonContent: value[2]
                    })); 
                });

             
                // for (var i = 1; i < 3; i++) {
                
                    
       
                    
                // }

            }
        });
        
        //    $.ajax({
        //     type: "POST",
        //     url: "#",
        //     data: {map: 'map'},
        //     success: function(data) {
        //         var obj = jQuery.parseJSON(data);
        //         console.log(data);
        //         alert(obj.point4[1]);
                
        //         for (var i = 0; i < 4; i++) {
                  

        //             myMap.geoObjects
        //                 .add(new ymaps.Placemark([obj.point+i[1], obj.point+i[2]], {
        //                 balloonContent: ''
        //             })); 
        //         }

        //     }
        // });
         
    //вывод всех меток на карту
      
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
       // echo "<pre>";
        //print_r($newsList);
       // echo "</pre>";
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