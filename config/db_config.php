<?php

$link = mysqli_connect('localhost', 'root', 'anton', 'library');

if (!$link){
	die ('Error'. mysqli_error());
}
mysqli_set_charset($link, "utf8");

?>