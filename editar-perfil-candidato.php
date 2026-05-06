<?php
require_once "backend/includes/funcoes.php";

validaAcesso();

global $conexao;

/* =========================
   ID DO USUÁRIO (SESSÃO)
========================= */
$id_usuario = $_SESSION['id'];

/* =========================
   BUSCAR PERFIL (CORRETO PRO TEU BANCO)
========================= */
$sql = "SELECT * FROM tb_users WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $id_usuario, PDO::PARAM_INT);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Perfil não encontrado na tb_users para o ID: " . $id_usuario);
}

/* =========================
   SALVAR
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $resultado = atualizaPerfil(
        $id_usuario,
        $_POST,
        $_FILES
    );

    if ($resultado === true) {
        header("Location: perfil-candidato.php");
        exit;
    } else {
        echo $resultado;
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
</head>

<body id="login">

<div id="ImgLogon" class="text-center mb-3">
    <a href="index.php">
        <img src="assets/img/logomaior.png" alt="Logo">
    </a>
</div>

<main id="Logon">

<form method="post" enctype="multipart/form-data">

    <div class="d-flex justify-content-start mb-3">
        <a href="perfil-candidato.php" class="btn btn-outline-light">
            <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>

    <h2 class="text-center mb-4">Editar Perfil</h2>

    <!-- CAPA -->
    <div class="mb-3 text-center">
        <label>Foto de Capa</label><br>

        <img id="previewCapa"
             src="<?= $user['foto_banner'] ?? 'assets/img/perfil-candidato/padrao-capa.png' ?>"
             class="img-fluid rounded mb-2"
             style="max-height:150px;">

        <input type="file" name="capaInput" id="capaInput" class="form-control">
    </div>

    <!-- PERFIL -->
    <div class="mb-3 text-center">
        <label>Foto de Perfil</label><br>

        <img id="previewPerfil"
             src="<?= $user['foto_perfil'] ?? 'assets/img/perfil-candidato/padrao.png' ?>"
             class="rounded-circle mb-2"
             style="width:120px;height:120px;object-fit:cover;">

        <input type="file" name="perfilInput" id="perfilInput" class="form-control">
    </div>

    <!-- NOME -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-user"></i></span>
        <div class="form-floating w-100">
            <input type="text" name="nome" class="form-control"
                   value="<?= $user['nome'] ?? '' ?>">
            <label>Nome</label>
        </div>
    </div>

    <!-- CARGO (NOVO) -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-briefcase"></i></span>
        <div class="form-floating w-100">
            <input type="text" name="cargo" class="form-control"
                   value="<?= $user['cargo'] ?? 'Técnico em T.I' ?>">
            <label>Cargo</label>
        </div>
    </div>

    <!-- EMAIL -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
        <div class="form-floating w-100">
            <input type="email" name="email" class="form-control"
                   value="<?= $user['email'] ?? '' ?>">
            <label>Email</label>
        </div>
    </div>

    <!-- TELEFONE -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
        <div class="form-floating w-100">
            <input type="text" name="telefone" class="form-control"
                   value="<?= $user['telefone'] ?? '' ?>">
            <label>Telefone</label>
        </div>
    </div>

    <!-- ENDEREÇO -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-location-dot"></i></span>
        <div class="form-floating w-100">
            <input type="text" name="endereco" class="form-control"
                   value="<?= $user['endereco'] ?? '' ?>">
            <label>Endereço</label>
        </div>
    </div>

    <!-- BIOGRAFIA -->
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-light fa-file-lines"></i></span>
        <div class="form-floating w-100">
            <textarea name="biografia" class="form-control" style="height:120px"><?= $user['biografia'] ?? '' ?></textarea>
            <label>Biografia</label>
        </div>
    </div>

    <button class="btn btn-success w-100">Salvar</button>

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