<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
					alert("Ошибка!");
				}
				else
				{
					alert("Книга успешно удалена!");
				}           
			},
		});
                
                function ReloadTable(data){
                        $('tbody').html(data);
                }
    
                $.ajax({
                    type: 'POST',
                    url: 'tableinput.php',
                    data: 'html',
                    success: ReloadTable
                });
	});
});
	</script>
       
	<title>Удаление книги</title>
</head>
<body>
	<!-- Book Del Title -->
	<div class="title_del">
		<div class="container">
			<div class="row">
				<h1>Удаление книги</h1> 
                                <a href="index.php" class="text-end pb-3">Назад</a>
			</div>
		</div>
	</div>
	
        <!-- Таблица (OUTPUT DB) -->
	<div class ="listbooks">
		<div class="container">
			<div class="row">
				<div class="table-responsive">
		<table class="table table-bordered table-striped mb-0 text-center">
			<tr>
				<th>ID Книги</th>
				<th>Название книги</th>
			</tr>
                      
<?php

			// Подключение к БД 
			include_once 'config/db_config.php';

		    //Выполняем sql запрос на получение таблицы с книгами
            $sql = mysqli_query($link, 'SELECT id, name FROM books');

            // Запускаем цикл перебора массива
			while($result = mysqli_fetch_array($sql)){
			echo "<tr>";	
			echo "<td>{$result['id']}</td>";
			echo "<td>{$result['name']}</td>";
			echo "</tr>";
			}

			?>
	</table>
</div>
</div>
        </div>
</div>
        
        	<!-- Delete Book UploadForm -->
	<div class="form-del-book center-block">
            <form action="delbook.php" method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="row d-flex justify-content-center">
		<div class="col-auto mt-2 text-center">
		Введите id книги для удаления:
		<input type="input" class="form-control text-center" name="id_book_del" id ="input2" maxlength="3">
		<div class="col-auto mt-1 pb-3 text-center">
                    <input type="submit" class="btn btn-primary" name= "del_sub" onclick="clear()" value="Удалить">
	</form>
</div>


</body>
</html>