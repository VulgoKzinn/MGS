<!-- SABRINA -->
<?php
require_once "backend/includes/funcoes.php";

session_start();
$id_empresa = $_SESSION['id_empresa'];

//caso seja clicado no botão adicionar a função é executada
if (isset($_POST['adicionar'])) {
    // pega o ID da empresa logada
    $slogan = filter_input(INPUT_POST, 'slogan');
    $quem_somos = filter_input(INPUT_POST, 'quem_somos');
    

    adicionarPersonalizacao($slogan, $quem_somos, $id_empresa);

    // UPLOADS IMAGENS
    $imgPerfil = empresaImagemUpload($_FILES['imagem_perfil'],"assets/img/empresa/perfil_empresa/uploads");

    $imgCapa = empresaImagemUpload($_FILES['imagem_capa'],"assets/img/empresa/capa_empresa/uploads/");

    $imgDescricao = empresaImagemUpload($_FILES['foto_empresa'],"assets/img/empresa/descricao_empresa/uploads/");

    // INSERT IMAGENS
    adicionarImagemPerfilEmpresa($imgPerfil,$imgCapa,$imgDescricao);
}


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personalização do Perfil| Matchwork</title>

    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="perfil-empresa.php"><img src="assets/img/Logomaior.png" alt="Logo"></a>
    </div>

    <!-- Formulário -->
    <main id="CadCand">

    <form action="" method="post" class="p-4" enctype="multipart/form-data">

        <!-- TÍTULO -->
       <h2 class="text-center mb-5 fw-bold">
            Adicione as Informações do seu Perfil!
        </h2>

        <div class="row g-4">

            <!-- SLOGAN -->
            <div class="col-md-6">

                <label for="slogan" class="form-label fw-semibold">
                    Slogan
                </label>

                <input type="text"
                    class="form-control"
                    name="slogan"
                    id="slogan"
                    required>

            </div>

            <!-- FOTO PERFIL -->
            <div class="col-md-4">

                <label for="imagem_perfil" class="form-label fw-semibold">
                    Foto Perfil
                </label>

                <input class="form-control"
                    type="file"
                    name="imagem_perfil"
                    id="imagem_perfil"
                    accept="image/*">

            </div>

            <!-- FOTO CAPA -->
            <div class="col-md-4">

                <label for="imagem_capa" class="form-label fw-semibold">
                    Foto Capa
                </label>

                <input class="form-control"
                    type="file"
                    name="imagem_capa"
                    id="imagem_capa"
                    accept="image/*">

            </div>

            <!-- FOTO EMPRESA -->
            <div class="col-md-4">

                <label for="foto_empresa" class="form-label fw-semibold">
                    Foto da Empresa
                </label>

                <input class="form-control"
                    type="file"
                    name="foto_empresa"
                    id="foto_empresa"
                    accept="image/*">

            </div>

            <!-- QUEM SOMOS -->
            <div class="col-12">

                <label for="quem_somos" class="form-label fw-semibold">
                    Quem Somos?
                </label>

                <textarea class="form-control"
                    name="quem_somos"
                    id="quem_somos"
                    rows="6"
                    required></textarea>

            </div>

        </div>

        <!-- BOTÃO -->
        <div class="text-end mt-5">

            <button name="adicionar"
                value="adicionar"
                type="submit"
                class="btn btn-success px-5 py-2 fw-semibold">

                Adicionar

            </button>

        </div>

    </form>

</main>



    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>
<script>
    document.getElementById('imagem_perfil').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImagem');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});
</script>

</body>

</html>