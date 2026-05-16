<?php
require_once('backend/includes/funcoes.php');
require_once('backend/config/conexao.php');
validaAcesso();

// ===== CONSULTAS PARA OS BADGES DA SIDEBAR =====
$totalVagas = $conexao->query("SELECT COUNT(*) FROM tb_vagas")->fetchColumn();
$totalAbertos = $conexao->query("SELECT COUNT(*) FROM tb_suporte WHERE ativo = 1")->fetchColumn();

// ===== BUSCA DE TODOS OS USUÁRIOS (tb_login) =====
// Removi campos que podem causar erro caso não existam, mantendo o padrão do seu dashboard
$sqlUsuarios = "SELECT id, email, id_nivel, ativo, s_temp, data_cadastro FROM tb_login ORDER BY id DESC";
$stmtUsuarios = $conexao->query($sqlUsuarios);
$usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

// Funções auxiliares para o visual
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* CSS Reutilizado do seu dashboard.php */
        .dash-wrapper { display: flex; min-height: 100vh; }
        .dash-sidebar { width: 230px; min-width: 230px; background-color: #6750A4; position: fixed; top: 0; left: 0; height: 100vh; z-index: 100; }
        .dash-main { margin-left: 230px; flex: 1; background-color: #f8f9fa; }
        .dash-topbar { background: #fff; padding: 0 24px; height: 58px; display: flex; align-items: center; border-bottom: 1px solid #EDE7F6; position: sticky; top: 0; z-index: 99; }
        .dash-content { padding: 28px 24px; }
        .sidebar-item { display: flex; align-items: center; gap: 10px; padding: 9px 18px; color: rgba(255,255,255,.82); text-decoration: none; font-size: 13.5px; border-left: 3px solid transparent; }
        .sidebar-item.active { background: rgba(255,255,255,.15); color: #fff; font-weight: 700; border-left-color: #038C33; }
        .sidebar-badge { margin-left: auto; background: #038C33; color: #fff; font-size: 11px; padding: 1px 8px; border-radius: 10px; }
        .dash-card { background: #fff; border-radius: 12px; border: 1px solid #EDE7F6; padding: 18px; }
        .pill { display: inline-block; padding: 2px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .pill-active { background: #E8F5E9; color: #038C33; }
        .pill-blocked { background: #FDECEA; color: #C62828; }
        .pill-temp { background: #FFF3E0; color: #EF6C00; }
    </style>
</head>
<body>

<div class="dash-wrapper">
    <aside class="dash-sidebar">
        <div class="sidebar-nav" style="padding-top: 20px;">
            <a href="dashboard.php" class="sidebar-item"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="lista-vagas.php" class="sidebar-item"><i class="fa-solid fa-briefcase"></i> Vagas <span class="sidebar-badge"><?php echo $totalVagas; ?></span></a>
            <a href="lista-usuarios.php" class="sidebar-item active"><i class="fa-solid fa-users"></i> Usuários</a>
            <a href="lista-empresas.php" class="sidebar-item"><i class="fa-solid fa-building"></i> Empresas</a>
            <a href="lista_suporte.php" class="sidebar-item"><i class="fa-solid fa-comment-dots"></i> Chamados <span class="sidebar-badge"><?php echo $totalAbertos; ?></span></a>
        </div>
    </aside>

    <div class="dash-main">
        <div class="dash-topbar">
            <div style="font-size:16px;font-weight:700;color:#2D1B69;flex:1;">Gestão de Acessos</div>
        </div>

        <div class="dash-content">
            <div class="dash-card">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr style="font-size: 11px; text-transform: uppercase; color: #9E86C8;">
                            <th>ID</th>
                            <th>E-mail</th>
                            <th>Nível</th>
                            <th>Cadastro</th>
                            <th>Status</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): 
                            $stClass = ($u['ativo'] == 1) ? 'pill-active' : 'pill-blocked';
                            $stTxt   = ($u['ativo'] == 1) ? 'Ativo' : 'Bloqueado';
                        ?>
                        <tr style="font-size:13px; vertical-align:middle;">
                            <td>#<?php echo $u['id']; ?></td>
                            <td style="font-weight:600; color:#2D1B69;"><?php echo htmlspecialchars($u['email']); ?></td>
                            <td><?php echo nivelBadge($u['id_nivel']); ?></td>
                            <td style="color:#9E86C8;"><?php echo date('d/m/Y', strtotime($u['data_cadastro'])); ?></td>
                            <td>
                                <span class="pill <?php echo $stClass; ?>"><?php echo $stTxt; ?></span>
                                <?php if($u['s_temp'] == 1): ?>
                                    <span class="pill pill-temp">Senha Temp.</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a href="editar-usuario.php?id=<?php echo $u['id']; ?>" class="btn btn-sm" style="color:#6750A4;"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>