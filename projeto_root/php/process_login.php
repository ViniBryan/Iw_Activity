<?php
// process_login.php

session_start();
require_once 'db_connection.php'; // Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário e sanitiza
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);

    // Inicializa a variável de mensagem de erro
    $error_message = '';

    // Verifica se o e-mail e a senha foram fornecidos
    if (empty($email) || empty($senha)) {
        $error_message = 'Por favor, preencha todos os campos.';
    } else {
        // Prepara a consulta SQL para buscar o usuário pelo e-mail
        $sql = "SELECT id, nome, senha FROM usuario WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Erro na preparação da consulta: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $nome, $hashed_password);

        if ($stmt->num_rows > 0) {
            // Recupera os dados do usuário
            $stmt->fetch();

            // Verifica se a senha fornecida corresponde à senha armazenada
            if (password_verify($senha, $hashed_password)) {
                // Senha correta, inicia a sessão e redireciona para consultar.php
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $nome;
                header('Location: consultar.php');
                exit();
            } else {
                // Senha incorreta
                $error_message = 'Senha incorreta.';
            }
        } else {
            // E-mail não encontrado
            $error_message = 'E-mail não encontrado.';
        }

        $stmt->close();
    }

    // Armazena a mensagem de erro na sessão
    $_SESSION['error_message'] = $error_message;

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Redireciona de volta para a página de login com mensagem de erro
    header('Location: ../login.php'); // Altere para a sua página de login
    exit();
}
