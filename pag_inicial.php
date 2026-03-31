<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pagina-inicial.css">
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
</head>

<?php require_once "assets/templates/header_GUI.php" ?>

<div class="card-vaga">

    <!-- Empresa -->
    <div class="header">
        <img src="img/sabesp.png" class="logo">
        <h5 class="m-0">SABESP - SP</h5>
    </div>

    <!-- Conteúdo -->
    <div class="conteudo">
        <h5>Vaga: Leiturista – SABESP</h5>
        <p>
            A SABESP está em busca de um profissional responsável e comprometido para atuar como Leiturista.
            A função consiste na leitura e registro do consumo de água nos hidrômetros, conferência de dados,
            identificação de irregularidades e orientação básica aos clientes quando necessário.
        </p>

        <img src="https://via.placeholder.com/600x350" class="imagem">
    </div>

    <!-- Ações (Formulário HTML) -->
    <form class="acoes">
        <button type="submit" class="btn-circle like">❤</button>
        <button type="submit" class="btn-circle dislike">✖</button>
    </form>

</div>
<footer>

</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>


</body>

</html>