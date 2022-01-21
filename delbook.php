<?php

$erros = array();

// Переменная где хранится id удаления книги
$idBook = $_POST['id_book_del'];

// Проверка на пустое поле
if($idBook == null)
{

	$errors[0] = "Ошибка: вы не заполнили поле Id";

}

// Подключаемся к БД
include_once 'config/db_config.php';

// Шаблон запроса на поиск пути книги по id
$find_sql = "SELECT * FROM books WHERE id = $idBook";

// Отправляем sql запрос
$sql_find = mysqli_query($link, $find_sql);

// Результат запроса к БД в виде массива
$result = mysqli_fetch_array($sql_find);

// Удаление файла PDF
$del_file = unlink($result[2]);

// Шаблон sql запроса в БД
$del_sql = "DELETE FROM books
WHERE id = $idBook";

// Выполняем sql запрос на удаление книги из БД
$sql = mysqli_query($link, $del_sql);

// Если sql запрос выполнен с ошибкой
if (!$sql || $sql_find)
{

	$errors[1] = "Ошибка: Не корректный запрос к БД";

}

// Если sql запрос выполнен успешно
else
{

	echo "Книга успешно удалена!";

}

// Если функция удаления выполнена с ошибкой
if (!$del_file){

	$errors[2] = "Файл не удален";

}
else{
    
	echo "Книга успешно удалена!";
        
        $discharge = "SELECT COUNT(*) as count FROM books";
        
        // Выполняем sql запрос на сброс auto_increment
        $sql = mysqli_query($link, $discharge);
        
        // Получаем ответ в виде массива
        $discharge_sql = mysqli_fetch_array($sql);
        
        // Записываем элемент в массив
        $result = $discharge_sql[0];
      
        
        // Цикл который упорядочивает id после удаления из середины списка.
        /*
         * $i = idbook+1, $s = idbook, $result=countstring
         */
        $i = $idBook+1;
        $s = $idBook;
        while ($s <= $result){
            
            $sql_update = mysqli_query($link, "UPDATE books SET id = $s WHERE id = $i");
            $i++;
            $s++;
            
        }
         
        // Шаблон sql запроса на сброс autoincrement
        $autoincrement = "ALTER TABLE books AUTO_INCREMENT = $result";
        
        // SQL запрос на сброс autoincrement
        $sql2 = mysqli_query($link, $autoincrement);
        
        
}

// Перебираем массив с ошибками
foreach ($errors as $value) 
	{

	echo $value;

	}
        
