<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="template/css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&family=Oswald:wght@200;400&display=swap" rel="stylesheet">
	<link rel="icon" href="template/img/ico.png" type="image/x-icon">
	<script type="text/javascript" src="template/js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

	$('form').submit(function(event){

		event.preventDefault();
		
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result){
				var errors = result.indexOf("Ошибка:");
				if (errors == "0"){
					alert("Ошибка!")
				}
				else{
					alert("Книга успешно добавлена!")
				}
			},
		});
	});
});
	</script>
       
	<title>Добавление книги</title>
</head>
<body>
	<!-- Book Add Title -->
	<div class="title_add">
		<div class="container">
			<div class="row">
				<h1>Добавление книги</h1> 
                                <a href="index.php" class="text-end">Назад</a>
			</div>
		</div>
	</div>

  	<!-- Add Book UploadForm -->
<div class="upload_add_book d-flex">
	<div class="container">
		<div class="row">
	<form action="editbook.php" method="post" enctype="multipart/form-data">
		<div class="col-auto mt-2 text-center">
		Введите название книги
		</div>
		<input type="input" class="form-control" name="name_book" id="input1" maxlength="40">
		<div class="col-auto mt-3">
		<input type="file" class="custom-file" name="upload">
		<div class="col-auto mt-3">
                    <input type="submit" class="btn btn-primary" name= "upload_sub" value="Добавить">
	</form>
</div>
                

</body>
</html>