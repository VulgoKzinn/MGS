<!-- KAUÃ -->
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Matchwork</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="index.html"><img src="img/Logomaior.png" alt="Logo"></a>
    </div>
    <!-- Formulário -->
    <main id="CadCand">
        <form action="" method="post" class="p-4">
            <h2 class="text-center mb-4">Crie sua Conta Empresa</h2>

            <!-- Primeira linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="razao" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" id="razao" placeholder="Nome da empresa">
                </div>
                <div class="col-md-4">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" placeholder="00.000.000/0000-00">
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
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" class="selectpicker form-select" data-live-search="true">
                        <option value="">Selecione o estado</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <select id="municipio" class="selectpicker form-select" data-live-search="true">
                        <option value="">Selecione o município</option>
                    </select>
                </div>
            </div>

            <!-- Terceira linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cepEmp" placeholder="00000-000">
                </div>
                <div class="col-md-4">
                    <label for="area" class="form-label">Área de Atuação</label>
                    <input type="text" class="form-control" id="area" placeholder="Ex: Tecnologia">
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
                <button type="submit" class="btn btn-success">Próximo</button>
            </div>
        </form>
    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
    <script src="js/APIIBGE.js"></script>
    <script>
        $(document).ready(function () {
            $('#cnpj').mask('00.000.000/0000-00');   // CNPJ
            $('#telefoneEmp').mask('(00) 00000-0000'); // Telefone
            $('#cepEmp').mask('00000-000');          // CEP
        });

        $('.selectpicker').selectpicker('refresh');
    </script>

</body>

</html>