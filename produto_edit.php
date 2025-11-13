<?php
require 'auth.php';
require 'config.php';
$id = $_GET['id'] ?? null;
if (!$id) header('Location: produtos.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$stmt = $mysqli->prepare('UPDATE produtos SET nome=?,descricao=?,preco=? WHERE id=?');
$stmt->bind_param('ssdi',$nome,$descricao,$preco,$id);
$stmt->execute();
$stmt->close();
header('Location: produtos.php');
}
$stmt = $mysqli->prepare('SELECT nome,descricao,preco FROM produtos WHERE id=?');
$stmt->bind_param('i',$id);
$stmt->execute();
$stmt->bind_result($nome,$descricao,$preco);
$stmt->fetch();
$stmt->close();
?>
<!doctype html>
<html lang="pt-br"></html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Editar Produto</title>
</head>
<body>
<div class="container">
<h2>Editar Produto</h2>
<form method="post">
<input name="nome" value="<?php echo htmlspecialchars($nome); ?>" required><br>
<textarea name="descricao"><?php echo htmlspecialchars($descricao); ?></textarea><br>
<input name="preco" value="<?php echo htmlspecialchars($preco); ?>" required><br>
<button>Atualizar</button>
</form>
<a href="produtos.php">Voltar</a>
</div>
</body>
</html>