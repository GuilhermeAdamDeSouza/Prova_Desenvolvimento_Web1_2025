<?php
require 'auth.php';
require 'config.php';
$id = $_GET['id'] ?? null;
if ($id) {
$stmt = $mysqli->prepare('DELETE FROM produtos WHERE id=?');
$stmt->bind_param('i',$id);
$stmt->execute();
$stmt->close();
}
header('Location: produtos.php');