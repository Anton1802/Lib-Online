<?php

// Задержка
sleep(2);

// Подключение к БД 
include_once 'config/db_config.php';

//Выполняем sql запрос на получение таблицы с книгами
$sql = mysqli_query($link, 'SELECT id, name FROM books');

// Отображаем готовые столбцы таблицы
echo '<tr>';
echo '<th>ID Книги</th>';
echo '<th>Название книги</th>';
echo '</tr>';

// Запускаем цикл перебора массива
while($result = mysqli_fetch_array($sql))
{
    echo "<tr>";	
    echo "<td>{$result['id']}</td>";
    echo "<td>{$result['name']}</td>";
    echo "</tr>";
}

