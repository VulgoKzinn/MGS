<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";

// CADASTRAR
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $plano = $_POST['plano'];
    $valor = $_POST['valor'];

    $msg = cadastrarPlano($plano, $valor);
}

// LISTAR
$planos = listarPlanos();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Planos | Matchwork</title>

    <?php
    require_once '../assets/templates/head.php';
    ?>
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        main {
            display: flex;
            justify-content: center;
        }

        #grid-plano {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        /* CARDS */
        .flat {
            width: 100%;
            max-width: 450px;
            padding: 35px;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .flat:hover {
            transform: translateY(-5px);
        }

        /* TÍTULOS */
        .flat h3 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .flat h4 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* INPUTS */
        .form-control {
            height: 45px;
            font-size: 16px;
        }

        /* BOTÃO */
        .btn-success {
            height: 45px;
            font-size: 16px;
            border-radius: 10px;
        }

        /* LISTA */
        .plano-item {
            margin-top: 15px;
        }

        .text-primary {
            font-size: 18px;
            font-weight: bold;
        }

        hr {
            margin: 15px 0;
        }

        /* RESPONSIVO */
        @media (max-width: 900px) {
            #grid-plano {
                flex-direction: column;
            }
        }
    </style>
</head>

<body id="login">

<div id="ImgLogon">
    <a href="./"><img src="../assets/img/Logomaior.png" alt="Logo"></a>
</div>

<main>
    <div id="grid-plano">

        <!-- FORM -->
        <div class="flat">
            <h3 class="text-center">Cadastrar Plano</h3>

            <form action="" method="POST">

                <div class="mt-3">
                    <label>Nome do Plano</label>
                    <input type="text" name="plano" class="form-control" required>
                </div>

                <div class="mt-3">
                    <label>Valor</label>
                    <input type="number" step="0.01" name="valor" class="form-control" required>
                </div>

                <div class="text-center mt-4">
                    <input type="submit" value="Cadastrar" class="btn btn-success w-100">
                </div>

            </form>

            <?php if (isset($msg)) echo "<p class='text-center mt-3'>$msg</p>"; ?>
        </div>

        <!-- LISTAGEM -->
        <div class="flat">
            <h4 class="text-center">Planos Cadastrados</h4>

            <?php if (!empty($planos)): ?>
                <?php foreach ($planos as $p): ?>
                    <div class="plano-item text-center">
                        <strong><?= $p['nome'] ?></strong><br>
                        <span class="text-primary">
                            R$ <?= number_format($p['valor'], 2, ',', '.') ?>
                        </span>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center mt-3">Nenhum plano cadastrado.</p>
            <?php endif; ?>

        </div>

    </div>
</main>

    <?php
    require_once '../assets/templates/js.php';
    ?>

</body>
</html>