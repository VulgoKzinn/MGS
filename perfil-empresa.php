<?php
require_once "backend/includes/funcoes.php";
session_start();
// validaAcesso();
// validaEmpresa();
$idEmpresa = $_SESSION['id_login'];
$id_empresa = $_SESSION['id_empresa'];
$vagas = listaVaga($id_empresa);
$dadosPerfil = listaDadosPerfil($id_empresa);

?>
<!-- SABRINA -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Perfil Empresarial</title>

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




<?php include "assets/templates/headerMGS.php"; ?>

<body id="bodypgs">
    <?php require_once "assets/templates/headerMGS.php" ?>

    <main class="container mt-4">
        <!-- PERFIL -->
        <div class="position-relative" style="margin-bottom: 140px;">

            <!-- CAPA -->
            <img src="assets/img/empresa/capa_empresa/uploads/<?php echo $dadosPerfil['capa']; ?>"
                class="img-fluid w-100 capa rounded">

            <!-- CONFIGURAÇÕES -->
            <div class="config-btn">
                <?php include "assets/templates/subEdit.php"; ?>
            </div>

            <!-- FOTO + NOME + RAZAO SOCIAL + SLOGAN -->
            <!-- FOTO + NOME + RAZAO SOCIAL + SLOGAN -->
            <div class="position-absolute start-0 bottom-0 ms-5 d-flex align-items-end"
                style="transform: translateY(35%); z-index:1;">

                <!-- FOTO PERFIL -->
                <img src="assets/img/empresa/perfil-empresa/uploads/<?php echo $dadosPerfil['perfil']; ?>"
                    class="rounded-circle shadow border border-4 border-white object-fit-cover bg-white"
                    width="170"
                    height="170">

                <!-- NOME + RAZAO SOCIAL +SLOGAN -->
                <div class="ms-4" style="margin-bottom: -25px;">

                    <h1 class="fw-bold text-black mb-1">
                        <?php echo $dadosPerfil['nome_fantasia']; ?>
                    </h1>

                    <h3 class="fw-bold text-black mb-1">
                        <?php echo $dadosPerfil['rzsocial']; ?>
                    </h3>

                    <p class="fs-5 text-muted mb-0">
                        <?php echo $dadosPerfil['slogan']; ?>
                    </p>

                </div>

            </div>

        </div>

        <!--QUEM SOMOS -->
        <div class="certificados text-center mt-5 pt-5 mb-5">

            <h1 class="text-center mt-5 quem-somos">
                QUEM SOMOS?
            </h1>

        </div>

        <!-- Primeira descrição da empresa -->
        <div class="container-fluid mt-7 px-5 mb-5">
            <div class="row align-items-center">

                <div class="col-md-5">
                    <p class="descricao-texto">
                        <?php echo $dadosPerfil['quem_somos']; ?>
                    </p>
                </div>

                <div class="col-md-6 text-center">
                    <img src="assets/img/empresa/descricao-empresa/uploads/<?php echo $dadosPerfil['descricao']; ?>"
                        class="img-fluid imagem-descricao">
                </div>
            </div>
        </div>

        <!--FAÇA PARTE DO NOSSO TIME-->

        <!-- Título Topo -->
        <div class="certificados text-center mt-5 pt-5 mb-5">

            <h1 class="text-center mt-5 faca-parte">
                FAÇA PARTE DO NOSSO TIME!
            </h1>

        </div>

        <div class="container mt-5">

            <!-- ROW -->
            <div class="row g-4 justify-content-center">

                <?php foreach ($vagas as $vaga): ?>

                    <!-- CARD DA VAGA -->
                    <div class="col-12 col-md-6 col-lg-5">

                        <div class="info-vaga p-4 h-100">

                            <!-- Título -->
                            <div class="text-center mb-4">
                                <h2 class="fw-bold text-white">
                                    <?php echo $vaga['vaga']; ?>
                                </h2>
                            </div>

                            <div class="row g-3">

                                <!-- IMAGEM -->
                                <div class="col-12 text-center">
                                    <img src="assets/img/empresa/vaga_empresa/uploads/<?php echo $vaga['imagem']; ?>"
                                        class="img-fluid rounded">
                                </div>

                                <!-- CAMPOS PEQUENOS -->
                                <div class="col-md-6">
                                    <label class="form-label text-light">Área de Atuação</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['area_atuacao']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-light">Modalidade da Vaga</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['modalidade']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-light">Modelo de Trabalho</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['modelo_de_trabalho']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-light">Localização</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['localizacao']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-light">Salário</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['salario']; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-light">Benefícios</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['beneficio']; ?>
                                    </div>
                                </div>

                                <!-- CAMPOS GRANDES -->
                                <div class="col-12">
                                    <label class="form-label text-light">Carga Horária</label>
                                    <div class="form-control custom-box">
                                        <?php echo $vaga['carga_horaria']; ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label text-light">Descrição da Vaga</label>
                                    <div class="form-control custom-box area-grande">
                                        <?php echo $vaga['descricao']; ?>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label text-light">Requisitos</label>
                                    <div class="form-control custom-box area-grande">
                                        <?php echo $vaga['requisitos']; ?>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

        <!--CANAIS OFICIAIS-->
        <div class="rodape mt-5 py-4 text-center">

            <div class="container">

                <h5 class="mb-3 titulo-rodape">CANAIS OFICIAIS</h5>

                <div class="d-flex justify-content-center gap-4">
                    <i class="fa-brands fa-facebook icone"></i>
                    <i class="fa-brands fa-instagram icone"></i>
                    <i class="fa-solid fa-earth-americas icone"></i>
                </div>

            </div>

        </div>


    </main>

    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>
</body>

</html>