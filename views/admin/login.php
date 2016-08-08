<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="/template/js/jquery-1.11.0.min.js"></script>
	<script src="/template/js/new.js"></script>
	<script>

		var login = prompt('Введите логин');

		if(login != '') {
			$.ajax({
				type: "POST",
				url: "#",
				data: {login: login},
				success: function(data) {
					if(data == "Login") {
						var password = prompt('Введите пароль');
						if(password != '') {
							$.ajax({
								type: "POST",
								url: "#",
								data: {password: password},
								success: function(data) {
									if(data == "Password") {
										alert("Добро пожаловать, администратор!");
										document.location.href = "admin/panel";
									} else {
										document.location.href = "filtre";
									}
								}
							});
						}
					} else {
						document.location.href = "filtre";
					}
				}
			});
		}
	
	</script>
</head>
<body>

</body>
</html>