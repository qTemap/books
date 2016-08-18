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
                    
                    $.each(obj, function( index, value ) {
                        var myGeocoder = ymaps.geocode(value[0],{kind:'locality'});
                        myGeocoder.then(
                            function (res) {
                                var coord = res.geoObjects.get(0).geometry.getCoordinates();
                                //alert(value[0]);
                                $.ajax({
                                    type: "POST",
                                    url: "#",
                                    data: {proj: value[0]},
                                    success: function(proj) {
                                        var obj1 = jQuery.parseJSON(proj);
                                        //console.log(obj1);
                                      //alert(obj1.value);
                                        var t = [];
                                         $.each(obj1, function( index, val ) {
                                             t[index]= val[0];                                            
                                         });
                                         //var r = ["1" ,"2"];
                                         var r = t.join('<br>');
                                         myMap.geoObjects
                                            .add(new ymaps.Placemark(coord, {
                                                balloonContent: '<a href="../filtre/city/?city='+value[0]+'">'+value[0]+'</a><br><br>'+r
                                            }));
                                         //alert(t.join(','));
                                           // console.log(t);
                                           // //alert(count);
                                           // for(var i = 1; i <= count; i++) {
                                           //  alert(t[i])
                                           // }
                                         
                                    }
                                });
                               
                                },
                            function (err) {
                                // обработка ошибки
                            }
                        );
                        
                        // myMap.geoObjects
                        //     .add(new ymaps.Placemark([value[0], value[1]], {
                        //     balloonContent: '<a href=project/'+value[3]+'>'+value[2]+'</a><br>'+value[4]
                            
// myGeocoder.then(
//     function (res) {
//         myMap.geoObjects.add(res.geoObjects,{balloonContent: value[4]});
//     },
//     function (err) {
//         // обработка ошибки
//     }
// );
                      
                    });
                }
            });      

           

           
        }
    </script>
<!--                             var myGeocoder = ymaps.geocode("город Харьков",{kind:'locality'});
myGeocoder.then(
    function (res) {
        myMap.geoObjects.add(res.geoObjects);
        myMap.geoObjects
                            .add(new ymaps.Placemark([value[0], value[1]], {
                            balloonContent: '<a href=project/'+value[3]+'>'+value[2]+'</a><br>'+value[4]
                             var myGeocoder = ymaps.geocode(value[2],{kind:'locality'});
        alert(res.geoObjects.get(0).geometry.getCoordinates());
    },
    function (err) {
        // обработка ошибки
    }
); -->

    <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 14px;
        }

        #map {
            width: 998px;
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

        input {
            width: 200px;
            height: 60px;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin-left: 200px;
            margin-top: 100px;
        }

        .header {
            width: 1000px;
            height: 50px;
            background-color: #444;
            margin: auto;
        }

        .content {
            width: 1000px;
            height: 1500px;
            margin: auto;
        }

        .all {
            margin-left: 402px;
        }

    </style>
</head>
<body>
    <div class="header">
        
    </div>

    <div class="content">
    	<a href="filtre/global"><input type="button" value="Загальнодержавні проекти" name="global" class="global"></a>
    	<input type="button" value="Рiдне місце" name="city" class="city">        
    	<a href="all_project"><input type="button" value="Усі проекти" name="all" class="all"></a>
    	<input type="button" class="back" value="Перейди до фільтру">
        <div id="map"></div> 
    </div>

</body>
</html>
<script>
	$(document).ready(function() {

		$('.city').click(function() {
			$('#map').css({'display':'block'});
			$('.global').css({'display':'none'});
			$('.city').css({'display':'none'});
			$('.back').css({'display':'inline-block','width':'499px','margin-left':'0px','margin-top':'0px'});
            $('.all').css({'display':'inline-block','width':'499px','margin-left':'0px','margin-top':'0px'});
		});

		$('.back').click(function() {
			$('#map').css({'display':'none'});
			$('.global').css({'display':'block'});
			$('.city').css({'display':'block'});
			$('.back').css({'display':'none'});
		});

	});
</script>