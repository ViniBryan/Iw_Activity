<?php
require 'db_connection.php';

// Obtém os dados do formulário, utilizando o operador null coalescing para valores padrão
$id = $_POST['id'] ?? '';
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');

// Validação dos dados
if (!$id || !$nome || !$email || !$telefone) {
    die("Por favor, preencha todos os campos obrigatórios.");
}

// Validação de e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Endereço de e-mail inválido.");
}

// Prepara a consulta SQL para atualização
$query = "UPDATE usuario SET nome = ?, email = ?, telefone = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8'));
}

// Vincula os parâmetros
mysqli_stmt_bind_param($stmt, 'sssi', $nome, $email, $telefone, $id);

// Executa a consulta
if (mysqli_stmt_execute($stmt)) {
    // Redireciona após a atualização
    header('Location: consultar.php');
    exit;
} else {
    die("Erro ao atualizar o registro: " . htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8'));
}

// Fecha a conexão
mysqli_stmt_close($stmt);
mysqli_close($conn);
