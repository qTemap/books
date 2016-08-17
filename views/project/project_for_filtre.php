<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script> 
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
            height: 1040px;
            margin: auto;
        }

        #project {
            width: 800px;
            height: 1000px;
            margin: auto;            
            background-color: #999;
           	padding: 20px;
        }

        .img_project img {
          width: 800px;
          height: 400px;
        }

        .bar {
          width: 800px;
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
			height: 10px;
			padding: 8px;
			margin: auto;
        }

        .name_project {
			font-size: 30px;
        }

        .discription {
        	font-size: 20px;
        	text-indent: 40px;
        }
    </style>
</head>
<body>
	<div class="header">
		
	</div> 	
	<div class="content">
		<div id="project">
			<div class="name_project"><?php echo $projectItem['name_project']; ?></div>
			<div class="img_project"><img src="<?php echo $projectItem['img']; ?>" alt=""></div>
			<div class="discription"><?php echo $projectItem['discription']; ?></div>
			<div class="bar" id="<?php echo $projectItem['id']; ?>">
				<div id="<?php echo $projectItem['id']; ?>" class="col">
					<div id="<?php echo $projectItem['id']; ?>" class="pr">
					</div>
				</div>
			</div>
			<div class="days"><br><br>Осталось дней: <?php echo $days = Project::get_duration(date('Y-m-d'),$projectItem['days'])."<br>";?></div>
			<div class="type"><?php echo $projectItem['type'] == 'online' ? 'Интернет проект' : 'Реальный проект';?></div>
			<div class="type_pay"><?php echo $projectItem['type_pay'] == 'part' ? 'Долевое участие в проекте' : 'Благотворительные взносы'; ?></div>

			<script type="text/javascript">
				var id = "<?php echo $projectItem['id']; ?>";
				var i = "<?php echo $projectItem['price']; ?>";
				var f = "<?php echo $projectItem['collected']; ?>";
				var r = (f*100)/i;
				$('div#'+id+'.col').css({'width':r+'%'});
				$('div#'+id+'.pr').css({'width':r+'%'});
				$('div#'+id+'.pr').html(f+'грн');
			</script>
		</div>
	</div>
</body>
</html>