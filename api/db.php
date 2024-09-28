<?php
$host = 'db'; 
$dbname = 'appDB';
$user = 'user';
$pass = 'password';

$mysqli = new mysqli($host, $user, $pass, $dbname);


if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}
?>
