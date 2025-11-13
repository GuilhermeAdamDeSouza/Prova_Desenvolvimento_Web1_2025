<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sistema_php';
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) die('Erro BD');
?>