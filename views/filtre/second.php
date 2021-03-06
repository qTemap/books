<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	<div class="header"></div>
	<div class="content">
	<a href="../../filtre/<?php echo $local; ?>/offline/?city=<?php echo $_GET['city'] ?>"><input type="button" value="Офф-лайн проекти" class="offline" name="offline"></a>
	<a href="../../filtre/<?php echo $local; ?>/online/?city=<?php echo $_GET['city'] ?>"><input type="button" value="Он-лайн проекти" class="online" name="online"></a>
	<a href="../all_project"><input type="button" value="Усі проекти" name="all" class="all"></a>

	</div>
</body>
</html>