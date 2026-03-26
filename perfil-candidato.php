<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Perfil - Pedro</title>
<link rel="stylesheet" href="css/style.css">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php require_once "templates/header_pedro.php" ?>

<main class="container mt-4">

    <!-- BANNER + FOTO -->
    <div class="card border-0 shadow-sm">
        <div class="banner position-relative rounded-top">
            <img class="foto-perfil" src="img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png" alt="Foto de perfil">
        </div>

        <div class="p-4 pt-5">
            <h1 class="mb-0">Pedro</h1>
            <p class="text-muted">Técnico em T.I</p>
        </div>
    </div>

    <!-- CONTEÚDO -->
    <div class="row mt-4">

        <!-- SOBRE -->
        <aside class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Sobre</h5>
                <p>
                    Profissional de Tecnologia da Informação com conhecimento em desenvolvimento web,
                    suporte técnico e design gráfico.
                </p>

                <h5>Certificados</h5>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary">JavaScript</span>
                    <span class="badge bg-primary">PHP</span>
                    <span class="badge bg-primary">Photoshop</span>
                </div>

                <button class="btn btn-primary mt-3">Entrar em contato</button>
            </div>
        </aside>

        <!-- EXPERIÊNCIA -->
        <section class="col-md-8">
            <div class="card p-3 shadow-sm">
                <h5>Experiência</h5>
                <p>💻 Desenvolvimento de sistemas web.</p>
                <p>🖥 Manutenção de computadores.</p>
                <p>🎨 Edição de imagens utilizando Photoshop.</p>

                <h5 class="mt-3">Habilidades</h5>
                <p>HTML • CSS • JavaScript • PHP • Photoshop</p>
            </div>
        </section>

    </div>

    <div>
        
    </div>

</main>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>