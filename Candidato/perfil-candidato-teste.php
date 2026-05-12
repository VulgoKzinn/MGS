<?php
require_once "backend/includes/funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>

    <!-- Para garantir responsividade em mobile bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css da pagina -->
    <link rel="stylesheet" href="assets/css/perfil-empresa.css">
    <!--OBS talvez tirar depois de padronizar a fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
</head>

<body id="bodypgs">

    <?php include "assets/templates/headerMGS.php"; ?>

    <main class="container mt-4">
        <!-- PERFIL -->
        <div class="position-relative" style="margin-bottom: 140px;">

            <!-- CAPA -->
            <img src="assets/img/empresa/perfil-empresa/amazon-capa.jpg"
                class="img-fluid w-100 capa rounded">

            <!-- CONFIGURAÇÕES -->
            <div class="config-btn">
                <?php include "assets/templates/subedit.php"; ?>
            </div>

            <!-- FOTO + TEXTO -->
            <div class="position-absolute start-0 bottom-0 ms-5 d-flex align-items-end"
                style="transform: translateY(35%);">

                <!-- FOTO PERFIL -->
                <img src="assets/img/empresa/perfil-empresa/amazon-perfil.jpeg"
                    class="rounded-circle shadow border border-4 border-white object-fit-cover bg-white"
                    width="170"
                    height="170">

                <!-- INFORMAÇÕES -->
                <div class="ms-4" style="margin-bottom: -25px;">

                    <h1 class="fw-bold text-black mb-1">
                        Pedro Azevedo
                    </h1>

                    <p class="fs-5 text-muted mb-0">
                        Desenvolvedor Full Stack
                    </p>

                </div>

            </div>

        </div>

        <!-- CONTEÚDO -->
        <div class="row mt-4 g-4">

            <!-- LADO ESQUERDO -->
            <div class="col-lg-4">

                <!-- CONTATO -->
                <div class="card border-0 shadow-sm p-4 mb-4">

                    <h4 class="fw-bold mb-4 titulo-roxo-curto">
                        Contato
                    </h4>

                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope-fill fs-4 me-3"></i>
                        <span>pedro@email.com</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-whatsapp fs-4 me-3"></i>
                        <span>(19) 99999-9999</span>
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                        <span>São João da Boa Vista - SP</span>
                    </div>

                </div>

                <!-- BIO -->
                <div class="card border-0 shadow-sm p-4 mb-4">

                    <h4 class="fw-bold mb-3 titulo-roxo-curto">
                        Biografia
                    </h4>

                    <p class="text-secondary">
                        Desenvolvedor apaixonado por tecnologia,
                        interfaces modernas e sistemas web.
                        Possuo experiência em PHP, Bootstrap,
                        MySQL e desenvolvimento responsivo.
                    </p>

                </div>

                <!-- FORMAÇÃO ACADÊMICA -->
                <div class="card border-0 shadow-sm p-4">

                    <h4 class="fw-bold mb-4 titulo-roxo-curto">
                        Formação Acadêmica
                    </h4>

                    <!-- FORMAÇÃO -->
                    <div class="mb-4">

                        <div class="d-flex align-items-center mb-2">

                            <i class="bi bi-mortarboard-fill fs-3 me-3 text-primary"></i>

                            <div>

                                <h5 class="fw-bold mb-0">
                                    Técnico em Informática
                                </h5>

                                <small class="text-muted">
                                    SENAC • 2022 - 2024
                                </small>

                            </div>

                        </div>

                        <p class="text-secondary mb-0">
                            Formação voltada para desenvolvimento de sistemas,
                            manutenção de computadores, redes e banco de dados.
                        </p>

                    </div>

                </div>


            </div>

            <!-- LADO DIREITO -->
            <section class="col-lg-8">

                <!-- EXPERIÊNCIA -->
                <div class="card border-0 shadow-sm p-4 mb-4">

                    <h4 class="fw-bold mb-4 titulo-roxo-curto">
                        Experiência
                    </h4>

                    <div class="mb-4">

                        <div class="d-flex align-items-center mb-2">

                            <div>
                                <h5 class="fw-bold mb-0">
                                    Desenvolvimento Web
                                </h5>

                                <small class="text-muted">
                                    2022 - Atualmente
                                </small>
                            </div>

                        </div>

                        <p class="text-secondary">
                            Criação de sistemas web responsivos,
                            aplicações CRUD e integração com banco
                            de dados MySQL.
                        </p>

                    </div>

                </div>

                <!-- PROJETOS -->
                <div class="card border-0 shadow-sm p-4">

                    <h4 class="fw-bold mb-4 titulo-roxo-curto">
                        Projetos
                    </h4>

                    <!-- PROJETO -->
                    <div class="projeto-card p-3 shadow-sm mb-4">

                        <div class="d-flex align-items-center mb-2">

                            <span class="fs-2 me-2">🍔</span>

                            <h5 class="fw-bold mb-0">
                                Sistema Hamburgueria
                            </h5>

                        </div>

                        <p class="text-secondary">
                            Plataforma completa de pedidos online
                            com gerenciamento de produtos e painel
                            administrativo.
                        </p>

                        <div class="d-flex flex-wrap gap-2">

                            <span class="badge bg-light text-primary border">
                                PHP
                            </span>

                            <span class="badge bg-light text-primary border">
                                MySQL
                            </span>

                            <span class="badge bg-light text-primary border">
                                Bootstrap
                            </span>

                        </div>

                    </div>

                </div>

            </section>

        </div>

        <!-- CERTIFICADOS -->
        <div class="certificados text-center mt-5 pt-5 mb-5">

           <h1 class="text-center mt-5 certificados">
                CERTIFICADOS
            </h1>

        </div>

        <div class="container mt-5">

            <!-- GRID -->
            <div class="row g-4 justify-content-center">

                <!-- CARD -->
                <div class="col-12 col-md-6 col-lg-5">

                    <div class="info-vaga p-4 h-100 shadow-sm">

                        <!-- NOME -->
                        <div class="text-center mb-4">

                            <h2 class="fw-bold text-white">
                                Desenvolvimento Web Full Stack
                            </h2>

                        </div>

                        <!-- FOTO -->
                        <div class="text-center mb-4">

                            <img src="assets/img/certificados/certificado01.jpg"
                                class="img-fluid rounded shadow">

                        </div>

                        <!-- DATA -->
                        <div class="mb-3">

                            <label class="form-label text-light fw-semibold">
                                Data de Conclusão
                            </label>

                            <div class="form-control custom-box">
                                Março • 2024
                            </div>

                        </div>

                        <!-- DESCRIÇÃO -->
                        <div>

                            <label class="form-label text-light fw-semibold">
                                Descrição
                            </label>

                            <div class="form-control custom-box area-grande">

                                Certificação focada em desenvolvimento
                                de aplicações web modernas utilizando
                                PHP, MySQL, Bootstrap e JavaScript.

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </main>

    <?php require_once 'assets/templates/js.php'; ?>

</body>

</html>