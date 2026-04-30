<!-- KAUÃ -->
<?php
require_once "backend/includes/funcoes.php";
// ============================================Lista Atuacao============================================
$listaAtuacaos = listaAtuacao();
// ============================================Lista Atuacao============================================
// ============================================Trazendo id_login============================================
session_start();

if (!isset($_SESSION['id_login'])) {
    header("Location: criarConta.php");
    exit;
}

$id_login = $_SESSION['id_login'];
// ============================================Trazendo id_login============================================
// =============================================Cadastro de Empresa======================================

if (isset($_POST['cadastrarEmp'])) {

    if (empty($_POST['razao']) || empty($_POST['cnpj'])) {
        $mensagem = "Preencha os campos obrigatórios!";
    } else {

        $retorno = cadastrarEmpresa($_POST, $id_login);

        if ($retorno === "sucesso") {
             unset($_SESSION['id_login']);
            header("Location: login.php?cadastro=empresa_sucesso");
            exit;
        } else {
            $mensagem = $retorno;
        }
    }
}
// =============================================Cadastro de Empresa======================================



?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Matchwork</title>
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
            <h2 class="text-center mb-4">Crie sua Conta Empresa</h2>

            <?php if (!empty($mensagem)): ?>
                <div class="alert alert-info">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <!-- Primeira linha -->
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="razao" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" name="razao" id="razao" placeholder="Nome da empresa">
                </div>
                <div class="col-md-6">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00">
                </div>

            </div>

            <!-- Segunda linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="telefoneEmp" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" name="telefoneEmp" id="telefoneEmp" placeholder="(XX) XXXXX-XXXX">
                </div>
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cepEmp" id="cepEmp" placeholder="00000-000">
                </div>
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">Número</label>
                    <input type="number" class="form-control" name="numeroEmp" id="numeroEmp" placeholder="Nº 30">
                </div>
            </div>


            <!-- Terceira linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="cepEmp" class="form-label">Complemnto</label>
                    <input type="text" class="form-control" name="complementoEmp" id="complementoEmp" placeholder="Casa">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ramo de Atuação</label>
                    <select class="form-control" name="ramo" id="ramo">
                        <option value="" selected>Escolha...</option>
                        <?php foreach ($listaAtuacaos as $listaAtuacao): ?>
                            <option value="<?= $listaAtuacao['id']; ?>">
                                <?= $listaAtuacao['ramo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="pcd" name="pcd">
                        <label class="form-check-label" for="pcd">
                            Contrato Pessoa com Deficiência (PCD)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Botão -->
            <div class="text-end">
                <button type="submit" name="cadastrarEmp" class="btn btn-success">Próximo</button>
            </div>
        </form>
    </main>



    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>
    <script>
        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00'); // CNPJ
            $('#telefoneEmp').mask('(00) 00000-0000'); // Telefone
            $('#cepEmp').mask('00000-000'); // CEP
            $('#numeroEmp').mask('0000'); // NÚMERO
        });

        $('.selectpicker').selectpicker('refresh');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>