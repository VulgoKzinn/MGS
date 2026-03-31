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

                <a href="editar-perfil-candidato.html" class="btn-config" title="Configurações">
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
                        <span class="badge badge-custom">CSS</span>
                         <span class="badge badge-custom">HTML</span>
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

<div class="Certificaos">
    <h2>Certificados</h2>

    <div id="carouselCertificados" class="carousel slide"
         data-bs-ride="carousel"
         data-bs-interval="2500"
         data-bs-pause="false"
         data-bs-wrap="true">

        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="4"></button>
        </div>

        <!-- Itens -->
        <div class="carousel-inner text-center">

            <div class="carousel-item active">
                <img src="assets/img/perfil-candidato/Gemini_Generated_Image_xrk13gxrk13gxrk1.png" class="d-block mx-auto img-fluid">
                <h5 class="mt-3">Certificado de HTML</h5>
            </div>

            <div class="carousel-item">
                <img src="assets/img/perfil-candidato/Gemini_Generated_Image_ha8bw0ha8bw0ha8b.png" class="d-block mx-auto img-fluid">
                <h5 class="mt-3">Certificado de CSS</h5>
            </div>

            <div class="carousel-item">
                <img src="assets/img/perfil-candidato/Gemini_Generated_Image_tchmttchmttchmtt.png" class="d-block mx-auto img-fluid">
                <h5 class="mt-3">Certificado de Photoshop</h5>
            </div>

            <div class="carousel-item">
                <img src="assets/img/perfil-candidato/Gemini_Generated_Image_u5p4h5u5p4h5u5p4.png" class="d-block mx-auto img-fluid">
                <h5 class="mt-3">Certificado de JavaScript</h5>
            </div>

            <div class="carousel-item">
                <img src="assets/img/perfil-candidato/Gemini_Generated_Image_exmupeexmupeexmu.png" class="d-block mx-auto img-fluid">
                <h5 class="mt-3">Certificado de PHP</h5>
            </div>

        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCertificados" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselCertificados" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>