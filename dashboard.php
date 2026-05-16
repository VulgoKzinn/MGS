<?php
require_once('backend/includes/funcoes.php');
require_once('backend/config/conexao.php');
validaAcesso();

// ===== TOTAL USUÁRIOS (tb_login) =====
$totalUsuarios = $conexao->query("SELECT COUNT(*) FROM tb_login")->fetchColumn();

// ===== TOTAL VAGAS (tb_vagas) =====
$totalVagas = $conexao->query("SELECT COUNT(*) FROM tb_vagas")->fetchColumn();

// ===== TOTAL EMPRESAS ATIVAS (tb_empresa) =====
$totalEmpresas = $conexao->query("SELECT COUNT(*) FROM tb_empresa")->fetchColumn();

// ===== TOTAL CHAMADOS (tb_suporte) =====
$totalChamados = $conexao->query("SELECT COUNT(*) FROM tb_suporte")->fetchColumn();
$totalAbertos  = $conexao->query("SELECT COUNT(*) FROM tb_suporte WHERE ativo = 1")->fetchColumn();

// ===== ÚLTIMOS 5 USUÁRIOS (tb_login) =====
$stmtUsuarios = $conexao->query("
    SELECT id, email, id_nivel, ativo, s_temp, data_cadastro
    FROM tb_login
    ORDER BY id DESC
    LIMIT 5
");
$ultimosUsuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

// ===== ÚLTIMOS 4 CHAMADOS (tb_suporte) =====
$stmtChamados = $conexao->query("
    SELECT id, nome, email, descricao, ativo
    FROM tb_suporte
    ORDER BY id DESC
    LIMIT 4
");
$chamados = $stmtChamados->fetchAll(PDO::FETCH_ASSOC);

// ===== ÚLTIMAS 5 VAGAS COM EMPRESA (tb_vagas + tb_empresa) =====
$stmtVagas = $conexao->query("
    SELECT
        tb_vagas.id,
        tb_vagas.vaga,
        tb_vagas.area_atuacao,
        tb_vagas.modalidade,
        tb_vagas.modelo_de_trabalho,
        tb_vagas.salario,
        tb_vagas.ativo,
        tb_empresa.nome_fantasia
    FROM tb_vagas
    INNER JOIN tb_empresa ON tb_vagas.id_empresa = tb_empresa.id
    ORDER BY tb_vagas.id DESC
    LIMIT 5
");
$vagasRecentes = $stmtVagas->fetchAll(PDO::FETCH_ASSOC);

// ===== CADASTROS POR MÊS (últimos 6 meses) — para o gráfico =====
$stmtMeses = $conexao->query("
    SELECT
        DATE_FORMAT(data_cadastro, '%b') AS mes,
        COUNT(*) AS total
    FROM tb_login
    WHERE data_cadastro >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
    GROUP BY DATE_FORMAT(data_cadastro, '%Y-%m')
    ORDER BY DATE_FORMAT(data_cadastro, '%Y-%m') ASC
");
$dadosMeses = $stmtMeses->fetchAll(PDO::FETCH_ASSOC);

// ===== DISTRIBUIÇÃO POR NÍVEL (para o donut) =====
$totalCandidatos = $conexao->query("SELECT COUNT(*) FROM tb_login WHERE id_nivel = 2")->fetchColumn();
$totalEmprLogin  = $conexao->query("SELECT COUNT(*) FROM tb_login WHERE id_nivel = 1")->fetchColumn();

// Helpers
function iniciais($email) {
    $partes = explode('@', $email);
    $nome = explode('.', $partes[0]);
    $ini = strtoupper(substr($nome[0], 0, 1));
    $ini .= isset($nome[1]) ? strtoupper(substr($nome[1], 0, 1)) : strtoupper(substr($partes[0], 1, 1));
    return $ini;
}

function nivelLabel($nivel) {
    return $nivel == 1 ? 'Empresa' : 'Candidato';
}

function statusLabel($ativo, $sTemp) {
    if ($ativo == 0)  return ['Bloqueado', 'pill-blocked'];
    if ($sTemp == 1)  return ['Temp.',     'pill-pending'];
    return ['Ativo', 'pill-active'];
}

function modalidadeTag($mod) {
    $mod = strtolower($mod);
    if (strpos($mod, 'home') !== false || strpos($mod, 'remoto') !== false)
        return '<span class="tag-home">Home office</span>';
    if (strpos($mod, 'híbrido') !== false || strpos($mod, 'hibrido') !== false)
        return '<span class="tag-hybrid">Híbrido</span>';
    return '<span class="tag-presential">Presencial</span>';
}

// Altura máxima das barras (px) proporcional ao maior mês
$maxMes = 0;
foreach ($dadosMeses as $m) { if ($m['total'] > $maxMes) $maxMes = $m['total']; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS Matchwork — Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- SEU CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Layout exclusivo da dashboard */
        .dash-wrapper        { display: flex; min-height: 100vh; }
        .dash-sidebar        { width: 230px; min-width: 230px; background-color: #2d1b69; display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 100; }
        .dash-main           { margin-left: 230px; flex: 1; display: flex; flex-direction: column; background-color: #f8f9fa; }
        .dash-topbar         { background: #fff; padding: 0 24px; height: 58px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid #EDE7F6; position: sticky; top: 0; z-index: 99; }
        .dash-content        { padding: 28px 24px; flex: 1; }
        .sidebar-logo        { padding: 18px 18px 14px; border-bottom: 1px solid rgba(255,255,255,0.12); display: flex; align-items: center; gap: 10px; }
        .sidebar-logo img    { width: 38px; }
        .sidebar-logo-text   { color: #fff; font-weight: 700; font-size: 15px; line-height: 1.2; }
        .sidebar-logo-text small { display: block; font-weight: 400; font-size: 11px; opacity: .65; }
        .sidebar-nav         { flex: 1; padding: 10px 0; overflow-y: auto; }
        .sidebar-section     { padding: 10px 18px 4px; font-size: 10px; color: rgba(255,255,255,.4); text-transform: uppercase; letter-spacing: .08em; }
        .sidebar-item        { display: flex; align-items: center; gap: 10px; padding: 9px 18px; color: rgba(255,255,255,.82); font-size: 13.5px; text-decoration: none; transition: background .15s; border-left: 3px solid transparent; }
        .sidebar-item:hover  { background: rgba(255,255,255,.1); color: #fff; }
        .sidebar-item.active { background: rgba(255,255,255,.15); color: #fff; font-weight: 700; border-left-color: #038C33; }
        .sidebar-item i      { font-size: 16px; width: 20px; text-align: center; }
        .sidebar-badge       { margin-left: auto; background: #038C33; color: #fff; font-size: 11px; font-weight: 700; border-radius: 10px; padding: 1px 8px; }
        .sidebar-footer      { padding: 14px 18px; border-top: 1px solid rgba(255,255,255,.12); display: flex; align-items: center; gap: 10px; }
        .sidebar-avatar      { width: 32px; height: 32px; border-radius: 50%; background: #038C33; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
        .sidebar-user-name   { color: #fff; font-size: 13px; font-weight: 600; }
        .sidebar-user-role   { color: rgba(255,255,255,.5); font-size: 11px; }
        .topbar-title        { font-size: 16px; font-weight: 700; color: #2D1B69; flex: 1; }
        .topbar-btn          { width: 36px; height: 36px; border-radius: 8px; border: 1px solid #EDE7F6; background: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #9E86C8; position: relative; text-decoration: none; }
        .topbar-btn:hover    { background: #F5F3FF; color: #2d1b69; }
        .notif-dot           { position: absolute; top: 7px; right: 7px; width: 7px; height: 7px; border-radius: 50%; background: #038C33; border: 1.5px solid #fff; }
        .stat-card           { background: #fff; border-radius: 12px; padding: 18px; border: 1px solid #EDE7F6; }
        .stat-icon           { width: 38px; height: 38px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
        .stat-icon.purple    { background: #EDE7F6; color: #2d1b69; }
        .stat-icon.green     { background: #E8F5E9; color: #038C33; }
        .stat-icon.amber     { background: #FFF8E1; color: #F57F17; }
        .stat-icon.red       { background: #FDECEA; color: #C62828; }
        .stat-value          { font-size: 26px; font-weight: 700; color: #2D1B69; }
        .stat-label          { font-size: 12px; color: #9E86C8; margin-top: 2px; }
        .stat-up             { font-size: 11px; background: #E8F5E9; color: #038C33; border-radius: 6px; padding: 2px 8px; font-weight: 600; }
        .stat-down           { font-size: 11px; background: #FDECEA; color: #C62828; border-radius: 6px; padding: 2px 8px; font-weight: 600; }
        .dash-card           { background: #fff; border-radius: 12px; border: 1px solid #EDE7F6; padding: 18px; }
        .dash-card-title     { font-size: 14px; font-weight: 700; color: #2D1B69; }
        .dash-card-sub       { font-size: 12px; color: #9E86C8; }
        .dash-card-btn       { font-size: 12px; color: #2d1b69; border: 1px solid #D1C4E9; border-radius: 6px; background: #fff; padding: 4px 12px; cursor: pointer; text-decoration: none; }
        .dash-card-btn:hover { background: #F5F3FF; color: #2d1b69; }
        .dash-table          { border-collapse: collapse; }
        .dash-table thead th { font-size: 11px; text-transform: uppercase; letter-spacing: .04em; color: #9E86C8; padding: 0 6px 10px; border-bottom: 1px solid #F0EBF8; font-weight: 500; }
        .dash-table tbody tr { border-bottom: 1px solid #FAF8FF; }
        .dash-table tbody tr:last-child { border-bottom: none; }
        .dash-table tbody tr:hover { background: #FAF8FF; }
        .dash-table tbody td { padding: 9px 6px; font-size: 13px; color: #3a3a3a; vertical-align: middle; }
        .td-name             { font-weight: 600; color: #2D1B69; }
        .pill                { display: inline-block; padding: 2px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; }
        .pill-active         { background: #E8F5E9; color: #038C33; }
        .pill-pending        { background: #FFF8E1; color: #F57F17; }
        .pill-blocked        { background: #FDECEA; color: #C62828; }
        .pill-open           { background: #E8EAF6; color: #3949AB; }
        .tag-home            { background: #EDE7F6; color: #2d1b69; border-radius: 6px; font-size: 11px; font-weight: 600; padding: 2px 8px; }
        .tag-hybrid          { background: #E8F5E9; color: #038C33; border-radius: 6px; font-size: 11px; font-weight: 600; padding: 2px 8px; }
        .tag-presential      { background: #FFF8E1; color: #E65100; border-radius: 6px; font-size: 11px; font-weight: 600; padding: 2px 8px; }
        .av                  { width: 28px; height: 28px; border-radius: 50%; background: #EDE7F6; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; color: #6750A4; flex-shrink: 0; }
        .av.green            { background: #E8F5E9; color: #038C33; }
        .btn-tbl-danger      { padding: 3px 10px; border-radius: 6px; font-size: 12px; border: 1px solid #FFCDD2; color: #C62828; background: #fff; cursor: pointer; font-weight: 600; }
        .btn-tbl-danger:hover{ background: #FDECEA; }
        .btn-tbl-purple      { padding: 3px 10px; border-radius: 6px; font-size: 12px; border: 1px solid #D1C4E9; color: #2d1b69; background: #fff; cursor: pointer; font-weight: 600; }
        .btn-tbl-purple:hover{ background: #EDE7F6; }
        .bar-chart-wrap      { display: flex; align-items: flex-end; gap: 8px; height: 100px; }
        .bar-col             { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; }
        .bar-fill            { border-radius: 4px 4px 0 0; width: 100%; }
        .bar-lbl             { font-size: 10px; color: #9E86C8; }
        .legend-dot          { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
    </style>
</head>
<body>

<div class="dash-wrapper">

    <!-- ========== SIDEBAR ========== -->
    <aside class="dash-sidebar">
        <div class="sidebar-logo">
            <img src="assets/img/logomaior.png" alt="MGS">
            <div class="sidebar-logo-text">MGS <small>Matchwork Admin</small></div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Principal</div>
            <a href="dashboard.php"      class="sidebar-item active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="index.php"          class="sidebar-item"><i class="fa-solid fa-house"></i> Início</a>
            <a href="lista_vagas.php"    class="sidebar-item"><i class="fa-solid fa-briefcase"></i> Vagas <span class="sidebar-badge"><?php echo $totalVagas; ?></span></a>
            <a href="lista-usuarios.php" class="sidebar-item"><i class="fa-solid fa-users"></i> Usuários</a>
            <a href="lista-empresas.php" class="sidebar-item"><i class="fa-solid fa-building"></i> Empresas</a>
            

            <div class="sidebar-section">Suporte</div>
            <a href="lista_suporte.php"  class="sidebar-item"><i class="fa-solid fa-comment-dots"></i> Chamados <span class="sidebar-badge"><?php echo $totalAbertos; ?></span></a>
            <a href="assinatura.php"         class="sidebar-item"><i class="fa-solid fa-star"></i> Planos</a>

            <div class="sidebar-section">Sistema</div>
            <a href="configuracoes.php"  class="sidebar-item"><i class="fa-solid fa-gear"></i> Configurações</a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-avatar">AD</div>
            <div>
                <div class="sidebar-user-name"><?php echo $_SESSION['email']; ?></div>
                <div class="sidebar-user-role">Administrador</div>
            </div>
            <a href="logout.php" class="ms-auto text-white opacity-50"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </aside>

    <!-- ========== MAIN ========== -->
    <div class="dash-main">

        <!-- TOPBAR -->
        <div class="dash-topbar">
            <div class="topbar-title">Dashboard</div>
            <div class="search-container">
                <div class="search-wrapper">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar...">
                </div>
            </div>
            <a href="#" class="topbar-btn">
                <i class="fa-solid fa-bell"></i>
                <?php if ($totalAbertos > 0): ?>
                    <div class="notif-dot"></div>
                <?php endif; ?>
            </a>
            <a href="perfil-candidato.php" class="topbar-btn">
                <i class="fa-solid fa-circle-user"></i>
            </a>
        </div>

        <!-- CONTENT -->
        <div class="dash-content">

            <div class="mb-4">
                <h2 class="fw-bold" style="color:#2D1B69;font-size:20px;">Visão Geral</h2>
                <p class="mb-0" style="color:#7B6FA8;font-size:13px;">Resumo geral do sistema MGS Matchwork</p>
            </div>

            <!-- ===== STAT CARDS ===== -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="stat-icon purple"><i class="fa-solid fa-users"></i></div>
                            <span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Usuários</span>
                        </div>
                        <div class="stat-value"><?php echo number_format($totalUsuarios, 0, ',', '.'); ?></div>
                        <div class="stat-label">Usuários cadastrados</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="stat-icon green"><i class="fa-solid fa-briefcase"></i></div>
                            <span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Vagas</span>
                        </div>
                        <div class="stat-value"><?php echo number_format($totalVagas, 0, ',', '.'); ?></div>
                        <div class="stat-label">Vagas publicadas</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="stat-icon amber"><i class="fa-solid fa-building"></i></div>
                            <span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Empresas</span>
                        </div>
                        <div class="stat-value"><?php echo number_format($totalEmpresas, 0, ',', '.'); ?></div>
                        <div class="stat-label">Empresas ativas</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="stat-icon red"><i class="fa-solid fa-comment-dots"></i></div>
                            <span class="stat-down"><?php echo $totalAbertos; ?> abertos</span>
                        </div>
                        <div class="stat-value"><?php echo number_format($totalChamados, 0, ',', '.'); ?></div>
                        <div class="stat-label">Chamados de suporte</div>
                    </div>
                </div>
            </div>

            <!-- ===== GRÁFICOS ===== -->
            <div class="row g-3 mb-4">
                <!-- Bar chart: cadastros por mês -->
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div>
                                <div class="dash-card-title">Cadastros por mês</div>
                                <div class="dash-card-sub">Novos usuários nos últimos 6 meses</div>
                            </div>
                            <a href="lista-usuarios.php" class="dash-card-btn">Ver tudo</a>
                        </div>
                        <div class="bar-chart-wrap">
                            <?php
                            $cores = [' #2d1b69','#038C33','#2d1b69','#038C33','#2d1b69','#038C33'];
                            $i = 0;
                            foreach ($dadosMeses as $m):
                                $altura = $maxMes > 0 ? round(($m['total'] / $maxMes) * 90) : 10;
                                $cor = $cores[$i % count($cores)];
                                $i++;
                            ?>
                            <div class="bar-col">
                                <div class="bar-fill" style="height:<?php echo $altura; ?>px;background:<?php echo $cor; ?>;"></div>
                                <span class="bar-lbl"><?php echo $m['mes']; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Donut: tipo de usuário -->
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="mb-3">
                            <div class="dash-card-title">Tipo de usuário</div>
                            <div class="dash-card-sub">Distribuição de perfis</div>
                        </div>
                        <?php
                        $pctCand = $totalUsuarios > 0 ? round(($totalCandidatos / $totalUsuarios) * 100) : 0;
                        $pctEmp  = $totalUsuarios > 0 ? round(($totalEmprLogin  / $totalUsuarios) * 100) : 0;
                        $pctOut  = 100 - $pctCand - $pctEmp;
                        $circ    = 2 * M_PI * 33; // ~207
                        $arcCand = round(($pctCand / 100) * $circ, 1);
                        $arcEmp  = round(($pctEmp  / 100) * $circ, 1);
                        $arcOut  = round(($pctOut  / 100) * $circ, 1);
                        ?>
                        <div class="d-flex align-items-center gap-4">
                            <svg width="90" height="90" viewBox="0 0 90 90">
                                <circle cx="45" cy="45" r="33" fill="none" stroke="#EDE7F6" stroke-width="14"/>
                                <circle cx="45" cy="45" r="33" fill="none" stroke="#2d1b69" stroke-width="14"
                                    stroke-dasharray="<?php echo $arcCand; ?> <?php echo $circ - $arcCand; ?>"
                                    stroke-dashoffset="0" transform="rotate(-90 45 45)"/>
                                <circle cx="45" cy="45" r="33" fill="none" stroke="#038C33" stroke-width="14"
                                    stroke-dasharray="<?php echo $arcEmp; ?> <?php echo $circ - $arcEmp; ?>"
                                    stroke-dashoffset="-<?php echo $arcCand; ?>" transform="rotate(-90 45 45)"/>
                                <text x="45" y="49" text-anchor="middle" font-size="12" font-weight="700" fill="#2D1B69">
                                    <?php echo number_format($totalUsuarios, 0, ',', '.'); ?>
                                </text>
                            </svg>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="legend-dot" style="background:#2d1b69;"></div>
                                    <span style="font-size:12px;color:#555;flex:1;">Candidatos</span>
                                    <strong style="font-size:12px;color:#2D1B69;"><?php echo $pctCand; ?>%</strong>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="legend-dot" style="background:#038C33;"></div>
                                    <span style="font-size:12px;color:#555;flex:1;">Empresas</span>
                                    <strong style="font-size:12px;color:#2D1B69;"><?php echo $pctEmp; ?>%</strong>
                                </div>
                                <?php if ($pctOut > 0): ?>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="legend-dot" style="background:#F57F17;"></div>
                                    <span style="font-size:12px;color:#555;flex:1;">Outros</span>
                                    <strong style="font-size:12px;color:#2D1B69;"><?php echo $pctOut; ?>%</strong>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== TABELAS LADO A LADO ===== -->
            <div class="row g-3 mb-4">

                <!-- Últimos usuários -->
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">Últimos usuários</div>
                            <a href="lista-usuarios.php" class="dash-card-btn">Ver lista</a>
                        </div>
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Nível</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ultimosUsuarios as $u):
                                    [$statusTxt, $statusClass] = statusLabel($u['ativo'], $u['s_temp']);
                                    $ini = iniciais($u['email']);
                                    $avClass = $u['id_nivel'] == 1 ? 'av green' : 'av';
                                    $dataFmt = isset($u['data_cadastro']) ? date('d/m/y', strtotime($u['data_cadastro'])) : '—';
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="<?php echo $avClass; ?>"><?php echo $ini; ?></div>
                                            <span class="td-name" style="max-width:120px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                                <?php echo htmlspecialchars($u['email']); ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td style="color:#9E86C8;"><?php echo nivelLabel($u['id_nivel']); ?></td>
                                    <td><span class="pill <?php echo $statusClass; ?>"><?php echo $statusTxt; ?></span></td>
                                    <td style="color:#9E86C8;font-size:12px;"><?php echo $dataFmt; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Chamados de suporte -->
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">Chamados de suporte</div>
                            <a href="lista_suporte.php" class="dash-card-btn">Ver todos</a>
                        </div>
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($chamados as $c):
                                    $pillC = $c['ativo'] == 1 ? 'pill-open' : 'pill-active';
                                    $txtC  = $c['ativo'] == 1 ? 'Aberto'   : 'Resolvido';
                                ?>
                                <tr>
                                    <td class="td-name"><?php echo htmlspecialchars($c['nome']); ?></td>
                                    <td style="color:#9E86C8;font-size:12px;max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                        <?php echo htmlspecialchars($c['descricao']); ?>
                                    </td>
                                    <td><span class="pill <?php echo $pillC; ?>"><?php echo $txtC; ?></span></td>
                                    <td>
                                        <?php if ($c['ativo'] == 1): ?>
                                            <a href="?ativar=<?php echo $c['id']; ?>" class="btn-tbl-danger">Fechar</a>
                                        <?php else: ?>
                                            <a href="?deletar=<?php echo $c['id']; ?>"
                                               onclick="return confirm('Deletar este chamado?')"
                                               class="btn-tbl-danger">Deletar</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ===== VAGAS RECENTES ===== -->
            <div class="row g-3">
                <div class="col-12">
                    <div class="dash-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">Vagas recentes</div>
                            <a href="lista-vagas.php" class="dash-card-btn">Ver todas</a>
                        </div>
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>Vaga</th>
                                    <th>Empresa</th>
                                    <th>Área</th>
                                    <th>Modalidade</th>
                                    <th>Modelo</th>
                                    <th>Salário</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vagasRecentes as $v):
                                    $pillV = isset($v['ativo']) && $v['ativo'] == 0 ? 'pill-pending' : 'pill-active';
                                    $txtV  = isset($v['ativo']) && $v['ativo'] == 0 ? 'Pausada'      : 'Ativa';
                                ?>
                                <tr>
                                    <td class="td-name"><?php echo htmlspecialchars($v['vaga']); ?></td>
                                    <td style="color:#9E86C8;"><?php echo htmlspecialchars($v['nome_fantasia']); ?></td>
                                    <td style="color:#9E86C8;"><?php echo htmlspecialchars($v['area_atuacao']); ?></td>
                                    <td><?php echo modalidadeTag($v['modalidade']); ?></td>
                                    <td><?php echo htmlspecialchars($v['modelo_de_trabalho']); ?></td>
                                    <td style="color:#038C33;font-weight:700;">R$ <?php echo number_format($v['salario'], 2, ',', '.'); ?></td>
                                    <td><span class="pill <?php echo $pillV; ?>"><?php echo $txtV; ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- /dash-content -->
    </div><!-- /dash-main -->
</div><!-- /dash-wrapper -->

<?php
// Processar ações dos botões de chamado
if (isset($_GET['ativar']))  { ativoEinativo((int)$_GET['ativar']); }
if (isset($_GET['deletar'])) { deletarChamado((int)$_GET['deletar']); }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
