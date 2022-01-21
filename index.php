<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="template/css/main.css">
	<link rel="icon" href="template/img/ico.png" type="image/x-icon">
        <script src="template/js/jquery.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&family=Oswald:wght@200;400&display=swap" rel="stylesheet">
	<title>Library</title>
</head>
<body>

	<!-- Header -->
	<div class="header">
		<div class="container">
			<div class="row">
					<h1>Library</h1>
                                        <div class="mb-3 text-end">
					<a class="text-end" href="form.php">Добавить книгу</a>
                                        <div class="text-end">
					<a class="text-end" href="form2.php">Удалить книгу</a>
                                        </div>
                                        </div>
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

		<!-- Форма обработки id -->
	<div class='form-book center-block'>
		<form action="pdfreader.php" method=post>
			<div class="container">
				<div class="row d-flex justify-content-center">
		<div class="col-auto mt-1 text-center">
			Введите id книги из таблицы:
                        <input  class="form-control text-center" type="input" name="id_book" id="input" maxlength="2">
		<div class="col-auto mt-1 pb-3 text-center">
                    <input class="btn btn-primary" type="submit" name ="submit" id="button" value="Открыть">
		</form>
	</div>
</body>
</html>