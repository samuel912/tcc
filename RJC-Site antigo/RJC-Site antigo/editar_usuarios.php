<?php
session_start();
require 'banco.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  header("Location: login.html");
  exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  die('ID inválido.');
}
$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
  $stmt = $pdo->prepare($sql); // <-- usando $pdo
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  header("Location: admin.php");
  exit;
} else {
  $sql = "SELECT nome, email FROM usuarios WHERE id = :id";
  $stmt = $pdo->prepare($sql); // <-- usando $pdo
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$result) {
    die('Usuário não encontrado.');
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
</head>
<body>
  <h1>Editar Usuário</h1>
  <form method="post">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($result['nome']) ?>"><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($result['email']) ?>"><br><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>

