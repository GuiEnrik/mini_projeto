<?php
include 'conecta.php';

if (!isset($_SESSION['email_usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_usuario = $_SESSION['email_usuario'];

    $sql = "DELETE FROM usuarios WHERE email = :email_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email_usuario', $email_usuario);

    try {
        $stmt->execute();
        session_destroy();
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erro ao excluir conta: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <form method="POST" action="" class="w-100" style="max-width: 400px;">
        <h1 class="h3 mb-3 fw-normal text-center">Excluir Conta</h1>
        <p class="text-center text-danger">Tem certeza de que deseja excluir sua conta? Esta ação é irreversível.</p>
        <button class="w-100 btn btn-lg btn-danger" type="submit">Sim, excluir minha conta</button>
        <a class="w-100 btn btn-lg btn-secondary mt-3" href="inicio.php">Cancelar</a>
    </form>
</div>
</body>
</html>
