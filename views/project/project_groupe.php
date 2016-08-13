<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script>
	<title>Document</title>
	  <style type="text/css">
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 14px;
        }

        .header {
            width: 1000px;
            margin: auto;
            height: 70px;
            background-color: #aaa;
        }

        .content {
            width: 1000px;
            margin: auto;
            height: 2000px;
            background-color: #444;
        }

        #project {
        	width: 425px;
        	height: 300px;
        	margin-top: 60px;
        	margin-left: 50px;
        	background-color: #999;
        	display: inline-block;
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

		       


    </style>
</head>
<body>
	<div class="header">
		
	</div>
	<div class="content">
		<?php foreach ($projectList as $projectItem): ?>
			<div id="project">
				
					<img src="<?php echo $projectItem['img']; ?>" alt="">
					<?php
					echo $projectItem['name_project']."<br>";
					echo $projectItem['user']."<br>";
					echo $projectItem['price']."<br>";
					echo $projectItem['collected']."<br>";
					echo $projectItem['days']."<br>";
					echo $projectItem['discription']."<br>";
					echo $projectItem['type']."<br>";
					echo $projectItem['type_pay']."<br>"; 
				?>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>

<script>	
	var height = $('#project').outerHeight(true);
	var count_news = $('div#project').length;
	count_news = Math.ceil(count_news/2);	
	var height_content = count_news*height+60;
	$('.content').height(height_content);
</script>