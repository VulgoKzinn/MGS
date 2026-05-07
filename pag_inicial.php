<?php
require_once "backend/includes/funcoes.php";
// ================================================= Valida pagina que o usuario deve acessar =====================================
session_start();
validaAcesso();
validaUsuario();
// ================================================= Valida pagina que o usuario deve acessar =====================================
// ============================================================Lista Vagas=================================================
$Disponiveis = VagasDisponiveis();
// ============================================================Lista Vagas=================================================
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/pagina-inicial.css">
    <!-- Include Links -->
    <?php
    require_once 'assets/templates/head.php';
    ?>
</head>

<body id="bodypgs">
    <?php
    require_once "assets/templates/headerMGS.php";
    ?>

    <?php foreach ($Disponiveis as $Disponivel): ?>
            <div class="card-vaga">

                <div class="headerVaga">
                    <img src="<?= $Disponivel['logo'] ?>" class="logo">
                    <h5 class="m-0"><?= $Disponivel['nome_fantasia'] ?></h5>
                </div>

            <div class="conteudo">
                <h5>Vaga: <?= $Disponivel['vaga'] ?></h5>

                <p>
                    <?= $Disponivel['descricao'] ?>
                </p>

                <div class="conteudo-extra">


                    <h5>Área de Atuação:</h5>
                    <p><?= $Disponivel['area_atuacao'] ?></p>

                    <h5>Modalidade:</h5>
                    <p><?= $Disponivel['modalidade'] ?></p>

                    <h5>Localização:</h5>
                    <p><?= $Disponivel['descricao'] ?></p>

                    <h5>Descrição:</h5>
                    <p><?= $Disponivel['beneficio'] ?></p>

                    <h5>Requisitos:</h5>
                    <p><?= $Disponivel['requisitos'] ?></p>

                    <h5>Salário:</h5>
                    <p><?= $Disponivel['salario'] ?></p>

                    <h5>Benefícios:</h5>
                    <p><?= $Disponivel['beneficio'] ?></p>

                    <h5>Carga Horária:</h5>
                    <p><?= $Disponivel['carga_horaria'] ?></p>

                    <h5>Modelo de Trabalho:</h5>
                    <p><?= $Disponivel['modelo_de_trabalho'] ?></p>
                </div>

                <button onclick="toggleTexto(this)" class="btn btn-light mt-2 btn-ler-mais">
                    Ler mais
                </button>

                <img src="./assets/img/<?= $Disponivel['id_img_vaga'] ?>">

                <form class="acoes">
                    <button type="submit" class="btn-circle like">❤</button>
                    <button type="submit" class="btn-circle dislike">✖</button>
                </form>

            </div>

            </div>

        <?php endforeach; ?>

        <script>
            function toggleTexto(btn) {
                const card = btn.closest('.card-vaga');
                const conteudo = card.querySelector('.conteudo-extra');

                if (conteudo.style.display === "block") {
                    conteudo.style.display = "none";
                    btn.innerText = "Ler mais";
                } else {
                    conteudo.style.display = "block";
                    btn.innerText = "Ler menos";
                }
            }
        </script>
        <!-- Include JS -->
        <?php
        require_once 'assets/templates/js.php';
        ?>
</body>

</html>