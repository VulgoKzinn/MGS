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
    


<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <h5 class="fw-bold mb-0 text-dark">
            <i class="bi bi-person-heart me-2 text-danger"></i>Novos Interessados
        </h5>
        <p class="text-muted small">Candidatos que aplicaram para suas vagas recentemente.</p>
    </div>
    
    <div class="card-body p-0">
        <div class="list-group list-group-flush">
            
            <div class="list-group-item list-group-item-action border-0 p-4 mb-2 shadow-sm mx-3 my-2 rounded border-start border-4 border-primary" style="background-color: #fdfdfd;">
                <div class="d-flex align-items-center">
                    <div class="position-relative">
                        <img src="assets/img/perfil-candidato/Gemini_Generated_Image_19lini19lini19li.png" class="rounded-circle me-3" width="65" height="65" style="object-fit: cover; border: 2px solid #6f42c1;">
                        <span class="position-absolute bottom-0 end-0 bg-primary border border-white rounded-circle p-1" title="Novo Candidato"></span>
                    </div>

                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-0 fw-bold">Pedro Azevedo</h6>
                                <small class="text-muted"><i class="bi bi-geo-alt me-1"></i>São João da Boa Vista, SP</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">Interesse Agora</span>
                        </div>
                        
                        <div class="mt-2">
                            <p class="mb-1 small text-dark">
                                Aplicou para a vaga: <strong>Analista de Marketing Digital</strong>
                            </p>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-light text-primary border small" style="font-size: 0.7rem;">PHP</span>
                                <span class="badge bg-light text-primary border small" style="font-size: 0.7rem;">JavaScript</span>
                                <span class="badge bg-light text-primary border small" style="font-size: 0.7rem;">UI/UX</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2 justify-content-end">
                    <button class="btn btn-light btn-sm rounded-pill px-3 border">Dispensar</button>
                    <a href="perfil-candidato.php?id=pedro" class="btn btn-primary btn-sm rounded-pill px-4">
                        <i class="bi bi-eye-fill me-1"></i> Analisar Perfil
                    </a>
                    <a href="https://wa.me/5519999999999" target="_blank" class="btn btn-success btn-sm rounded-pill px-3">
                        <i class="bi bi-whatsapp"></i> Contato
                    </a>
                </div>
            </div>

            <div class="list-group-item list-group-item-action border-0 p-4 opacity-75">
                <div class="d-flex align-items-center">
                    <div class="bg-light rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 65px; height: 65px;">
                        <i class="bi bi-person fs-2 text-secondary"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-bold">Ana Souza</h6>
                        <p class="text-muted small mb-0">Interessada na vaga de Designer Gráfico há 2 dias.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>