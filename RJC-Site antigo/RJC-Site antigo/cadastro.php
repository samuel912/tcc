<?php
require 'banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email já cadastrado.";
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $is_admin = 0; // Aqui define como administrador

    $sql = "INSERT INTO usuarios (nome, email, senha, is_admin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $nome, $email, $senhaHash, $is_admin);

    if ($stmt->execute()) {
        echo "Administrador cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}
?>
