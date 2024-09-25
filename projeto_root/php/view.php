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
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result->num_rows == 0) {
    die("Registro não encontrado.");
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png" type="image/png">
    <style>

    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center header-title mb-4">Detalhes do Registro</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Informações do Usuário</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                        </tr>
                        <tr>
                            <th>Telefone</th>
                            <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                        </tr>
                        <tr>
                            <th>CEP</th>
                            <td><?php echo htmlspecialchars($row['cep']); ?></td>
                        </tr>
                        <tr>
                            <th>Endereço</th>
                            <td><?php echo htmlspecialchars($row['endereco']); ?></td>
                        </tr>
                        <tr>
                            <th>CPF</th>
                            <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                        </tr>
                        <tr>
                            <th>RG</th>
                            <td><?php echo htmlspecialchars($row['rg']); ?></td>
                        </tr>
                        <tr>
                            <th>Data de Nascimento</th>
                            <td><?php echo htmlspecialchars($row['nascimento']); ?></td>
                        </tr>
                        <tr>
                            <th>Assunto</th>
                            <td><?php echo htmlspecialchars($row['assunto']); ?></td>
                        </tr>
                        <tr>
                            <th>Mensagem</th>
                            <td><?php echo htmlspecialchars($row['mensagem']); ?></td>
                        </tr>
                        <tr>
                            <th>Criado em</th>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="consultar.php" class="btn btn-secondary">Voltar</a>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn); // Fecha a conexão com o banco de dados
?>