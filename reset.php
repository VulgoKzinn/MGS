<!-- KAUÃ -->
<?php
require_once "../backend/includes/funcoes.php";
session_start();

$mensagem = '';

if ($_SESSION['sistema'] != 'sis_login') {
    header('Location: ../');
}

if (isset($_POST['nova'])) {
    // captura a senha preenchido pelo usuario
    $senha =  filter_input(INPUT_POST, 'newsenha');
    $confirma =  filter_input(INPUT_POST, 'confirsenha');

    if ($senha == '' && $confirma == '') {
        $mensagem = 'Preencha a senha!';
    } elseif ($senha !== $confirma) {
        $mensagem = 'Senhas não conferem!';
    } else {
        // Atualiza senha
        $mensagem = novaSenha($senha);
    }
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
            <h2 class="text-center mb-4">Nova senha</h2>
            <!--  Senha -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-lock fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating">
                    <input type="password" class="form-control" id="newsenha" placeholder="••••••••" required>
                    <label for="newsenha">Senha</label>
                </div>
            </div>

            <!--  Senha -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-lock fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating">
                    <input type="password" class="form-control" id="confirsenha" placeholder="••••••••" required>
                    <label for="confirsenha">Confirmar senha</label>
                </div>
            </div>

            <!-- Mensagem -->
            <?php if (!empty($mensagem)): ?>
                <div class="text-sm text-indigo-300 bg-indigo-900/20 border border-indigo-800 p-2 rounded">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-success mt-3" name="nova">Redefinir</button>

            <!-- Voltar -->
            <div class="text-center">
                <a href="../index.php"
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