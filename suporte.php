<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $email = $_POST['email'];
$mensagem=suporte($nome, $email, $descricao);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS | Suporte</title>

    <?php require_once 'assets/templates/head.php'; ?>
</head>

<body id="cadastroCand">

    <!-- LOGO -->
    <div id="ImgLogon" class="text-center my-4">
        <a href="index.php">
            <img src="assets/img/Logomaior.png" alt="Logo">
        </a>
    </div>

    <!-- CONTEÚDO -->
    <main id="CadCand" class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 col-lg-6">

                <!-- FAQ -->
                <!-- <div class="card card-faq p-4 shadow-sm text-center mb-4 perguntas">
                    <i class="fa-solid fa-circle-question icon mb-3"></i>
                    <h5>Perguntas Frequentes</h5>
                    <p>Encontre respostas rápidas para dúvidas comuns.</p>
                    <a href="#" class="btn btn-outline-primary">Ver mais</a>
                </div> -->


                <!-- FORMULÁRIO -->
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Envie uma mensagem</h4>

                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="Seu nome" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Seu email" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" id="descricao" name="descricao" rows="4" placeholder="Descreva seu problema..." required></textarea>
                        </div>

                        <button type="submit" id="enviar" name="enviar" class="btn btn-primary w-100">
                            Enviar
                        </button>
                        <?php if(!empty($mensagem)): ?>
                <div class="text-sm text-indigo-300 bg-indigo-900/20 border border-indigo-800 p-2 rounded">
                    <?= $mensagem;?>
                     <?php if (str_contains($mensagem, 'sucesso')): ?>
        <a href="pag_inicial.php" class="btn btn-success w-100">Voltar</a>
                    <?php endif; ?>
                </div>
                  <?php endif; ?>
                    </form>
                </div>

            </div>

        </div>
    </main>

    <!-- JS -->
    <?php require_once 'assets/templates/js.php'; ?>

</body>

</html>