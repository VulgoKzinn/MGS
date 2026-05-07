<?php
require_once "backend/includes/funcoes.php";
session_start();
validaAcesso();
validaUsuario();

// Busca os dados do banco usando a função de listar
$candidatos = listarPerfilCandidato();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Matchwork</title>
    <?php require_once 'assets/templates/head.php'; ?>
</head>
<body>
    <?php include "assets/templates/headerMGS.php"; ?>

    <main class="container mt-4">
        <?php foreach ($candidatos as $cand) { ?>
            
            <div class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="banner position-relative">
                    <img src="assets/img/perfil-candidato/uploads/<?php echo $cand['id_foto_banner']; ?>" style="width:100%; height:250px; object-fit:cover;">
                    
                    <a href="cadastrar-perfil-candidato.php?id=<?php echo $cand['id']; ?>" class="btn-config" title="Configurações">
                        <i class="bi bi-gear-fill"></i>
                    </a>
                    
                    <div class="container-foto">
                        <img class="foto-perfil" src="assets/img/perfil-candidato/uploads/<?php echo $cand['id_foto_perfil']; ?>" alt="Foto de perfil">
                    </div>
                </div>
                
                <div class="card-body p-4 pt-5 mt-3">
                    <h1 class="h3 mb-0 fw-bold"><?php echo $cand['nome']; ?></h1>
                    <p class="text-muted"><?php echo $cand['cargo']; ?></p>
                </div>
            </div>

            <div class="row">
                <aside class="col-md-4 mb-4">
                    <div class="card p-4 shadow-sm border-0">
                        <h5 class="fw-bold titulo-roxo-curto mb-3">Sobre</h5>
                        <p class="text-secondary small">
                            <?php echo $cand['sobre']; ?>
                        </p>

                        <div class="info-contato-expandida">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope-at-fill fs-4 me-3"></i>
                                <span class="small"><?php echo $cand['email']; ?></span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-whatsapp fs-4 me-3"></i>
                                <span class="small"><?php echo $cand['telefone']; ?></span>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <i class="bi bi-geo-alt-fill fs-4 me-3"></i>
                                <span class="small"><?php echo $cand['endereco']; ?></span>
                            </div>
                        </div>

                        <h5 class="fw-bold mt-4 mb-3 titulo-roxo-curto">Certificados</h5>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="badge badge-custom"><?php echo $cand['certificado']; ?></span>
                        </div>
                    </div>
                </aside>

                <section class="col-md-8">
                    <div class="card p-4 shadow-sm border-0 h-100">
                        <h5 class="fw-bold mb-3 titulo-roxo-curto">Experiência</h5>
                        <div class="mb-4">
                            <?php echo $cand['experiencia']; ?>
                        </div>

                        <hr class="my-4">
                        
                        <h5 class="fw-bold mb-3 titulo-roxo-curto">Meus Projetos</h5>
                        <div class="mb-3">
                            <?php echo $cand['projeto']; ?>
                        </div>
                    </div>
                </section>
            </div>

        <?php } ?>
    </main>

    <?php require_once 'assets/templates/js.php'; ?>
</body>
</html>