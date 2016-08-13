<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if (isset($projectList['name_project'])):?>
		
	<?php else: ?>
		<div class="error">У вас нет своего проекта!</div>
		<a href="create">
			<div class="back"><input type="button" value="Создать проект"></div>
		</a>
	<?php endif; ?>
</body>
</html>