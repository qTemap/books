<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script>
</head>
<body>
	<a href="filtre/global"><input type="button" value="Загальнодержавні проекти" name="global" class="global"></a>
	<a href=""><input type="button" value="РІдне місце" name="city" class="city"></a>
	<a href="all_project"><input type="button" value="Усі проекти" name="all" class="all"></a>
</body>
</html>
<script>
	$(document).ready(function() {

		$('.city').click(function() {
			alert("MAP");
		});



	});
</script>