<?php
include 'conecta.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php'); // Redireciona para o login se não estiver logado
}

$nome_usuario = $_SESSION['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <img class="navbar-brand" src="https://placehold.co/150x70?text=Meu%20App" alt="Logo" height="50">
        
        <!-- Botão do menu colapsável para telas menores -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Conteúdo do menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav">
                <!-- Dropdown "Minha Conta" -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Minha Conta
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="contaDropdown">
                        <li><a class="dropdown-item" href="senha.php"><i class="bi bi-key"></i> Alterar Senha</a></li>
                        <li><a class="dropdown-item text-danger" href="excluir_conta.php"><i class="bi bi-trash"></i> Excluir Conta</a></li>
                    </ul>
                </li>
                <!-- Opção para Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container mt-5 text-center">
    <h1>Bem-vindo, <?php echo $nome_usuario; ?>!</h1>
    <p class="lead">Esta é sua página inicial.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
