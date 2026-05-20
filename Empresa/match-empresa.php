<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
validaAcesso();

$idLogin = $_SESSION['id_login'];

// BUSCA O ID REAL DA EMPRESA
$sqlEmpresa = "SELECT id 
FROM tb_empresa 
WHERE id_login = :id_login";

$cmdEmpresa = $conexao->prepare($sqlEmpresa);

$cmdEmpresa->bindValue(':id_login', $idLogin);

$cmdEmpresa->execute();

$empresa = $cmdEmpresa->fetch(PDO::FETCH_ASSOC);

$idEmpresa = $empresa['id'];


// QUERY PRINCIPAL
$sql = "SELECT 
tb_perfil_candidato.id,
tb_perfil_candidato.nome,
tb_perfil_candidato.telefone,
tb_perfil_candidato.foto,
tb_login.email,
tb_vagas.vaga
FROM tb_match
INNER JOIN tb_perfil_candidato 
ON tb_perfil_candidato.id_login = tb_match.id_usuario
INNER JOIN tb_login 
ON tb_login.id = tb_perfil_candidato.id_login
INNER JOIN tb_vagas 
ON tb_vagas.id = tb_match.id_vaga
WHERE tb_vagas.id_empresa = :id_empresa
ORDER BY tb_match.data_match DESC";

$comando = $conexao->prepare($sql);

$comando->bindValue(':id_empresa', $idEmpresa);

$comando->execute();

$candidatos = $comando->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($comando->errorInfo());
// print_r($candidatos);
// exit;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mech</title>
    <?php
    require_once '../assets/templates/head.php';
    ?>
</head>

<body id="bodypgs">
    <?php include "../assets/templates/headerMGS.php"; ?>



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

                    <div class="list-group list-group-flush">
                        <?php foreach ($candidatos as $candidato): ?>

                            <div class="list-group-item border-0 shadow-sm rounded mb-3 p-3 candidato-card">

                                <div class="row align-items-center">

                                    <div class="col-auto">

                                        <?php if (!empty($candidato['foto'])): ?>

                                            <img
                                                src="../assets/img/perfil-candidato/<?= $candidato['foto'] ?>"
                                                class="rounded-circle foto-perfil-notificacao"
                                                width="85"
                                                height="85">

                                        <?php else: ?>

                                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold foto-perfil-notificacao"
                                                style="width: 85px; height: 85px;">

                                                <i class="bi bi-person-fill fs-1"></i>

                                            </div>

                                        <?php endif; ?>

                                    </div>

                                    <div class="col">

                                        <h6 class="mb-0 fw-bold text-dark">
                                            <?= $candidato['nome'] ?>
                                        </h6>

                                        <p class="text-primary small mb-1 fw-semibold">
                                            <?= $candidato['email'] ?>
                                        </p>

                                        <p class="text-muted small mb-1">
                                            Interessado em:
                                            <strong><?= $candidato['vaga'] ?></strong>
                                        </p>

                                    </div>

                                    <div class="col-auto d-flex gap-2">

                                        <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>

                                        <a
                                            href="perfil-candidato.php?id=<?= $candidato['id'] ?>"
                                            class="btn btn-primary btn-sm rounded-circle shadow-sm text-white">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>
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
    require_once '../assets/templates/js.php';
    ?>

</body>

</html>