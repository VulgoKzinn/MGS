<?php
require_once __DIR__ . '/backend/includes/funcoes.php';
require_once __DIR__ . '/backend/config/conexaoTST.php';
validaAcesso();

$totalVagas = $conexao->query("SELECT COUNT(*) FROM tb_vagas")->fetchColumn();
$totalAbertos = $conexao->query("SELECT COUNT(*) FROM tb_suporte WHERE ativo = 1")->fetchColumn();

$sqlUsuarios = "SELECT id, email, id_nivel, ativo, s_temp, data_cadastro FROM tb_login ORDER BY id DESC";
$stmtUsuarios = $conexao->query($sqlUsuarios);
$usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

function nivelBadge($nivel) {
    if ($nivel == 1) return '<span class="badge bg-info text-dark" style="font-size:10px;">EMPRESA</span>';
    if ($nivel == 2) return '<span class="badge bg-primary" style="font-size:10px;">CANDIDATO</span>';
    return '<span class="badge bg-secondary" style="font-size:10px;">ADMIN</span>';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MGS Matchwork — Usuários</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f6fb;
}

/* SIDEBAR */
.dash-sidebar{
    width:230px;
    min-width:230px;
    background:#2d1b69;
    position:fixed;
    top:0;
    left:0;
    height:100vh;
}

.sidebar-item{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px 18px;
    color:rgba(255,255,255,.82);
    text-decoration:none;
    font-size:13.5px;
    transition:.2s;
    border-radius:10px;
    margin:3px 10px;
}

.sidebar-item:hover{
    background:rgba(124,58,237,0.18);
    color:#fff;
}

.sidebar-item.active{
    background:linear-gradient(135deg,#7c3aed,#9333ea);
    color:#fff;
    font-weight:700;
}

.sidebar-badge{
    margin-left:auto;
    background:#16a34a;
    color:#fff;
    font-size:11px;
    padding:1px 8px;
    border-radius:10px;
}

/* MAIN */
.dash-main{
    margin-left:230px;
    background:#f4f6fb;
    min-height:100vh;
}

.dash-topbar{
    background:#fff;
    padding:15px 24px;
    border-bottom:1px solid #e5e7eb;
    font-weight:700;
    color:#2d1b69;
}

.dash-content{
    padding:25px;
}

.dash-card{
    background:#fff;
    border-radius:12px;
    border:1px solid #e5e7eb;
    padding:18px;
}

/* PILL STATUS */
.pill{
    display:inline-block;
    padding:3px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.pill-active{
    background:#d1fae5;
    color:#065f46;
}

.pill-blocked{
    background:#fee2e2;
    color:#991b1b;
}

.pill-temp{
    background:#fef3c7;
    color:#92400e;
}
</style>
</head>

<body>

<div class="dash-sidebar">
    <div style="padding-top:20px;">

        <a href="dashboard.php" class="sidebar-item">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>

        <a href="lista_vagas.php" class="sidebar-item">
            <i class="fa-solid fa-briefcase"></i> Vagas
            <span class="sidebar-badge"><?= $totalVagas ?></span>
        </a>

        <a href="lista-usuarios.php" class="sidebar-item active">
            <i class="fa-solid fa-users"></i> Usuários
        </a>

        <a href="lista-empresas.php" class="sidebar-item">
            <i class="fa-solid fa-building"></i> Empresas
        </a>

        <a href="global/lista_suporte.php" class="sidebar-item">
            <i class="fa-solid fa-comment-dots"></i> Chamados
            <span class="sidebar-badge"><?= $totalAbertos ?></span>
        </a>

    </div>
</div>

<div class="dash-main">

    <div class="dash-topbar">
        Gestão de Acessos
    </div>

    <div class="dash-content">

        <div class="dash-card">

            <table class="table table-hover mb-0">
                <thead>
                    <tr style="font-size:11px;text-transform:uppercase;color:#9E86C8;">
                        <th>ID</th>
                        <th>E-mail</th>
                        <th>Nível</th>
                        <th>Cadastro</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($usuarios as $u): ?>
                    <tr style="font-size:13px;">
                        <td>#<?= $u['id'] ?></td>

                        <td style="font-weight:600;color:#2d1b69;">
                            <?= htmlspecialchars($u['email']) ?>
                        </td>

                        <td><?= nivelBadge($u['id_nivel']) ?></td>

                        <td style="color:#9E86C8;">
                            <?= date('d/m/Y', strtotime($u['data_cadastro'])) ?>
                        </td>

                        <td>
                            <?php if($u['ativo'] == 1): ?>
                                <span class="pill pill-active">Ativo</span>
                            <?php else: ?>
                                <span class="pill pill-blocked">Bloqueado</span>
                            <?php endif; ?>

                            <?php if($u['s_temp'] == 1): ?>
                                <span class="pill pill-temp">Senha Temp.</span>
                            <?php endif; ?>
                        </td>

                        <td class="text-end">
                            <a href="editar-usuario.php?id=<?= $u['id'] ?>" style="color:#7c3aed;">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>