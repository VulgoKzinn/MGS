<?php
require_once "backend/includes/funcoes.php";

// 1. Validações de Acesso
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];
validaEmpresa($id_nivel);

global $conexao;

/* =========================================================
   2. BUSCA DINÂMICA DOS DADOS DO BANCO
========================================================= */
$id_usuario = $_SESSION['id'];

$sql = "SELECT * FROM tb_users WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $id_usuario, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Erro: Perfil não encontrado.");
}

// Variáveis dinâmicas com fallback (caso o banco esteja vazio, usa seus dados padrão)
$nome       = !empty($user['nome']) ? $user['nome'] : 'Pedro';
$cargo      = !empty($user['cargo']) ? $user['cargo'] : 'Técnico em T.I';
$fotoPerfil = !empty($user['foto_perfil']) ? $user['foto_perfil'] : 'assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png';
$fotoBanner = !empty($user['foto_banner']) ? $user['foto_banner'] : ''; 
$email      = !empty($user['email']) ? $user['email'] : 'pedro.azevedo@hotmail.com';
$telefone   = !empty($user['telefone']) ? $user['telefone'] : '(19) 99999-9999';
$endereco   = !empty($user['endereco']) ? $user['endereco'] : 'CEP: 13870-000 • São João da Boa Vista - SP';
$biografia  = !empty($user['biografia']) ? $user['biografia'] : 'Profissional de Tecnologia da Informação com conhecimento em desenvolvimento web, suporte técnico e design gráfico.';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - <?= htmlspecialchars($nome) ?></title>
    <!-- Include Links -->
    <?php require_once 'assets/templates/head.php'; ?>

    <style>
        /* Se houver foto de banner salva no banco, ela vira o fundo aqui */
        <?php if (!empty($fotoBanner)): ?>
        .banner {
            background-image: url('<?= $fotoBanner ?>') !important;
            background-size: cover;
            background-position: center;
        }
        <?php endif; ?>
    </style>
</head>

<body id="bodypgs">
    <?php include "assets/templates/headerMGS.php"; ?>

    <main class="container mt-4">

        <!-- CARD PRINCIPAL -->
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="banner position-relative">
                <a href="editar-perfil-candidato.php" class="btn-config" title="Configurações">
                    <i class="bi bi-gear-fill"></i>
                </a>

                <div class="container-foto">
                    <img class="foto-perfil" src="<?= $fotoPerfil ?>" alt="Foto de perfil">
                </div>
            </div>

            <div class="card-body p-4 pt-5">
                <h1 class="h3 mb-0"><?= htmlspecialchars($nome) ?></h1>
                <p class="text-muted"><?= htmlspecialchars($cargo) ?></p>
            </div>
        </div>

        <div class="row mt-4">
            <!-- ASIDE ESQUERDA -->
            <aside class="col-md-4 mb-4">
                <div class="card p-3 shadow-sm border-0">

                    <div class="mt-4 info-contato-expandida">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-at-fill fs-4 me-3"></i>
                            <span><?= htmlspecialchars($email) ?></span>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-whatsapp fs-4 me-3"></i>
                            <span><?= htmlspecialchars($telefone) ?></span>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                            <span><?= htmlspecialchars($endereco) ?></span>
                        </div>
                    </div>

                    <h5 class="fw-bold">Biografia</h5>
                    <p class="text-secondary">
                        <?= nl2br(htmlspecialchars($biografia)) ?>
                    </p>

                    <h5 class="fw-bold mt-4 mb-3 titulo-roxo-contato">Certificados</h5>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <span class="badge badge-custom fs-6">JavaScript</span>
                        <span class="badge badge-custom fs-6">PHP</span>
                        <span class="badge badge-custom fs-6">CSS</span>
                        <span class="badge badge-custom fs-6">HTML</span>
                        <span class="badge badge-custom fs-6">Photoshop</span>
                    </div>
                </div>
            </aside>

            <!-- CONTEÚDO DIREITA -->
            <section class="col-md-8">
                <div class="card p-4 shadow-sm border-0 h-100">
                    <h5 class="fw-bold mb-3 titulo-roxo-curto">Experiência</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-code-slash"></i></span>
                            <div>
                                <strong>Desenvolvimento Web:</strong>
                                Criação de interfaces responsivas e sistemas dinâmicos.
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-pc-display"></i></span>
                            <div>
                                <strong>Suporte & Manutenção:</strong>
                                Diagnóstico de hardware e configuração de redes/sistemas.
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <span class="icone-roxo me-3"><i class="bi bi-palette"></i></span>
                            <div>
                                <strong>Design Gráfico:</strong>
                                Edição profissional e criação de identidades visuais.
                            </div>
                        </li>
                    </ul>

                    <hr class="my-4">

                    <h5 class="fw-bold mb-3 titulo-roxo-curto">Meus Projetos</h5>

                    <div class="projeto-card p-3 mb-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🍔</span>
                            <h6 class="fw-bold mb-0 text-dark">Sistema Hamburgueria Online</h6>
                        </div>
                        <p class="text-muted small mb-3">
                            Desenvolvimento de uma plataforma completa de cardápio digital e gestão de pedidos...
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">PHP 8</span>
                            <span class="badge bg-light text-primary border small">MySQL</span>
                            <span class="badge bg-light text-primary border small">Bootstrap 5</span>
                        </div>
                    </div>

                    <div class="projeto-card p-3 mb-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🍕</span>
                            <h6 class="fw-bold mb-0 text-dark">Cardápio Digital: Pizza & Forno</h6>
                        </div>
                        <p class="text-muted small mb-3">
                            Desenvolvimento de plataforma de cardápio interativo com foco em conversão...
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">PHP 8</span>
                            <span class="badge bg-light text-primary border small">UI/UX Design</span>
                            <span class="badge bg-light text-primary border small">JavaScript</span>
                        </div>
                    </div>

                    <div class="projeto-card p-3 mb-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">📚</span>
                            <h6 class="fw-bold mb-0 text-dark">Sistema de Gestão de Livraria</h6>
                        </div>
                        <p class="text-muted small mb-3">Sistema focado em operações CRUD para controle de acervo literário...</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">MySQL</span>
                            <span class="badge bg-light text-primary border small">PHP / SQL</span>
                        </div>
                    </div>

                    <div class="projeto-card p-3 mb-3 shadow-sm">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 me-2">🐾</span>
                            <h6 class="fw-bold mb-0 text-dark">Portal de Cadastros Pet</h6>
                        </div>
                        <p class="text-muted small mb-3">Aplicação para registro e organização de dados de animais de estimação...</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-primary border small">Lógica CRUD</span>
                            <span class="badge bg-light text-primary border small">PHP</span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mt-3 mb-3 titulo-roxo-curto">Habilidades & Tecnologias</h5>
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

        <!-- CARROSSEL DE CERTIFICADOS -->
        <div class="Certificados-header">
            <h1>CERTIFICADOS</h1>
        </div>
        <br><br>
        <div id="carouselCertificados" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#carouselCertificados" data-bs-slide-to="4"></button>
            </div>

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

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCertificados" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCertificados" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
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