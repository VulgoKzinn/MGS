<!-- KAUÃ -->
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Matchwork</title>
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
</head>

<body>
    <?php require_once "assets/templates/header.php" ?>
    <main>
        <id id="container">
            <section id="MgsPrimary">
                <div>
                    <h2>Informe às pessoas certas que você está buscando emprego!</h2>
                    <p>Com o MatchWork, você pode dar um Match na vaga dos seus sonhos tudo isso coma a nossa comunidade
                        empresarial que está buscando novos profissionais capacitados.</p>
                </div>
                <img src="assets/img/index/MGS-primary.png" alt="Pessoa usando o Matchwork">
            </section>

            <section id="MgsSecondary">
                <div id="cards">
                    <div id="empresario">
                        <img src="assets/img/index/cards/empresario.png">
                        <p>Empresário</p>
                    </div>
                    <div id="mgs">
                        <img src="assets/img/index/cards/mgs.png">
                        <p>Juntos ao MatchWork</p>
                    </div>
                    <div id="candidato">
                        <img src="assets/img/index/cards/candidato.png">
                        <p>Candidato</p>
                    </div>
                </div>
            </section>

            <section id="MgsThird">
                <img src="assets/img/index/section3.png" alt="Fluxograma de possibilidades">
            </section>


            <section id="MgsFourth">
                <img src="assets/img/index/historia.png" alt="Nossa História">
                <div>
                    <h2>Nossa História</h2>
                    <p>Na Matchwork, acreditamos que encontrar o emprego ideal ou o talento perfeito não deveria ser uma
                        jornada complexa.
                        Somos uma plataforma inovadora dedicada a revolucionar o processo de recrutamento e seleção,
                        tornando-o mais eficiente, intuitivo e, acima de tudo, humano.</p>
                    <button><a href="cadastrar-candidato.php">Cadastre-se</a></button>
                </div>
            </section>
        </id>
    </main>
    <?php require_once "assets/templates/footer.php" ?>

   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
</body>

</html>