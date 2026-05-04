<!-- SABRINA -->
<?php
require_once "backend/includes/funcoes.php";


//caso seja clicado no botão cadastrar a função é executada
if (isset($_POST['cadastrar'])) {
    $vaga = filter_input(INPUT_POST, 'vaga');
    $area_atuacao = filter_input(INPUT_POST, 'area_atuacao');
    $modalidade = filter_input(INPUT_POST, 'modalidade');
    $modelo_de_trabalho = filter_input(INPUT_POST, 'modelo_de_trabalho');
    $localizacao = filter_input(INPUT_POST, 'localizacao');
    $salario = filter_input(INPUT_POST, 'salario');
    $beneficio = filter_input(INPUT_POST, 'beneficio');
    $carga_horaria = filter_input(INPUT_POST, 'carga_horaria');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $requisitos = filter_input(INPUT_POST, 'requisitos');

    $idVaga = cadastrarVaga($vaga, $area_atuacao, $modalidade, $modelo_de_trabalho, $localizacao, $salario, $beneficio, $carga_horaria, $descricao, $requisitos);

    //executa a função de upload da imagem, enviando o id do produto e a imagem para upload
    $nomeImagemUpload = uploadImagem($_FILES['imagem']);

    if ($nomeImagemUpload) {
        cadastrarImagemVaga($idVaga, $nomeImagemUpload);
    } else {
        echo "Erro no upload da imagem";
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Vaga| Matchwork</title>

    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="index.php"><img src="assets/img/Logomaior.png" alt="Logo"></a>
    </div>

    <!-- Formulário -->
    <main id="CadCand">
        <form action="" method="post" class="p-4" enctype="multipart/form-data">
            <h2 class="text-center mb-4">Anunciar Nova Vaga</h2>

            <div class="row mb-3">

                <div class="col-md-4 mb-3">
                    <label for="vaga" class="form-label">Nome da Vaga</label>
                    <input type="text" class="form-control" name="vaga" id="vaga" required>
                </div>


                <div class="col-md-4 mb-3">
                    <label for="area_atuacao" class="form-label">Área de Atuação</label>
                    <input type="text" class="form-control" name="area_atuacao" id="area_atuacao" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="modalidade" class="form-label">Modalidade da Vaga</label>
                    <select class="form-select" name="modalidade" name="modalidade" id="modalidade" required>
                        <option value="" selected disabled>Selecione...</option>
                        <option value="Presencial">CLT</option>
                        <option value="Home Office">PJ</option>
                        <option value="Híbrido">Estágio</option>
                        <option value="Híbrido">Freelancer</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="modelo_de_trabalho" class="form-label">Modelo de Trabalho</label>
                    <select class="form-select" name="modelo_de_trabalho" id="modelo_de_trabalho" required>
                        <option value="" selected disabled>Selecione...</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Home Office">Home-Office</option>
                        <option value="Híbrido">Híbrido</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="localizacao" class="form-label">Cidade / Estado</label>
                    <input type="text" class="form-control" name="localizacao" id="localizacao" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="salario" class="form-label">Salário</label>
                    <input type="text" class="form-control" name="salario" id="salario" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="beneficio" class="form-label">Benefícios</label>
                    <input type="text" class="form-control" name="beneficio" id="beneficio" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="carga_horaria" class="form-label">Carga Horária</label>
                    <input type="text" class="form-control" name="carga_horaria" id="carga_horaria">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descricao" class="form-label">Descrição da Vaga</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="4" required></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="requisitos" class="form-label">Requisitos</label>
                    <textarea class="form-control" name="requisitos" id="requisitos" rows="4" required></textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagem" class="form-label">Foto da Vaga</label>
                    <input class="form-control" type="file" name="imagem" id="imagem" accept="image/*">

                    <div class="mt-3">
                        <img id="previewImagem" src="" alt="Preview" style="max-width: 200px; display: none; border-radius: 8px;">
                    </div>
                </div>

            </div>



            <!-- Botão -->
            <div class="text-end">
                <button name="cadastrar" value="cadastrar" type="submit"
                    class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>



    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>
<script>
    document.getElementById('imagem').addEventListener('change', function(event) {
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