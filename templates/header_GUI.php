<?php require_once "modal_post.php"; ?>

<header>
    <nav>
        <img src="img/logo.svg" alt="logo" class="logo">

        <ul class="menu">
            <!-- FILTRO -->
            <li>
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    FILTRO <i class="fa-solid fa-arrow-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item">Opção 1</a></li>
                    <li><a href="#" class="dropdown-item">Opção 2</a></li>
                    <li><a href="#" class="dropdown-item">Opção 3</a></li>
                </ul>
            </li>

            <!-- ADICIONAR -->
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalCertificado">
                    ADICIONAR
                </a>
            </li>

            <!-- VAGAS -->
            <li>
                <a href="#">VAGAS PREENCHIDAS</a>
            </li>
        </ul>

        <!-- 👤 USUÁRIO -->
        <div class="dropdown">
            <a href="#" class="user-icon" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="./perfil.php" class="dropdown-item">Perfil</a></li>
                <li><a href="#" class="dropdown-item">Notificações</a></li>
                <li><a href="#" class="dropdown-item">Configurações</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="./login.php" class="dropdown-item text-danger">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>