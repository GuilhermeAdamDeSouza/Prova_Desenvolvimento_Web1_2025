<?php
require 'auth.php';
require 'config.php';
$result = $mysqli->query('SELECT id,nome,descricao,preco FROM produtos');
?>
<!doctype html>
<html lang="pt-br"></html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Produtos</title>
</head>
<body>
<div class="container">
<h2>Produtos</h2>
<p class="info">Olá <?php echo htmlspecialchars($_SESSION['user_name']); ?> | <a href="logout.php">Sair</a></p>
<a href="produto_add.php">Adicionar produto</a>
<table>
<tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo htmlspecialchars($row['nome']); ?></td>
<td><?php echo htmlspecialchars($row['descricao']); ?></td>
<td><?php echo number_format($row['preco'],2,',','.'); ?></td>
<td class="actions">
<a href="produto_edit.php?id=<?php echo $row['id']; ?>">Editar</a>
<a href="produto_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Excluir?')">Excluir</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>