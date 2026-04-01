<!-- KAUÃ -->
<?php
require_once "backend/includes/funcoes.php";

$mensagem = '';
$email = '';

if (isset($_POST['login'])) {
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');

    $mensagem = login($email, $senha);
    $email = $email;
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Matchwork</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
            <h2 class="text-center mb-4">Login</h2>
            <!--  Email -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-envelope fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating">
                    <input type="email" value="<?= $email; ?>" class="form-control" id="email" placeholder="email@exemplo.com">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <!--  Senha -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-lock fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating"> <input type="password" class="form-control" id="senha" placeholder="Senha" required>
                    <label for="senha">Senha</label>
                </div>
            </div>
            <a href="esqueceu-senha.php">Esqueceu a senha?</a>

            <!-- Mensagem -->
            <?php if(!empty($mensagem)): ?>
                <div class="text-sm text-red-400 bg-red-900/20 border border-red-800 p-2 rounded">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-success mt-3">Logar</button>
            <!-- Links extras -->
            <div class="extra-links"> <a href="cadastro-candidato.php">Cadastrar Conta</a> <a href="cadastro-empresa.php">Cadastrar Empresa</a> </div>
        </form>
    </main>


   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
</body>

</html>