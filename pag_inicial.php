<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pagina-inicial.css">
<<<<<<< HEAD
    <link rel="shortcut icon" href="assets/img/logo.svg">
    <link rel="stylesheet" href="assets/css/perfil-empresa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
=======
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
>>>>>>> 1284daa1b9bb73440539801ea34245ad04fa2bf0
</head>

<body>

<?php require_once "assets/templates/header_GUI.php" ?>

<div class="container mt-4">

    <div class="card-vaga">

        <div class="header">
            <img src="img/sabesp.png" class="logo">
            <h5 class="m-0">SABESP - SP</h5>
        </div>

        <div class="conteudo">
            <h5>Vaga: Leiturista – SABESP</h5>
            <p>
                A SABESP está em busca de um profissional responsável e comprometido para atuar como Leiturista.
                A função consiste na leitura e registro do consumo de água nos hidrômetros, conferência de dados,
                identificação de irregularidades e orientação básica aos clientes quando necessário.
            </p>

            <h5>Requisitos:</h5>
            <p>
                Ensino médio completo<br>
                CNH categoria A ou B<br>
                Noções básicas de leitura e escrita<br>
                Conhecimento básico de celular ou coletor de dados
            </p>

            <h5>Área de Atuação:</h5>
            <p>Leiturista</p>

            <h5>Modalidade:</h5>
            <p>Presencial</p>

            <h5>Localização:</h5>
            <p>São João da Boa Vista</p>

            <h5>Benefícios:</h5>
            <p>Não tem que pagar água</p>

            <h5>Carga Horária:</h5>
            <p>12 por 36</p>

            <img src="https://via.placeholder.com/600x350" class="imagem">
        </div>

        <form class="acoes">
            <button type="submit" class="btn-circle like">❤</button>
            <button type="submit" class="btn-circle dislike">✖</button>
        </form>

    </div>

</div>

<footer></footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>

</body>
</html>