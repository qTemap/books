<!DOCTYPE html>
<html lang="en">
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
      setcookie("name",$_COOKIE['name'],time()+(1000*60*60*24*30*12));
            setcookie("sename",$_COOKIE['sename'],time()+(1000*60*60*24*30*12));
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

