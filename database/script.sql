CREATE DATABASE loja;
USE loja;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT ,
    nome VARCHAR(100) ,
    email VARCHAR(150) ,
    senha VARCHAR(255) ,
    data_cadastro DATETIME
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT ,
    nome VARCHAR(100) ,
    descricao TEXT ,
    preco DECIMAL(10, 2) ,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    
);