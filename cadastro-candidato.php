<!-- KAUÃ -->
<?php
require_once "backend/includes/funcoes.php";

$mensagem = '';
if (isset($_POST['cadastrar'])) {
    $email =        filter_input(INPUT_POST, 'email');
    // captura a senha preenchido pelo usuario
    $senha =  filter_input(INPUT_POST, 'senha');
    $confirma =  filter_input(INPUT_POST, 'confirma');

    if ($senha == '' && $confirma == '') {
        $mensagem = 'Preencha a senha!';
    } elseif ($senha !== $confirma) {
        $mensagem = 'Senhas não conferem!';
    } else {
        $mensagem = validaEmail($email, $senha);
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Matchwork</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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

            <!-- Senha -->
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="••••••••" required>
            </div>

            <!-- Confirmar senha -->
            <div class="mb-3">
                <label class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" name="confirma" placeholder="••••••••" required>
            </div>

            <!-- Termos -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" required>
                <label class="form-check-label">
                    Concordo com os termos de uso
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success w-100" name="cadastrar">
                    Criar Conta
                </button>
            </div>
        </form>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

</body>

</html>