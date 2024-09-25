<?php
require 'db_connection.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    die("ID não fornecido.");
}

$query = "DELETE FROM usuario WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: consultar.php');
    exit;
} else {
    die("Erro ao excluir o registro: " . mysqli_error($conn));
}

mysqli_close($conn);
?>
