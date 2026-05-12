<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];
validaUsuario($id_nivel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mech</title>
      <?php
    require_once 'assets/templates/head.php';
    ?>
</head>
<body id="bodypgs">
    <?php include "assets/templates/headerMGS.php"; ?>
    


<section class="container mt-4">
    <div class="card shadow-sm border-0 central-notificacoes">
        
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold mb-0" style="color: #6f42c1;">
                    <i class="bi bi-people-fill me-2"></i>Novos Candidatos Interessados
                </h4>
                <p class="text-muted small">5 talentos aplicaram para suas vagas hoje.</p>
            </div>
            <span class="badge rounded-pill bg-danger px-3 py-2">5 Novos</span>
        </div>

        <div class="card-body p-3">
            <div class="list-group list-group-flush">

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png" 
                                 class="rounded-circle foto-perfil-notificacao" width="85" height="85">
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Pedro Azevedo</h6>
                            <p class="text-primary small mb-1 fw-semibold">Técnico em T.I</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Especialista em PHP e suporte."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" title="Dispensar Candidato"><i class="bi bi-trash3-fill"></i></button>
                            <a href="perfil-candidato.php" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white" title="Analisar Perfil"><i class="bi bi-eye-fill"></i></a>
                            <a href="https://wa.me/5519999999999" target="_blank" class="btn btn-success btn-sm rounded-circle shadow-sm text-white" title="Contato WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center text-white fw-bold foto-perfil-notificacao" style="width: 85px; height: 85px; font-size: 1.5rem;">AC</div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Ana Clara Silva</h6>
                            <p class="text-primary small mb-1 fw-semibold">Designer UI/UX</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>Águas da Prata • "Foco em interfaces modernas."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" title="Dispensar"><i class="bi bi-trash3-fill"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white" title="Analisar"><i class="bi bi-eye-fill"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center text-white foto-perfil-notificacao" style="width: 85px; height: 85px;">
                                <i class="bi bi-person-fill fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Marcos Oliveira</h6>
                            <p class="text-primary small mb-1 fw-semibold">Social Media</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Gestão de tráfego e conteúdo."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3-fill"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye-fill"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center text-white foto-perfil-notificacao" style="width: 85px; height: 85px;">
                                <i class="bi bi-code-slash fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Juliana Souza</h6>
                            <p class="text-primary small mb-1 fw-semibold">Dev Fullstack</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>E. S. do Pinhal • "Node.js e React."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3-fill"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye-fill"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-dark rounded-circle d-flex align-items-center justify-content-center text-white foto-perfil-notificacao" style="width: 85px; height: 85px;">
                                <i class="bi bi-hdd-network-fill fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Ricardo Gomes</h6>
                            <p class="text-primary small mb-1 fw-semibold">Suporte de Redes</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Servidores e Infra."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3-fill"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye-fill"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer bg-white border-0 text-center pb-4">
            <button class="btn btn-link text-decoration-none text-muted fw-bold">Ver todos os candidatos</button>
        </div>
    </div>
</section>


    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>

</body>
</html>