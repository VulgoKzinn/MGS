<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Pedro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>

<body>
    <?php include "assets/templates/header_pedro.php"; ?>

    <main class="container mt-4">

        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="banner position-relative">

                <a href="configuracoes.php" class="btn-config" title="Configurações">
                    <i class="bi bi-gear-fill"></i>
                </a>


                <div class="container-foto">
                    <img class="foto-perfil" src="assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png" alt="Foto de perfil">
                </div>
            </div>

            <div class="card-body p-4 pt-5">
                <h1 class="h3 mb-0">Pedro</h1>
                <p class="text-muted">Técnico em T.I</p>
            </div>
        </div>

        <div class="row mt-4">
            <aside class="col-md-4 mb-4">
                <div class="card p-3 shadow-sm border-0">
                    <h5 class="fw-bold">Sobre</h5>
                    <p class="text-secondary">
                        Profissional de Tecnologia da Informação com conhecimento em desenvolvimento web,
                        suporte técnico e design gráfico.
                    </p>

                    <h5 class="fw-bold mt-4">Certificados</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge badge-custom">JavaScript</span>
                        <span class="badge badge-custom">PHP</span>
                        <span class="badge badge-custom">Photoshop</span>
                    </div>

                    <button class="btn btn-custom w-100 mt-4">Entrar em contato</button>
                </div>
            </aside>

            <section class="col-md-8">
                <div class="card p-4 shadow-sm border-0">
                    <h5 class="fw-bold mb-3">Experiência</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">💻 Desenvolvimento de sistemas web.</li>
                        <li class="mb-2">🖥 Manutenção de computadores.</li>
                        <li class="mb-2">🎨 Edição de imagens utilizando Photoshop.</li>
                    </ul>
                    <hr>
                    <h5 class="fw-bold mt-3">Habilidades Principais</h5>
                    <p class="text-muted">HTML • CSS • JavaScript • PHP • Photoshop</p>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>