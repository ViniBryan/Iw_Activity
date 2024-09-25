<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'formsdb';

// Criando a conexão
$conn = mysqli_connect($host, $user, $password, $database);

// Verificando a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
