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

    <?php require_once "assets/templates/headerMGS.php" ?>

    <div class="container mt-4">

        <div class="card-vaga">

            <div class="headerVaga">
                <img src="./assets/img/sabesp-companhia-de-saneamento-basico-do-estado-de-sao-paulo 1.png" class="logo">
                <h5 class="m-0">SABESP - SP</h5>
            </div>

            <div class="conteudo">
                <h5>Vaga: Leiturista – SABESP</h5>

                <p>
                    A SABESP está em busca de um profissional responsável e comprometido para atuar como Leiturista. A função consiste na leitura e registro do consumo de água nos hidrômetros, conferência de dados, identificação de irregularidades e orientação básica aos clientes quando necessário. É importante ter atenção aos detalhes, boa organização, disposição para trabalho externo e compromisso com prazos e qualidade das informações coletadas.
                </p>

                <div class="conteudo-extra" id="conteudoExtra">
                    <h5>Requisitos:</h5>
                    <p>
                        Ensino médio completo<br>
                        CNH categoria A ou B<br>
                        Noções básicas de leitura e escrita<br>
                        Conhecimento básico de celular ou coletor de dados
                    </p>

                    <h5>Área de Atuação:</h5>
                    <p>Leiturista</p>

                    <h5>Modalidade:</h5>
                    <p>Presencial</p>

                    <h5>Localização:</h5>
                    <p>São João da Boa Vista</p>

                    <h5>Benefícios:</h5>
                    <p>Não tem que pagar água</p>

                    <h5>Carga Horária:</h5>
                    <p>12 por 36</p>
                </div>

                <button class="btn btn-light mt-2 btn-ler-mais" onclick="toggleTexto()" id="btnLerMais">
                Ler mais
                </button>

                <img src="./assets/img/image 2.jpg" class="imagem">
            </div>




            <form class="acoes">
                <button type="submit" class="btn-circle like">❤</button>
                <button type="submit" class="btn-circle dislike">✖</button>
            </form>

        </div>

    </div>

    <footer></footer>

    <script>
        function toggleTexto() {
            let conteudo = document.getElementById("conteudoExtra");
            let botao = document.getElementById("btnLerMais");
            if (conteudo.style.display === "none" || conteudo.style.display === "") {
                conteudo.style.display = "block";
                botao.innerText = "Ler menos";
            } else {
                conteudo.style.display = "none";
                botao.innerText = "Ler mais";
            }
        }
    </script>
    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>




</body>

</html>