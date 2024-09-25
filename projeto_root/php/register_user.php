<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário e sanitizar
    $nome = trim($_POST['nome']);
    $nascimento = trim($_POST['nascimento']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefone = trim($_POST['telefone']);
    $cep = trim($_POST['cep']);
    $endereco = trim($_POST['endereco']);
    $cpf = trim($_POST['cpf']);
    $rg = trim($_POST['rg']);
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);
    $assunto = trim($_POST['assunto']);
    $mensagem = trim($_POST['mensagem']);

    // Verificar se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($nascimento) || empty($email) || empty($telefone)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
        exit();
    }

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

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO usuario (nome, nascimento, email, telefone, cep, endereco, cpf, rg, senha, assunto, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $nome, $nascimento, $email, $telefone, $cep, $endereco, $cpf, $rg, $senha, $assunto, $mensagem);

    // Executar
    if ($stmt->execute()) {
        // Mensagem de sucesso
        echo "<script>
                var myModal = new bootstrap.Modal(document.getElementById('successModal'), {});
                myModal.show();
              </script>";
    } else {
        // Mensagem de erro
        echo "<script>alert('Erro ao registrar: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8') . "');</script>";
    }

    // Fechar conexão
    $stmt->close();
    $conn->close();
}
?>

<!-- Modal de Sucesso -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sucesso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Cadastro realizado com sucesso!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>