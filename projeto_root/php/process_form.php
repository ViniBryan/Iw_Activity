<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formsdb";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Coletar dados do formulário e sanitizar entradas
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nascimento = $_POST['nascimento']; // Certifique-se de validar e formatar essa data
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$senha = $_POST['senha'];
$confirmaSenha = $_POST['confirma_senha'];
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

// Validações adicionais
if (empty($nome) || empty($nascimento) || empty($email) || empty($telefone)) {
    echo "<script>alert('Erro: Campos obrigatórios não podem estar vazios.'); window.location.href = '../index.php';</script>";
    exit;
}

// Verificar se o e-mail já existe
$stmt = $conn->prepare("SELECT id FROM usuario WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Erro: Este e-mail já está cadastrado.'); window.location.href = '../index.php';</script>";
} elseif ($senha !== $confirmaSenha) {
    echo "<script>alert('Erro: As senhas não coincidem.'); window.location.href = '../index.php';</script>";
} else {
    // Hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir dados na tabela
    $stmt = $conn->prepare("INSERT INTO usuario (nome, nascimento, email, telefone, cep, endereco, bairro, cidade, estado, cpf, rg, senha, assunto, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssss", $nome, $nascimento, $email, $telefone, $cep, $endereco, $bairro, $cidade, $estado, $cpf, $rg, $senhaHash, $assunto, $mensagem);

    if ($stmt->execute()) {
        echo "<script>
                alert('Cadastro realizado com sucesso! Você será redirecionado para a visualização.');
                window.location.href = '../view_user.php';
              </script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.location.href = '../index.php';</script>";
    }
}

// Fechar conexão
$stmt->close();
$conn->close();
