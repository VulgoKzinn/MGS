<!-- SABRINA -->
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
        <form action="" method="post" class="p-4">
            <h2 class="text-center mb-4">Anunciar Nova Vaga</h2>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="area-atuacao" class="form-label">Área de Atuação</label>
                    <input type="text" class="form-control" id="area-atuacao" required>
                </div>

                <div class="col-md-4">
                    <label for="modalidade" class="form-label">Modalidade da Vaga</label>
                    <select name="modalidade" id="modalidade" required>
                        <option value="" selected disabled>Selecione...</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Home Office">Home Office</option>
                        <option value="Híbrido">Híbrido</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="localizacao" class="form-label">Cidade / Estado</label>
                    <input type="text" class="form-control" id="localizacao" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="salario" class="form-label">Salário</label>
                    <input type="text" class="form-control" id="salario" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="beneficios" class="form-label">Benefícios</label>
                    <input type="text" class="form-control" id="beneficios" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="carga-horaria" class="form-label">Carga Horária</label>
                    <input type="text" class="form-control" id="carga-horaria" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descricao-vaga" class="form-label">Descrição da Vaga</label>
                    <textarea class="form-control" id="descricao-vaga" rows="4" required></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="requisitos" class="form-label">Requisitos</label>
                    <textarea class="form-control" id="requisitos" rows="4" required></textarea>
                </div>


            </div>



            <!-- Botão -->
            <div class="text-end">
                <button type="submit"
                    class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    </main>



    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>


</body>

</html>