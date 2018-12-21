<?php
//$pdo = new PDO('mysql:host=localhost;dbname=users;charset=utf8','root','');

$pdo = @mysqli_connect('localhost', 'root', '', 'comment') or die('ошибка');
if(!$pdo) die(mysqli_connect_error());

mysqli_set_charset($pdo, "utf8") or die('не установлена кодировка');
?>