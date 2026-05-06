<?php
require_once "backend/includes/funcoes.php";
validaAcesso();
global $conexao;
$id_usuario = $_SESSION['id'];

$sql = "SELECT * FROM tb_users WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) { die("Perfil não encontrado."); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = atualizaPerfil($id_usuario, $_POST, $_FILES);
    if ($resultado === true) {
        header("Location: perfil-candidato.php");
        exit;
    } else {
        echo "<script>alert('$resultado');</script>";
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil | Matchwork</title>
    <?php require_once 'assets/templates/head.php'; ?>

    <style>
        /* Mantém o fundo roxo padrão do seu sistema */
        body#login {
            background-color: #6f42c1 !important; /* Ajuste para o roxo exato se necessário */
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            height: auto !important;
            min-height: 100vh !important;
            padding-bottom: 50px !important;
        }

        /* Container LARGO e BRANCO */
        #EditarPerfilLargo {
            width: 100% !important;
            max-width: 900px !important; /* Aqui define a largura maior */
            background: white !important;
            border-radius: 15px !important;
            padding: 40px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2) !important;
            margin-top: 20px !important;
        }

        .preview-img {
            border: 3px solid #6f42c1;
            object-fit: cover;
            border-radius: 10px;
        }


    </style>
</head>

<body id="login"> <!-- Usa o ID login para puxar o fundo roxo e as linhas -->

    <div id="ImgLogon" class="text-center mt-4 mb-2">
        <a href="index.php">
            <img src="assets/img/logomaior.png" alt="Logo" style="max-width: 200px;">
        </a>
    </div>

    <main id="EditarPerfilLargo">
        <form method="post" enctype="multipart/form-data">
            
            <!-- Botão Voltar Pequeno no Topo -->
            <div class="text-end mb-2">
                <a href="perfil-candidato.php" class="btn-voltar-projeto">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </div>

            <h2 class="text-center mb-5" style="color: #6f42c1; font-weight: bold;">Editar Perfil</h2>

            <div class="row">
                <!-- Coluna da Esquerda (Imagens) -->
                <div class="col-md-5 border-end pe-md-4 text-center">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Foto de Capa</label>
                        <img id="previewCapa" src="<?= $user['foto_banner'] ?? 'assets/img/perfil-candidato/padrao-capa.png' ?>" 
                             class="img-fluid mb-2 preview-img" style="height: 140px; width: 100%;">
                        <input type="file" name="capaInput" id="capaInput" class="form-control form-control-sm">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Foto de Perfil</label><br>
                        <img id="previewPerfil" src="<?= $user['foto_perfil'] ?? 'assets/img/perfil-candidato/padrao.png' ?>" 
                             class="rounded-circle mb-2 preview-img" style="width: 150px; height: 150px;">
                        <input type="file" name="perfilInput" id="perfilInput" class="form-control form-control-sm">
                    </div>
                </div>

                <!-- Coluna da Direita (Campos de Texto) -->
                <div class="col-md-7 ps-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Nome Completo</label>
                        <input type="text" name="nome" class="form-control shadow-sm" value="<?= $user['nome'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Cargo / Especialidade</label>
                        <input type="text" name="cargo" class="form-control shadow-sm" value="<?= $user['cargo'] ?? 'Técnico em T.I' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">E-mail Profissional</label>
                        <input type="email" name="email" class="form-control shadow-sm" value="<?= $user['email'] ?? '' ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">WhatsApp</label>
                            <input type="text" name="telefone" class="form-control shadow-sm" value="<?= $user['telefone'] ?? '' ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">CEP</label>
                            <input type="text" name="endereco" class="form-control shadow-sm" value="<?= $user['endereco'] ?? '' ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Biografia</label>
                        <textarea name="biografia" class="form-control shadow-sm" style="height: 120px;"><?= $user['biografia'] ?? '' ?></textarea>
                    </div>

                    <button class="btn btn-success btn-lg w-100 shadow">
                        <i class="fa-solid fa-check me-2"></i> Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </main>

    <script>
        document.getElementById('capaInput').onchange = e => {
            const r = new FileReader();
            r.onload = () => document.getElementById('previewCapa').src = r.result;
            r.readAsDataURL(e.target.files[0]);
        };
        document.getElementById('perfilInput').onchange = e => {
            const r = new FileReader();
            r.onload = () => document.getElementById('previewPerfil').src = r.result;
            r.readAsDataURL(e.target.files[0]);
        };
    </script>
    <?php require_once 'assets/templates/js.php'; ?>
</body>
</html>