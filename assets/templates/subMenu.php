<?php
require_once "backend/includes/funcoes.php";

$perfilLink = './perfil-candidato.php';

if (isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] == 1) {
    $perfilLink = './perfil-empresa.php';
}

$acao = $_GET['acao'] ?? null;

if ($acao === 'logout') {
    logout();
}
?>

<style>
    .dropdown-menu {
        background-color: #6750A4;
        border: none;
    }

    .dropdown-item {
        color: #fff;
    }

    .dropdown-item:hover {
        background-color: #5a4492;
        /* roxo um pouco mais escuro */
        color: #fff;
    }

    .dropdown-divider {
        border-color: rgba(255, 255, 255, 0.2);
    }
</style>


<div class="dropdown">
    <a href="#" class="nav-item" data-bs-toggle="dropdown">
        <i class="fa-solid fa-user" style= "color: rgb(103,80,164);"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        <li><a href="<?= $perfilLink ?>" class="dropdown-item">Perfil</a></li>
        <li><a href="assinatura.php" class="dropdown-item">Assinatura</a></li>
        <li><a href="suporte.php" class="dropdown-item">Suporte</a></li>
        <?php if($_SESSION['id_nivel'] == 1): ?>
        <li><a href="" class="dropdown-item">Inpulsionar</a></li>
        <?php endif; ?>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a href="?acao=logout" class="dropdown-item text-danger">Sair</a></li>
    </ul>
</div>