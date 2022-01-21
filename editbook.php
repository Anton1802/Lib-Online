<?php
// Массив с ошибками
$errors = array();

//Иницилизация перменных из массива $_FILES
$fileTmpPath = $_FILES['upload']['tmp_name'];
$fileName = $_FILES['upload']['name'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));

//Обработка формы с названием книги
$NameBook = $_POST['name_book'];

$uploadFileDir = 'pdfbooks/';
$DestPath = $uploadFileDir . $fileName;

// Проверка на входные данные
if($fileExtension == 'pdf' && !file_exists($DestPath))
{
    
//Загружаем файл на сервер 
if(!move_uploaded_file($fileTmpPath, $DestPath))
	{

	$errors[0] = 'Ошибка: Файл либо существует, либо ошибка загрузки';

        }
        
// Если поля пустые
if ($NameBook != null)
	{

// Подключаем соединение с БД
include_once 'config/db_config.php';

// Отправляем SQL запрос в БД
$into_sql = "INSERT INTO books (name, path)
		 VALUES
		 ('$NameBook', '$DestPath')";
	}

else
	{

	$errors[1] = "Ошибка: Поля не заполнены!";

	}

// SQL запрос к БД
$sql = mysqli_query($link, $into_sql);

// Если соединение не установлено
if (!$link)
	{

	$errors[2] = 'Ошибка: Нет соединения с БД Код ошибки: '. mysqli_connect_errno();	

	}

// Если выполнен не корректный запрос к БД
if (!$sql)
	{

	$errors[3] = "Ошибка: Выполнен не корректный запрос в БД";

	}

}

else
	{

	$errors[4] = "Ошибка: Файл имеет расширение не PDF";	

	}


// Если sql запрос прошел успешно 
if($sql)
	{

	echo 'Книга успешно добавлена.';

	}
        

// Перебираем массив с ошибками
foreach ($errors as $value) 
	{

	echo $value;

	}
