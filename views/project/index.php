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

        .content {
            width: 1000px;
            height: 1500px;
            margin: auto;
        }

        #project {
            width: 405px;
            height: 280px;
            margin-top: 60px;
            margin-left: 50px;
            background-color: #999;
            display: inline-block;
            padding: 10px;
        }

        .img_project img {
          width: 405px;
          height: 150px;
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
    <?php foreach ($projectList as $projectItem): ?>
      <div id="project">
          <a href="project/<?php echo $projectItem['id']; ?>">
                <div class="name_project"><?php echo $projectItem['name_project']; ?></div>
          </a>
          <div class="img_project"><img src="<?php echo $projectItem['img']; ?>" alt=""></div>
          <div class="price"></div>
          <div class="collected"></div>
          <?php echo $projectItem['user']."<br>";
          echo $projectItem['price']."<br>";
          echo $projectItem['collected']."<br>";
          echo $projectItem['days']."<br>";
          echo $projectItem['discription']."<br>";
          echo $projectItem['type']."<br>";
          echo $projectItem['type_pay']."<br>";
          echo $projectItem['collected']."<br>"; 
        ?>
      </div>
    <?php endforeach; ?>
  </div>


</body>
</html>

