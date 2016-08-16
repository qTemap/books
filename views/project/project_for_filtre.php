<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php echo $project['name_project'];
	echo $project['user'];
echo $project['price'];
echo $days;
echo $project['discription'];
echo $project['type'] == 'online' ? 'Интернет проект' : 'Реальный проект';

echo $project['type_pay'] == 'part' ? 'Долевое участие в проекте' : 'Благотворительные взносы';

	 echo  $address;


	 ?>

</body>
</html>