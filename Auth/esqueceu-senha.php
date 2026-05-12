<!-- KAUÃ -->
<?php
require_once "backend/includes/funcoes.php";

$mensagem = '';

if (isset($_POST['recuperar'])) {
    // captura o e-mail preenchido pelo usuario
    $email = $_POST['email'];

    $mensagem = recuperarSenha($email);
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Matchwork</title>
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
</head>

<body id="login">
    <div id="ImgLogon">
        <a href="index.php"><img src="assets/img/Logomaior.png" alt="Logo"></a>
    </div>
    <main id="Logon">
        <form action="" method="post">
            <h2 class="text-center mb-4">Redefinir senha</h2>
            <!--  Email -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-envelope fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                    <label for="email">E-mail cadastrado</label>
                </div>
            </div>
            <!-- Mensagem -->
            <?php if (!empty($mensagem)): ?>
                <div class="text-sm text-indigo-300 bg-indigo-900/20 border border-indigo-800 p-2 rounded">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <button type="submit" name="recuperar" class="btn btn-success mt-3">Enviar código</button>

            <!-- Voltar -->
            <div class="text-center">
                <a href="login.php"
                    class="text-sm text-gray-400 hover:text-gray-200 transition">
                    ← Voltar para login
                </a>
            </div>
        </form>
    </main>


   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
</body>

</html>