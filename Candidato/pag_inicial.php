<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
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
    <link rel="stylesheet" href="../assets/css/pagina-inicial.css">
    <!-- Include Links -->
    <?php
    require_once '../assets/templates/head.php';
    ?>
</head>
<style>
    .btn-like {
        transition: 0.2s;
    }

    .btn-like:hover {
        transform: scale(1.1);
    }
</style>

<body id="bodypgs">
    <?php
    require_once "../assets/templates/headerMGS.php";
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

                    <?php if (!empty($Disponivel['imagem_vaga'])): ?>
                        <img src="../assets/img/empresa/uploads/<?= $Disponivel['imagem_vaga'] ?>">
                    <?php endif; ?>

                </div>

                <button onclick="toggleTexto(this)" class="btn btn-light mt-2 btn-ler-mais">
                    Ler mais
                </button>

                <div class="acoes">

                    <button
                        type="button"
                        class="btn-circle btn-like like btn-match"
                        data-vaga="<?= $Disponivel['id'] ?>">
                        ❤
                    </button>

                    <button
                        type="button"
                        class="btn-circle dislike btn-rejeitar"
                        data-vaga="<?= $Disponivel['id'] ?>">
                        ✖
                    </button>

                </div>

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
    require_once '../assets/templates/js.php';
    ?>

    <script>
        // Coraçaõ na vaga
        document.querySelectorAll('.btn-match').forEach(botao => {

            botao.addEventListener('click', function(e) {

                e.preventDefault();
                this.disabled = true;

                let idVaga = this.dataset.vaga;

                // ANIMAÇÃO
                this.classList.remove(
                    'animate__animated',
                    'animate__heartBeat'
                );

                void this.offsetWidth;

                this.classList.add(
                    'animate__animated',
                    'animate__heartBeat'
                );
                const botaoAtual = this;
                // FETCH
                fetch('../assets/api/match-candidato-back.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: 'id_vaga=' + idVaga + '&acao=match'

                    })

                    .then(response => response.json())

                    .then(data => {

                        console.log(data);

                        if (data.status == 'success') {

                            let card = this.closest('.card-vaga');

                            card.classList.add(
                                'animate__animated',
                                'animate__fadeOutRight'
                            );

                            setTimeout(() => {

                                card.remove();

                            }, 500);

                        } else {

                            botaoAtual.disabled = false;

                        }

                    })

                    .catch(error => {

                        console.log(error);

                        botaoAtual.disabled = false;

                    });

            });

        });

        // X rejeitar vaga 
        document.querySelectorAll('.btn-rejeitar').forEach(botao => {

            botao.addEventListener('click', function(e) {

                e.preventDefault();
                this.disabled = true;

                let idVaga = this.dataset.vaga;

                let card = this.closest('.card-vaga');
                const botaoAtual = this;
                fetch('../assets/api/match-candidato-back.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: 'id_vaga=' + idVaga + '&acao=rejeitar'

                    })

                    .then(response => response.json())

                    .then(data => {

                        console.log(data);

                        if (data.status == 'success') {

                            let card = this.closest('.card-vaga');

                            card.classList.add(
                                'animate__animated',
                                'animate__fadeOutLeft'
                            );

                            setTimeout(() => {

                                card.remove();

                            }, 500);

                        } else {

                            botaoAtual.disabled = false;

                        }

                    })

                    .catch(error => {

                        console.log(error);

                        botaoAtual.disabled = false;

                    });

            });

        });
    </script>
</body>

</html>