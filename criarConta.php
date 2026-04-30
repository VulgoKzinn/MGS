<!-- KAUÃ -->
<?php
session_start(); // inicia a sessão
require_once "backend/includes/funcoes.php";

$mensagem = '';
if (isset($_POST['cadastrar'])) {
    $email =        filter_input(INPUT_POST, 'email');
    // captura a senha preenchido pelo usuario
    $senha =  filter_input(INPUT_POST, 'senha');
    $confirma =  filter_input(INPUT_POST, 'confirma');
    $empresa = isset($_POST['empresa']) ? 1 : 0;

    if ($senha == '' || $confirma == ''){
        $mensagem = 'Preencha a senha!';
    } elseif ($senha !== $confirma) {
        $mensagem = 'Senhas não conferem!';
    } else {
        $retorno = validaEmail($email, $senha, $empresa);

if (is_numeric($retorno)) {

    $id_login = $retorno;

    if ($empresa == 1) {

        $_SESSION['id_login'] = $id_login;
        header("Location: cadastro-empresa.php");
        exit;

    } else {

        header("Location: login.php?cadastro=sucesso");
        exit;
    }

} else {
    $mensagem = $retorno;
}
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Matchwork</title>
    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="index.php"><img src="assets/img/Logomaior.png" alt="Logo"></a>
    </div>
    <!-- Formulário -->
    <main id="CadCand">
        <form action="" method="post" class="p-4 col-md-6 mx-auto">
            <h2 class="text-center mb-4">Crie sua Conta</h2>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="email@exemplo.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>

            <!-- Confirmar senha -->
            <div class="mb-3">
                <label class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" name="confirma" placeholder="Confirme sua senha" required>
            </div>

            <!-- Confir Empresa -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="empresa" id="empresa">
                <label class="form-check-label">
                    Perfil Empresarial
                </label>
            </div>

            <!-- Mensagem -->
            <?php if (!empty($mensagem)): ?>
                <div class="text-sm text-indigo-300 bg-indigo-900/20 border border-indigo-800 p-2 rounded">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <div class="text-end">
                <button type="submit" class="btn btn-success w-100" name="cadastrar" abs>
                    Criar Conta
                </button>
            </div>
        </form>
    </main>


    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
                
</html>