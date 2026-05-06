<?php
require_once "backend/includes/funcoes.php";
session_start();
validaAcesso();
validaUsuario();

global $conexao;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Pedro</title>
    <!-- Include Links do seu sistema -->
    <?php require_once 'assets/templates/head.php'; ?>
</head>
<body>
    <?php include "assets/templates/headerMGS.php"; ?>

    <main class="container mt-4">
        <!-- CARD PRINCIPAL: BANNER E FOTO -->
        <div class="card border-0 shadow-sm overflow-hidden mb-4">
            <div class="banner position-relative">
                <a href="editar-perfil-candidato.php" class="btn-config" title="Configurações">
                    <i class="bi bi-gear-fill"></i>
                </a>
                <div class="container-foto">
                    <img class="foto-perfil" src="assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png" alt="Foto de perfil">
                </div>
            </div>
            <div class="card-body p-4 pt-5 mt-3">
                <h1 class="h3 mb-0 fw-bold">Pedro</h1>
                <p class="text-muted">Técnico em T.I | Desenvolvedor Web | Designer</p>
            </div>
        </div>

        <div class="row">
            <!-- COLUNA ESQUERDA: SOBRE E CONTATO -->
            <aside class="col-md-4 mb-4">
                <div class="card p-4 shadow-sm border-0">
                    <h5 class="fw-bold titulo-roxo-curto mb-3">Sobre</h5>
                    <p class="text-secondary small">
                        Profissional de Tecnologia da Informação com conhecimento em desenvolvimento web, suporte técnico e design gráfico. Focado em criar soluções digitais modernas e eficientes.
                    </p>

                    <h5 class="fw-bold mt-4 mb-3 titulo-roxo-curto">Certificados</h5>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="badge badge-custom">JavaScript</span>
                        <span class="badge badge-custom">PHP</span>
                        <span class="badge badge-custom">CSS</span>
                        <span class="badge badge-custom">HTML</span>
                        <span class="badge badge-custom">Photoshop</span>
                    </div>

                    <div class="info-contato-expandida">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-at-fill fs-4 me-3"></i>
                            <span class="small">pedro.c.azevedo@email.com</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-whatsapp fs-4 me-3"></i>
                            <span class="small">(19) 99999-9999</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                            <span class="small">CEP: 13870-000 • São João da Boa Vista - SP</span>
                        </div>
                    </div>

                    <a href="https://wa.me/5519999999999" target="_blank" class="btn btn-custom-lg w-100 py-3 shadow">
                        <i class="bi bi-chat-left-dots-fill me-2"></i> CONVERSAR NO WHATSAPP
                    </a>
                </div>
            </aside>

            <!-- COLUNA DIREITA: EXPERIÊNCIA E PROJETOS -->
            <section class="col-md-8">
                <div class="card p-4 shadow-sm border-0 h-100">
                    <h5 class="fw-bold mb-3 titulo-roxo-curto">Experiência</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-code-slash"></i></span>
                            <div><strong>Desenvolvimento Web:</strong> Interfaces responsivas e sistemas dinâmicos.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-pc-display"></i></span>
                            <div><strong>Suporte & Manutenção:</strong> Diagnóstico de hardware e redes.</div>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-palette"></i></span>
                            <div><strong>Design Gráfico:</strong> Edição profissional e identidades visuais.</div>
                        </li>
                    </ul>

                    <hr class="my-4">
                    <h5 class="fw-bold mb-3 titulo-roxo-curto">Meus Projetos</h5>

                    <!-- Card 1: Hamburgueria -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🍔</span>
                            <h6 class="fw-bold mb-0 text-dark">Sistema Hamburgueria Online</h6>
                        </div>
                        <p class="text-muted small mb-3">Plataforma de cardápio digital e gestão de pedidos com personalização de combos.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">PHP 8</span>
                            <span class="badge bg-light text-primary border small">MySQL</span>
                        </div>
                    </div>

                    <!-- Card 2: Pizzaria -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🍕</span>
                            <h6 class="fw-bold mb-0 text-dark">Cardápio Digital: Pizza & Forno</h6>
                        </div>
                        <p class="text-muted small mb-3">Sistema interativo com foco em UX para pedidos de pizzaria.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">PHP 8</span>
                            <span class="badge bg-light text-primary border small">JavaScript</span>
                        </div>
                    </div>

                    <!-- Card 3: Livraria -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">📚</span>
                            <h6 class="fw-bold mb-0 text-dark">Sistema de Gestão de Livraria</h6>
                        </div>
                        <p class="text-muted small mb-3">Controle de acervo e estoque utilizando operações CRUD completas.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">PHP / SQL</span>
                            <span class="badge bg-light text-primary border small">MySQL</span>
                        </div>
                    </div>

                    <!-- Card 4: Pets -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🐾</span>
                            <h6 class="fw-bold mb-0 text-dark">Portal de Cadastros Pet</h6>
                        </div>
                        <p class="text-muted small mb-3">Registro estruturado para clínicas veterinárias e abrigos.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">Lógica CRUD</span>
                            <span class="badge bg-light text-primary border small">Bootstrap 5</span>
                        </div>
                    </div>

                    <!-- Card 5: Filmes -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🎬</span>
                            <h6 class="fw-bold mb-0 text-dark">Catálogo de Filmes e Mídias</h6>
                        </div>
                        <p class="text-muted small mb-3">Listagem dinâmica e filtragem de conteúdo audiovisual.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">JSON</span>
                            <span class="badge bg-light text-primary border small">CSS Grid</span>
                        </div>
                    </div>

                    <!-- Card 6: Barbearia -->
                    <div class="projeto-card p-3 mb-3 shadow-sm border">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">💈</span>
                            <h6 class="fw-bold mb-0 text-dark">E-commerce de Serviços: Barbearia</h6>
                        </div>
                        <p class="text-muted small mb-3">Site profissional WordPress com agendamento online e SEO local.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">WordPress</span>
                            <span class="badge bg-light text-primary border small">Elementor</span>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="fw-bold mb-3 titulo-roxo-curto">Habilidades & Tecnologias</h5>
                    <div class="habilidades-grid d-flex flex-wrap gap-2">
                        <span class="habilidade-tag">HTML5</span>
                        <span class="habilidade-tag">CSS3</span>
                        <span class="habilidade-tag">JavaScript (ES6+)</span>
                        <span class="habilidade-tag">PHP / MySQL</span>
                        <span class="habilidade-tag">Bootstrap 5</span>
                        <span class="habilidade-tag">Adobe Photoshop</span>
                        <span class="habilidade-tag">Git / GitHub</span>
                    </div>
                </div>
            </section>
        </div>

        <!-- SEÇÃO FINAL: CARROSSEL E CERTIFICADOS DETALHADOS -->
        <div class="Certificados-header mt-5">
            <h1>CERTIFICADOS</h1>
        </div>

        <!-- Carousel -->
        <div id="carouselCertificados" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_xrk13gxrk13gxrk1.png" class="img-fluid certificado-img-carousel">
                    <h5 class="mt-3">Certificado de HTML</h5>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_ha8bw0ha8bw0ha8b.png" class="img-fluid certificado-img-carousel">
                    <h5 class="mt-3">Certificado de CSS</h5>
                </div>
                <!-- ... Demais itens do carousel conforme seu código original ... -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCertificados" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCertificados" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
            </button>
        </div>

  <!-- LISTA COMPLETA DE CERTIFICADOS -->
        <div class="certificados-list">
            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">HTML5</h2>
                    <p class="texto-descricao">"Especializei-me na fundação da web moderna com HTML5 Semântico..."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_xrk13gxrk13gxrk1.png" class="img-fluid certificado-img">
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-5 text-center order-last order-md-first">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_ha8bw0ha8bw0ha8b.png" class="img-fluid certificado-img">
                </div>
                <div class="col-md-7">
                    <h2 class="titulo-roxo">CSS3</h2>
                    <p class="texto-descricao">"Aprofundei meus conhecimentos em CSS3 para criar interfaces modernas..."</p>
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">JavaScript</h2>
                    <p class="texto-descricao">"Finalizei o curso de JavaScript focado em lógica de programação e interatividade..."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_u5p4h5u5p4h5u5p4.png" class="img-fluid certificado-img">
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-5 text-center order-last order-md-first">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_exmupeexmupeexmu.png" class="img-fluid certificado-img">
                </div>
                <div class="col-md-7">
                    <h2 class="titulo-roxo">PHP</h2>
                    <p class="texto-descricao">"Certificado em PHP para desenvolvimento backend. Aprendi a construir a inteligência por trás dos sites..."</p>
                </div>
            </section>

            <section class="row align-items-center mb-5 section-item">
                <div class="col-md-7">
                    <h2 class="titulo-roxo">Adobe Photoshop</h2>
                    <p class="texto-descricao">"Especializei-me em edição e manipulação de imagens..."</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="assets/img/perfil-candidato/Gemini_Generated_Image_tchmttchmttchmtt.png" class="img-fluid certificado-img">
                </div>
            </section>
        </div>
    </main>

    <?php require_once 'assets/templates/js.php'; ?>
</body>
</html>