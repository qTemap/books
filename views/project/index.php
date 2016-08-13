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
    <title>Проекти</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
    <style type="text/css">
        
        body {
          margin: 0 auto;
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

        a {
          text-decoration: none;
          color: black;
        }

    </style>

</head>
<body>
<div class="header">
  <?php 
    if (isset($_COOKIE['name']) && isset($_COOKIE['sename'])) {
      echo "<div class='name'>".$_COOKIE['name']."</div>";
    } else { 
      echo("<a class='entry' href='".$fb->get_link()."'>Войти</a>");
    }
?>
</div>


  <div class="content">
    <a href="../create"> <div class="create_project">Создать</div></a>
  </div>



</body>
</html>

