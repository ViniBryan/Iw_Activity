-- Criação do banco de dados

CREATE DATABASE IF NOT EXISTS formsdb;
USE formsdb;

-- Tabela usuario
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    nascimento DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(20) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    rg VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    mensagem TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Índices para otimizar buscas
CREATE INDEX idx_email ON usuario(email);
CREATE INDEX idx_cpf ON usuario(cpf);
CREATE INDEX idx_rg ON usuario(rg);