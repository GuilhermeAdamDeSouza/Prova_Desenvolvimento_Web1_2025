<?php
require 'auth.php';
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$stmt = $mysqli->prepare('INSERT INTO produtos (nome,descricao,preco) VALUES (?,?,?)');
$stmt->bind_param('ssd',$nome,$descricao,$preco);
$stmt->execute();
$stmt->close();
header('Location: produtos.php');
}
?>
<!doctype html>
<html lang="pt-br"></html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Adicionar Produto</title>
</head>
<body>
<div class="container">
<h2>Adicionar Produto</h2>
<form method="post">
<input name="nome" placeholder="Nome" required><br>
<textarea name="descricao" placeholder="Descrição"></textarea><br>
<input name="preco" placeholder="R$0.00" required><br>
<button>Salvar</button>
</form>
<a href="produtos.php">Voltar</a>
</div>
</body>
</html>