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
          height: 10px;
          padding: 8px;
        }

    </style>

</head>
<body>
	<div class="header">
		
	</div>
	<div class="content">		 
		<?php if(!empty($projectList)):
			foreach ($projectList as $projectItem): ?>
				<div id="project">
					<a href="../../../project/<?php echo $projectItem['id']; ?>">
						<div class="name_project"><?php echo $projectItem['name_project']; ?></div>
					</a>
					<div class="img_project"><img src="<?php echo $projectItem['img']; ?>" alt=""></div>
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
			<?php endforeach; ?>
		<?php else: ?>
			<div class="error_filtre">No</div> 
		<?php endif; ?>
	</div>
</body>
</html>