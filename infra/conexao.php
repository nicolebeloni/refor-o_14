<?php
$host = 'localhost';
$dbname = 'loja';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Erro na conexão: ' . $conn->connect_error);
}
?>