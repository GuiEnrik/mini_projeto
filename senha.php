<?php
include 'conecta.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $nome_usuario = $_SESSION['nome_usuario'];

    // Query para alteração da senha do usuário
    $sql = "";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam();
    $stmt->bindParam(':nome_usuario', $nome_usuario);

    try {
        $stmt->execute();
        header('Location: inicio.php'); // Redireciona para a página inicial após alterar a senha
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <form method="POST" action="" class="w-100" style="max-width: 400px;">
            <div class="d-flex justify-content-center mb-4">
                <img src="https://placehold.co/150x70?text=Meu%20App" alt="Logo" class="img-fluid">
            </div>
            <h1 class="h3 mb-3 fw-normal text-center">Alterar Senha</h1>
            <div class="form-floating mb-3">
                <input type="password" name="nova_senha" class="form-control" placeholder="Nova senha" required>
                <label>Nova senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Alterar senha</button>
            <a class="w-100 btn btn-lg btn-secondary mt-3" href="/inicio.php">Cancelar</a>
        </form>
    </div>
</body>

</html>