<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Pedro</title>
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
   
</head>

<body>
    <?php include "assets/templates/headerMGS.php"; ?>

    <main class="container mt-4">

        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="banner position-relative">

                <a href="editar-perfil-candidato.php" class="btn-config" title="Configurações">
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

                    <div class="mt-4 info-contato">
                        <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i> pedro.c.azevedo@email.com</p>
                        <p class="mb-0"><i class="bi bi-whatsapp me-2"></i> (19) 99999-9999</p>
                    </div>

                    <button class="btn btn-custom w-100 mt-3">
                        <i class="bi bi-chat-dots-fill me-2"></i> Entrar em contato
                    </button>
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

<div class="Certificados-header">
    <h1>CERTIFICADOS</h1>
</div>
<br><br>
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

        <div class="certificados-list">

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">HTML5</h2>
                    <p class="texto-descricao">"Especializei-me na fundação da web moderna com HTML5 Semântico. Durante minha formação, aprendi a construir estruturas robustas e otimizadas para SEO, garantindo que o conteúdo seja acessível tanto para usuários quanto para motores de busca. Dominei o uso de tags estruturais, formulários inteligentes e a integração de mídias nativas."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_xrk13gxrk13gxrk1.png" class="img-fluid certificado-img" alt="Certificado HTML5">
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-5 text-center order-last order-md-first">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_ha8bw0ha8bw0ha8b.png" class="img-fluid certificado-img" alt="Certificado CSS3">
                </div>
                <div class="col-md-7">
                    <h2 class="titulo-roxo">CSS3</h2>
                    <p class="texto-descricao">"Aprofundei meus conhecimentos em CSS3 para criar interfaces modernas e responsivas. Aprendi a utilizar Flexbox e Grid para layouts avançados, além de dominar animações e transições para melhorar a experiência do usuário. Garanto que os sites sejam funcionais em qualquer dispositivo."</p>
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">JavaScript</h2>
                    <p class="texto-descricao">"Finalizei o curso de JavaScript focado em lógica de programação e interatividade. Durante o aprendizado, desenvolvi habilidades em manipulação do DOM, eventos, consumo de APIs e lógica assíncrona (AJAX/Promises). Crio sistemas web dinâmicos e fluidos."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_u5p4h5u5p4h5u5p4.png" class="img-fluid certificado-img" alt="Certificado JavaScript">
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-5 text-center order-last order-md-first">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_exmupeexmupeexmu.png" class="img-fluid certificado-img" alt="Certificado PHP">
                </div>
                <div class="col-md-7">
                    <h2 class="titulo-roxo">PHP</h2>
                    <p class="texto-descricao">"Certificado em PHP para desenvolvimento backend. Aprendi a construir a inteligência por trás dos sites, incluindo conexão com bancos de dados MySQL, gerenciamento de sessões, formulários seguros e arquitetura de sistemas. Aplico isso em projetos reais como o 'Pizza de Forno'."</p>
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">Adobe Photoshop</h2>
                    <p class="texto-descricao">"Especializei-me em edição e manipulação de imagens. O foco foi em criação de layouts para web, tratamento de fotos profissionais e design de marcas. Entrego a identidade visual completa de um projeto com acabamento profissional."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_tchmttchmttchmtt.png" class="img-fluid certificado-img" alt="Certificado Photoshop">
                </div>
            </section>

        </div>
    </main>
   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
</body>
</html>