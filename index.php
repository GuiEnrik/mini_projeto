<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    $sql = "SELECT * FROM usuarios WHERE email = :email_usuario AND senha = :senha_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':senha_usuario', $senha_usuario);

    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario) {
        $_SESSION['email_usuario'] = $usuario['email'];
        header('Location: inicio.php');
        exit();
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <form method="POST" action="" class="w-100" style="max-width: 400px;">
            <div class="d-flex justify-content-center mb-4">
                <img src="https://placehold.co/150x70?text=Meu%20App" alt="Logo" class="img-fluid mb-4">
            </div>
            <h1 class="h3 mb-3 fw-normal text-center">Faça login</h1>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" name="email_usuario" class="form-control" placeholder="E-mail de usuário" required>
                <label>E-mail de usuário</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="senha_usuario" class="form-control" placeholder="Senha" required>
                <label>Senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            <p class="mt-3 text-center"><a href="cadastro.php">Cadastrar-se</a></p>
        </form>
    </div>
</body>

</html>
