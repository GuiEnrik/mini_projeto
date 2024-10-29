<?php
session_start(); // Inicia a sessão em todas as páginas que incluírem este arquivo

//Nome do arquivo de banco de dados
$banco = " ";

// Conexão com o banco de dados usando PDO
try {
    $pdo = new PDO('sqlite:' . $banco);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
