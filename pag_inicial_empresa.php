<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];
validaUsuario($id_nivel);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/pagina-inicial.css">
    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>
</head>

<body id="bodypgs">

    <?php require_once "assets/templates/headerMGS.php" ?>

    <div class="container mt-4">

        <div class="card-vaga">

            <div class="headerVaga">
                <img src="./assets/img/sabesp-companhia-de-saneamento-basico-do-estado-de-sao-paulo 1.png" class="logo">
                <h5 class="m-0">SABESP - SP</h5>
            </div>

            <div class="conteudo">
                <h5>TESTE</h5>

            </div>




            <form class="acoes">
                <button type="submit" class="btn-circle like">❤</button>
                <button type="submit" class="btn-circle dislike">✖</button>
            </form>

        </div>

    </div>

    <footer></footer>

    <script>
        function toggleTexto() {
            let conteudo = document.getElementById("conteudoExtra");
            let botao = document.getElementById("btnLerMais");
            if (conteudo.style.display === "none" || conteudo.style.display === "") {
                conteudo.style.display = "block";
                botao.innerText = "Ler menos";
            } else {
                conteudo.style.display = "none";
                botao.innerText = "Ler mais";
            }
        }
    </script>
    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>




</body>

</html>