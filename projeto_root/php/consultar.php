<?php
session_start(); // Certifique-se de iniciar a sessão
require_once 'db_connection.php';
require_once 'header.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php'); // Redireciona para a página de login se não estiver logado
    exit();
}

// Obtém o ID do usuário logado
$user_id = $_SESSION['user_id'];

// Consulta para obter apenas os registros do usuário logado
$query = "SELECT * FROM usuario WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Consulta falhou: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png" type="image/png">
</head>

<body>
    <div class="container">
        <h1 class="text-center header-title mb-4">Consultar Registros</h1>
        <div class="text-center mb-4">
            <a href="../index.php" class="btn btn-secondary btn-lg">Voltar para a Página Principal</a>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['telefone'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Mensagem caso não haja registros -->
            <div class="alert alert-warning text-center" role="alert">
                Nenhum registro encontrado.
            </div>
        <?php endif; ?>

        <?php
        // Fecha a conexão após o uso
        $stmt->close();
        mysqli_close($conn);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>