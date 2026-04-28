<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];
validaEmpresa($id_nivel);
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil | Matchwork</title>

    <?php require_once 'assets/templates/head.php'; ?>
</head>

<body id="login">

    <div id="ImgLogon" class="text-center mb-3">
        <a href="index.php">
            <img src="assets/img/logomaior.png" alt="Logo">
        </a>
    </div>

    <main id="Logon">
        <form action="" method="post">

            <div class="d-flex justify-content-start mb-3">
                <a href="perfil-candidato.php" class="btn btn-outline-light">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </div>

            <h2 class="text-center mb-4">Editar Perfil</h2>

            <!-- FOTO DE CAPA -->
            <div class="mb-3 text-center">
                <label class="form-label">Foto de Capa</label><br>
                <img id="previewCapa" src="assets/img/perfil-candidato/Gemini_Generated_Image_kajkswkajkswkajk.png"
                     class="img-fluid rounded mb-2" style="max-height:150px;">
                <input type="file" class="form-control" id="capaInput" accept="image/*">
            </div>

            <!-- FOTO DE PERFIL -->
            <div class="mb-3 text-center">
                <label class="form-label">Foto de Perfil</label><br>
                <img id="previewPerfil" src="assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png"
                     class="rounded-circle mb-2"
                     style="width:120px; height:120px; object-fit:cover;">
                <input type="file" class="form-control" id="perfilInput" accept="image/*">
            </div>

            <!-- Nome -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-user"></i>
                </span>
                <div class="form-floating">
                    <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
                    <label>Nome Completo</label>
                </div>
            </div>

            <!-- Email -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-envelope"></i>
                </span>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <label>E-mail</label>
                </div>
            </div>

            <!-- Telefone -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-phone"></i>
                </span>
                <div class="form-floating">
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                    <label>Telefone</label>
                </div>
            </div>

            <!-- Endereço -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-location-dot"></i>
                </span>
                <div class="form-floating">
                    <input type="text" name="endereco" class="form-control" placeholder="Endereço">
                    <label>Endereço</label>
                </div>
            </div>

            <!-- BIOGRAFIA (NOVO) -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-file-lines"></i>
                </span>
                <div class="form-floating">
                    <textarea name="biografia" class="form-control" placeholder="Biografia" style="height: 120px;"></textarea>
                    <label>Biografia</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Salvar</button>

        </form>
    </main>

    <script>
        document.getElementById('capaInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('previewCapa').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });

        document.getElementById('perfilInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('previewPerfil').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>

    <?php require_once 'assets/templates/js.php'; ?>

</body>
</html>