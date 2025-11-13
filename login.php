<?php
session_start();
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$senha = $_POST['senha'];
$stmt = $mysqli->prepare('SELECT id,nome,senha FROM users WHERE email=?');
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($id,$nome,$hash);
if ($stmt->fetch() && password_verify($senha,$hash)) {
$_SESSION['user_id'] = $id;
$_SESSION['user_name'] = $nome;
header('Location: produtos.php');
exit;
}
$stmt->close();
$error = 'E-mail ou senha invalido';
}
?>
<!doctype html>
<html lang="pt-br"></html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>
<body>
<div class="container">
<h2>Login</h2>
<?php if (!empty($error)) echo '<p class="muted">'.$error.'</p>'; ?>
<form method="post">
<input name="email" type="email" placeholder="Email" required><br>
<input name="senha" type="password" placeholder="Senha" required><br>
<button>Entrar</button>
</form>
<a href="register.php">Registrar</a>
</div>
</body>
</html>