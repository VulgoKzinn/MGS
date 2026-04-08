<!-- KAUÃ -->
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

            <!-- Primeira linha -->
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
                <div class="col-md-4">
                    <label for="emailEmp" class="form-label">E-mail Corporativo</label>
                    <input type="email" class="form-control" id="emailEmp" placeholder="contato@empresa.com">
                </div>
            </div>

            <!-- Segunda linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="telefoneEmp" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefoneEmp" placeholder="(XX) XXXXX-XXXX">
                </div>
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cepEmp" placeholder="00000-000">
                </div>
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">Número</label>
                    <input type="number" class="form-control" id="numeroEmp" placeholder="Nº 30">
                </div>
                </div>
            </div>

            <!-- Terceira linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">Complemnto</label>
                    <input type="text" class="form-control" id="complementoEmp" placeholder="Casa">
                </div>
                <div class="col-md-4">
                    <label for="area" class="form-label">Ramo de Atuação</label>
                    <select class="form-select" name="" id="">
                        <option value="" disabled selected>Selecione...</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="pcd">
                        <label class="form-check-label" for="pcd">
                            Contrato Pessoa com Deficiência (PCD)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Botão -->
            <div class="text-end">
                <button type="submit"
                                class="btn btn-success">Próximo</button>
            </div>
        </form>
    </main>



   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
    <script>
        $(document).ready(function () {
            $('#cnpj').mask('00.000.000/0000-00');   // CNPJ
            $('#telefoneEmp').mask('(00) 00000-0000'); // Telefone
            $('#cepEmp').mask('00000-000');          // CEP
            $('#numeroEmp').mask('0000');          // NÚMERO
        });

        $('.selectpicker').selectpicker('refresh');
    </script>

</body>

</html>