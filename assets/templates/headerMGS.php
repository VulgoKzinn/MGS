<?php
require_once "backend/includes/funcoes.php";
$matchLink = './match-candidato.php';

if (isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] == 1) {
    $matchLink = './match-empresa.php';
}
?>
<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: #fff;
        z-index: 1000;
        /* garante que fique acima de tudo */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<header class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light px-4 py-2 shadow-sm rounded-pill mt-2">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="pag_inicial.php">
                <img src="assets/img/logo.svg" alt="logo" height="32">
            </a>

            <!-- Botão mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Conteúdo -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

                <!-- BUSCA -->
                <form class="search-container mx-auto">
                    <div class="search-wrapper">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input
                            type="search"
                            class="search-input"
                            placeholder="Buscar vagas...">
                    </div>
                </form>

                <!-- MENU DIREITA -->
                <ul class="navbar-nav align-items-center gap-3">

                    <li class="nav-item">
                        <a class="nav-link fw-semibold" style="color: rgb(103,80,164);" href="<?= $matchLink ?>">
                            Matches
                        </a>
                    </li>

                    <li class="nav-item position-relative">
                        <a class="nav-link text-dark" href="#">
                            <i class="fa-solid fa-bell" style="color: rgb(103,80,164);"></i>
                        </a>
                    </li>

                </ul>

                <?php include "submenu.php"; ?>

            </div>
        </nav>
    </div>
</header>