<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
$id_nivel = $_SESSION['id_nivel'];
validaEmpresa($id_nivel);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mech2</title>
      <?php
    require_once 'assets/templates/head.php';
    ?>
</head>
<body id="bodypgs">
    <?php include "assets/templates/headerMGS.php"; ?>

  <section class="container mt-4 mb-5">
    <div class="card shadow-sm border-0 central-oportunidades">
        
        <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold mb-0" style="color: #6f42c1;">
                    <i class="bi bi-lightning-charge-fill me-2"></i>Oportunidades para Você
                </h4>
                <p class="text-muted small">Empresas interessadas no seu perfil de Técnico em T.I</p>
            </div>
            <span class="badge rounded-pill bg-danger px-3 py-2">5 Novas</span>
        </div>

        <div class="card-body p-3">
            <div class="list-group list-group-flush">

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 empresa-card border-start border-4 border-primary">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="assets/img/empresa/perfil-empresa/amazon-perfil.jpeg" 
                                 class="rounded-circle logo-empresa-notificacao" width="85" height="85">
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Amazon Brasil <span class="badge bg-soft-purple ms-2" style="font-size: 10px;">MATCH 🔥</span></h6>
                            <p class="text-primary small mb-1 fw-semibold">Analista de Marketing Digital</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Vimos seu interesse na vaga."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" title="Recusar"><i class="bi bi-trash3"></i></button>
                            <a href="perfil-empresa.php" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white" title="Ver Vaga"><i class="bi bi-eye"></i></a>
                            <a href="https://wa.me/5519999999999" class="btn btn-success btn-sm rounded-circle shadow-sm text-white" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 empresa-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center logo-empresa-notificacao shadow-sm" style="width: 85px; height: 85px; background-color: #820ad1 !important; border:none;">
                                <i class="bi bi-bank fs-1 text-white"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Nubank</h6>
                            <p class="text-primary small mb-1 fw-semibold">Desenvolvedor Backend PHP</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>Remoto • "Interesse em seus conhecimentos de MySQL."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 empresa-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center logo-empresa-notificacao" style="width: 85px; height: 85px; background: linear-gradient(45deg, #6f42c1, #007bff) !important; border: none;">
                                <i class="bi bi-code-square fs-1 text-white"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Tech Solutions Web</h6>
                            <p class="text-primary small mb-1 fw-semibold">Dev Front-end Júnior</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Seus projetos web chamaram atenção."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 empresa-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="rounded-circle d-flex align-items-center justify-content-center logo-empresa-notificacao" style="width: 85px; height: 85px; background-color: #39b54a !important; border:none;">
                                <i class="bi bi-car-front-fill fs-1 text-white"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Localiza</h6>
                            <p class="text-primary small mb-1 fw-semibold">Suporte de Redes Júnior</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>São João da Boa Vista • "Perfil ideal para nossa equipe técnica."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 empresa-card">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-dark rounded-circle d-flex align-items-center justify-content-center logo-empresa-notificacao" style="width: 85px; height: 85px;">
                                <i class="bi bi-cpu-fill fs-1 text-info"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h6 class="mb-0 fw-bold text-dark">Instituto BrainTech</h6>
                            <p class="text-primary small mb-1 fw-semibold">Monitor de Suporte Técnico</p>
                            <p class="mb-0 small text-secondary text-truncate-custom">
                                <i class="bi bi-geo-alt-fill me-1"></i>E. S. do Pinhal • "Vaga para hardware e manutenção."
                            </p>
                        </div>
                        <div class="col-auto d-flex gap-2">
                            <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm"><i class="bi bi-trash3"></i></button>
                            <a href="#" class="btn btn-primary btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-success btn-sm rounded-circle shadow-sm text-white"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
        
        <div class="card-footer bg-white border-0 text-center pb-4">
            <button class="btn btn-link text-decoration-none text-muted fw-bold">Ver todos os convites</button>
        </div>
    </div>
</section>


    <!-- Include JS -->
    <?php
    require_once 'assets/templates/js.php';
    ?>

</body>
</html>