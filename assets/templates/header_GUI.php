<?php require_once "modal_post.php";

?>
<header>
    <nav>
        <img src="assets/img/logo.svg" alt="logo" class="logo">
        <ul class="menu">
            <li><a href="#MgsFourth">FILTRO<i class="fa-solid fa-arrow-down"></i></a></li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalCertificado">
                    ADICIONAR
                </a>
            </li>
            <li><a href="#">VAGAS PREENCHIDAS</a></li>
        </ul>
        <div class="dropdown">
            <a href="#" class="user-icon" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="./perfil.php" class="dropdown-item">Perfil</a></li>
                <li><a href="" class="dropdown-item">Notificações</a></li>
                <li><a href="" class="dropdown-item">Configurações</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a href="./login.php" class="dropdown-item text-danger">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>