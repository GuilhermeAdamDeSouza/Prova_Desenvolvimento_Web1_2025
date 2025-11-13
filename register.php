<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$stmt = $mysqli->prepare('INSERT INTO users (nome,email,senha) VALUES (?,?,?)');
$stmt->bind_param('sss',$nome,$email,$senha);
$ok = $stmt->execute();
$stmt->close();
if ($ok) header('Location: login.php');
}
?>
<!doctype html>
<html lang="pt-br"></html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Cadastro</title>
</head>
<body>
<div class="container">
<h2>Cadastro</h2>
<form method="post">
<input name="nome" placeholder="Nome" required><br>
<input name="email" type="email" placeholder="Email" required><br>
<input name="senha" type="password" placeholder="Senha" required><br>
<button>Registrar</button>
</form>
<a href="login.php">Já tem conta? Entrar</a>
</div>
</body>
</html>