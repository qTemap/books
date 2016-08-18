<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if (isset($projectList['name_project'])):?>
	<form action="#" method="post">
    <div class="image_project">Изображение проекта:     <div class="img_1"><img id="1" src='' alt=""></div> 
    <input type="file" name="picture" id="1" class="Img" /></div>
    </form>	
	<?php else: ?>
		<div class="error">У вас нет своего проекта!</div>
		<a href="create">
			<div class="back"><input type="button" value="Создать проект"></div>
		</a>
	<?php endif; ?>
</body>
</html>

<script type="text/javascript">
	function readURL(input,i) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+i).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".Img").change(function(){
            var i = $(this).attr("id");
            readURL(this,i);
        });
</script>