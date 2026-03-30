<?php
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
    <a href="#" class="user-icon" data-bs-toggle="dropdown">
        <i class="fa-solid fa-user"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        <li><a href="./perfil.php" class="dropdown-item">Perfil</a></li>
        <li><a href="" class="dropdown-item">Assinatura</a></li>
        <li><a href="" class="dropdown-item">Suporte</a></li>
        <li><a href="" class="dropdown-item">Inpulsionar</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a href="?acao=logout" class="dropdown-item text-danger">Sair</a></li>
    </ul>
</div>