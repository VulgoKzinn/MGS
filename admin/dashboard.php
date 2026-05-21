<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
validaAcesso();

// ===== TOTAL USUÁRIOS (tb_login) =====
$totalUsuarios = $conexao->query("SELECT COUNT(*) FROM tb_login")->fetchColumn();

// ===== TOTAL EMPRESAS ATIVAS (tb_empresa) =====
$totalEmpresas = $conexao->query("SELECT COUNT(*) FROM tb_empresa")->fetchColumn();

// ===== TOTAL CHAMADOS (tb_suporte) =====
$totalChamados = $conexao->query("SELECT COUNT(*) FROM tb_suporte")->fetchColumn();

// ===== TOTAL MATCHES (tb_match) =====
$totalMatches = $conexao->query("SELECT COUNT(*) FROM tb_match")->fetchColumn();

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

// ===== CADASTROS POR MÊS (últimos 6 meses) =====
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

// Prepara os arrays para o JavaScript do Chart.js
$labelMesesCad = []; $valorMesesCad = [];
foreach ($dadosMeses as $m) { $labelMesesCad[] = $m['mes']; $valorMesesCad[] = (int)$m['total']; }

// ===== MATCHES POR MÊS (últimos 6 meses) =====
$stmtMatchesMes = $conexao->query("
    SELECT
        DATE_FORMAT(data_match, '%b') AS mes,
        COUNT(*) AS total
    FROM tb_match
    WHERE data_match >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
    GROUP BY DATE_FORMAT(data_match, '%Y-%m')
    ORDER BY DATE_FORMAT(data_match, '%Y-%m') ASC
");
$dadosMatchesMes = $stmtMatchesMes->fetchAll(PDO::FETCH_ASSOC);

// Prepara os arrays para o JavaScript do Chart.js
$labelMesesMat = []; $valorMesesMat = [];
foreach ($dadosMatchesMes as $mm) { $labelMesesMat[] = $mm['mes']; $valorMesesMat[] = (int)$mm['total']; }

// ===== DISTRIBUIÇÃO POR NÍVEL (para o donut) =====
$totalCandidatos = $conexao->query("SELECT COUNT(*) FROM tb_login WHERE id_nivel = 2")->fetchColumn();
$totalEmprLogin  = $conexao->query("SELECT COUNT(*) FROM tb_login WHERE id_nivel = 1")->fetchColumn();

$totalCandidatos = $totalCandidatos ? (int)$totalCandidatos : 0;
$totalEmprLogin = $totalEmprLogin ? (int)$totalEmprLogin : 0;

// Cálculo da porcentagem via PHP para exibir no texto lateral do Donut
$totalBase = $totalCandidatos + $totalEmprLogin;
$pctCandidatos = $totalBase > 0 ? round(($totalCandidatos / $totalBase) * 100, 1) : 0;
$pctEmpresas = $totalBase > 0 ? round(($totalEmprLogin / $totalBase) * 100, 1) : 0;

// Helpers
function iniciais($email) {
    $partes = explode('@', $email);
    $nome = explode('.', $partes[0]);
    $ini = strtoupper(substr($nome[0], 0, 1));
    $ini .= isset($nome[1]) ? strtoupper(substr($nome[1], 0, 1)) : strtoupper(substr($partes[0], 1, 1));
    return $ini;
}

$totalAbertos = $conexao->query("SELECT COUNT(*) FROM tb_suporte WHERE ativo = 1")->fetchColumn();

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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS Matchwork — Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="dash-wrapper">

<?php include_once "templates/header.php";?>

    <div class="dash-main">

        <div class="dash-topbar">
            <div class="topbar-title">Dashboard</div>
            <div class="search-container">
                <div class="search-wrapper">
                    <i class="fa fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar...">
                </div>
            </div>
            <a href="candidato/match-candidato.php" class="topbar-btn">
                <i class="fa-solid fa-bell"></i>
                <?php if ($totalAbertos > 0): ?>
                    <div class="notif-dot"><?php echo $totalAbertos; ?></div>
                <?php endif; ?>
            </a>
            <a href="candidato/perfil-candidato.php" class="topbar-btn">
                <i class="fa-solid fa-circle-user"></i>
            </a>
        </div>

        <div class="dash-content">

            <div class="mb-4">
                <h2 class="fw-bold" style="color:#2D1B69;font-size:20px;">Visão Geral</h2>
                <p class="mb-0" style="color:#7B6FA8;font-size:13px;">Resumo gerencial do sistema MGS Matchwork</p>
            </div>

            <div class="row g-3 mb-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                <div class="col"><div class="stat-card h-100"><div class="d-flex align-items-center justify-content-between mb-2"><div class="stat-icon purple"><i class="fa-solid fa-users"></i></div><span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Usuários</span></div><div class="stat-value"><?php echo number_format($totalUsuarios, 0, ',', '.'); ?></div><div class="stat-label">Usuários cadastrados</div></div></div>
                <div class="col"><div class="stat-card h-100"><div class="d-flex align-items-center justify-content-between mb-2"><div class="stat-icon green"><i class="fa-solid fa-briefcase"></i></div><span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Vagas</span></div><div class="stat-value"><?php echo number_format($totalVagas, 0, ',', '.'); ?></div><div class="stat-label">Vagas publicadas</div></div></div>
                <div class="col"><div class="stat-card h-100"><div class="d-flex align-items-center justify-content-between mb-2"><div class="stat-icon amber"><i class="fa-solid fa-building"></i></div><span class="stat-up"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> Empresas</span></div><div class="stat-value"><?php echo number_format($totalEmpresas, 0, ',', '.'); ?></div><div class="stat-label">Empresas ativas</div></div></div>
                <div class="col"><div class="stat-card h-100" style="border-bottom: 3px solid #E91E63;"><div class="d-flex align-items-center justify-content-between mb-2"><div class="stat-icon" style="background-color: #FCE4EC; color: #E91E63;"><i class="fa-solid fa-heart"></i></div><span class="stat-up" style="background-color: #FCE4EC; color: #E91E63;"><i class="fa-solid fa-bolt" style="font-size:9px;"></i> Sucesso</span></div><div class="stat-value" style="color: #E91E63;"><?php echo number_format($totalMatches, 0, ',', '.'); ?></div><div class="stat-label">Matches Realizados</div></div></div>
                <div class="col"><div class="stat-card h-100"><div class="d-flex align-items-center justify-content-between mb-2"><div class="stat-icon red"><i class="fa-solid fa-comment-dots"></i></div><span class="stat-down"><?php echo $totalAbertos; ?> abertos</span></div><div class="stat-value"><?php echo number_format($totalChamados, 0, ',', '.'); ?></div><div class="stat-label">Chamados de suporte</div></div></div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div>
                                <div class="dash-card-title">Cadastros por mês</div>
                                <div class="dash-card-sub">Novos usuários ativos</div>
                            </div>
                            <a href="lista-usuarios.php" class="dash-card-btn">Ver tudo</a>
                        </div>
                        <div style="position: relative; height: 230px; width: 100%;">
                            <canvas id="chartCadastros"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div>
                                <div class="dash-card-title" style="color: #E91E63;"><i class="fa-solid fa-heart me-1"></i> Matches por mês</div>
                                <div class="dash-card-sub">Conexões geradas pelo sistema</div>
                            </div>
                            <a href="listar-match.php" class="dash-card-btn" style="border-color: #F8BBD0; color: #E91E63;">Ver todos</a>
                        </div>
                        <div style="position: relative; height: 230px; width: 100%;">
                            <canvas id="chartMatches"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-12">
                    <div class="dash-card h-100">
                        <div class="mb-3">
                            <div class="dash-card-title" style="color: #2D1B69;">Volume de Usuários Cadastrados</div>
                            <div class="dash-card-sub">Total de perfis ativos no ecossistema MGS Matchwork</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between" style="height: 120px;">
                            <div style="position: relative; width: 110px; height: 110px;">
                                <canvas id="chartProporcaoBase"></canvas>
                            </div>
                            <div class="d-flex flex-column gap-2 pe-4" style="flex: 1; margin-left: 35px;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="legend-dot" style="background:#2d1b69;"></div>
                                        <span style="font-size:13px; color:#555;">Candidatos</span>
                                    </div>
                                    <div class="text-end">
                                        <span style="font-size:13px; color:#2D1B69; font-weight:700;"><?php echo $totalCandidatos; ?></span>
                                        <small class="text-muted ms-2">(<?php echo $pctCandidatos; ?>%)</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="legend-dot" style="background:#038C33;"></div>
                                        <span style="font-size:13px; color:#555;">Empresas</span>
                                    </div>
                                    <div class="text-end">
                                        <span style="font-size:13px; color:#2D1B69; font-weight:700;"><?php echo $totalEmprLogin; ?></span>
                                        <small class="text-muted ms-2">(<?php echo $pctEmpresas; ?>%)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="dash-card h-100">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">Últimos usuários</div>
                            <a href="lista-usuarios.php" class="dash-card-btn">Ver lista</a>
                        </div>
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>Ref. Usuário</th>
                                    <th>Nível</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ultimosUsuarios as $u):
                                    [$statusTxt, $statusClass] = statusLabel($u['ativo'], $u['s_temp']);
                                    $ini = iniciais($u['email']);
                                    $avClass = $u['id_nivel'] == 1 ? 'av green' : 'av';
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="<?php echo $avClass; ?>"><?php echo $ini; ?></div>
                                            <span class="td-name"><?php echo htmlspecialchars($u['email']); ?></span>
                                        </div>
                                    </td>
                                    <td style="color:#9E86C8;"><?php echo nivelLabel($u['id_nivel']); ?></td>
                                    <td><span class="pill <?php echo $statusClass; ?>"><?php echo $statusTxt; ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($chamados as $c):
                                    $pillC = $c['ativo'] == 1 ? 'pill-open' : 'pill-active';
                                    $txtC  = $c['ativo'] == 1 ? 'Aberto'   : 'Resolvido';
                                ?>
                                <tr>
                                    <td class="td-name"><?php echo htmlspecialchars($c['nome']); ?></td>
                                    <td><span class="pill <?php echo $pillC; ?>"><?php echo $txtC; ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                                    <th>Modalidade</th>
                                    <th>Salário</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vagasRecentes as $v): ?>
                                <tr>
                                    <td class="td-name"><?php echo htmlspecialchars($v['vaga']); ?></td>
                                    <td style="color:#9E86C8;"><?php echo htmlspecialchars($v['nome_fantasia']); ?></td>
                                    <td><?php echo modalidadeTag($v['modalidade']); ?></td>
                                    <td style="color:#038C33;font-weight:700;">R$ <?php echo number_format($v['salario'], 2, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div></div></div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// --- GRÁFICO CADASTROS ---
const ctxCad = document.getElementById('chartCadastros').getContext('2d');
new Chart(ctxCad, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(!empty($labelMesesCad) ? $labelMesesCad : ['May']); ?>,
        datasets: [{
            label: 'Novos Usuários',
            data: <?php echo json_encode(!empty($valorMesesCad) ? $valorMesesCad : [$totalUsuarios]); ?>,
            backgroundColor: '#2d1b69',
            borderRadius: 4,
            barPercentage: 0.2, 
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { 
            y: { beginAtZero: true, grid: { color: '#F0EBF8' } },
            x: { grid: { display: false } }
        }
    }
});

// --- GRÁFICO MATCHES ---
const ctxMat = document.getElementById('chartMatches').getContext('2d');
new Chart(ctxMat, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(!empty($labelMesesMat) ? $labelMesesMat : ['May']); ?>,
        datasets: [{
            label: 'Matches Concluídos',
            data: <?php echo json_encode(!empty($valorMesesMat) ? $valorMesesMat : [$totalMatches]); ?>,
            backgroundColor: '#E91E63',
            borderRadius: 4,
            barPercentage: 0.2, 
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { 
            y: { beginAtZero: true, grid: { color: '#FCE4EC' } },
            x: { grid: { display: false } }
        }
    }
});

// --- GRÁFICO DONUT COM TRATAMENTO DE PORCENTAGEM NO POPUP ---
const ctxProporcao = document.getElementById('chartProporcaoBase').getContext('2d');
new Chart(ctxProporcao, {
    type: 'doughnut',
    data: {
        labels: ['Candidatos', 'Empresas'],
        datasets: [{
            data: [<?php echo $totalCandidatos; ?>, <?php echo $totalEmprLogin; ?>],
            backgroundColor: ['#2d1b69', '#038C33'],
            borderWidth: 2,
            borderColor: '#ffffff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: { 
            legend: { display: false },
            // Função que calcula a porcentagem do pedaço dinamicamente na caixinha do mouse!
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        let value = context.raw || 0;
                        let dataset = context.chart.data.datasets[0].data;
                        let total = dataset.reduce((a, b) => a + b, 0);
                        let percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                        return ` ${label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    }
});
</script>
</body>
</html>