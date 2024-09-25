<?php
require_once 'db_connection.php';
require_once 'header.php';

// Verifica se o ID foi fornecido via GET
$id = $_GET['id'] ?? '';
if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
    die("ID inválido ou não fornecido.");
}

// Consulta para selecionar o registro com base no ID
$query = "SELECT * FROM usuario WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

// Evita SQL Injection, vinculando o ID como um número inteiro
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

// Obtém o resultado da consulta
$result = mysqli_stmt_get_result($stmt);
if ($result->num_rows == 0) {
    die("Registro não encontrado.");
}

// Recupera os dados do registro
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <style>

    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center header-title mb-4">Editar Registro</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Informações do Usuário</h5>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($row['telefone'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="<?php echo htmlspecialchars($row['cep'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($row['endereco'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($row['cpf'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($row['rg'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($row['nascimento'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto</label>
                        <input type="text" class="form-control" id="assunto" name="assunto" value="<?php echo htmlspecialchars($row['assunto'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required><?php echo htmlspecialchars($row['mensagem'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary btn-lg">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Botão para voltar à página principal
        <div class="text-center">
            <a href="../index.php" class="btn btn-secondary btn-lg">Voltar para a Página Principal</a>
        </div>
    </div> -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn); // Fecha a conexão com o banco de dados
?>