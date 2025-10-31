<?php
session_start();

$banco = "meu_banco.sqlite";

try {
    $pdo = new PDO('sqlite:' . $banco);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
