<?php
require_once __DIR__ . '/backend/includes/funcoes.php';
require_once __DIR__ . '/backend/config/conexaoTST.php';
validaAcesso();



$vagas = VagasDisponiveis();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS Matchwork — Vagas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --sidebar-bg: #2d1b69;
            --sidebar-active: #7c3aed;
            --sidebar-text: #c4b5fd;
            --sidebar-hover: rgba(124,58,237,0.18);
            --accent: #7c3aed;
            --accent2: #10b981;
            --bg: #f4f6fb;
            --card: #fff;
            --text: #1e1b4b;
            --muted: #6b7280;
            --border: #e5e7eb;
            --badge-green: #d1fae5;
            --badge-green-text: #065f46;
            --badge-red: #fee2e2;
            --badge-red-text: #991b1b;
        }

        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); display: flex; min-height: 100vh; color: var(--text); }

        /* ───── SIDEBAR ───── */
        .sidebar {
            width: 220px; min-height: 100vh;
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            position: fixed; top: 0; left: 0; bottom: 0;
            z-index: 100;
        }
        .sidebar-logo {
            display: flex; align-items: center; gap: 10px;
            padding: 22px 20px 18px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-logo img { width: 32px; height: 32px; border-radius: 8px; }
        .sidebar-logo-text { line-height: 1.1; }
        .sidebar-logo-text strong { color: #fff; font-size: 15px; }
        .sidebar-logo-text span { color: var(--sidebar-text); font-size: 11px; }

        .sidebar-section { padding: 18px 12px 4px; font-size: 10px; font-weight: 700;
            letter-spacing: 1.2px; color: rgba(196,181,253,0.45); text-transform: uppercase; }

        .sidebar nav a {
            display: flex; align-items: center; gap: 11px;
            padding: 9px 16px; color: var(--sidebar-text);
            text-decoration: none; font-size: 13.5px; border-radius: 8px;
            margin: 2px 8px; transition: background .15s, color .15s;
            position: relative;
        }
        .sidebar nav a:hover { background: var(--sidebar-hover); color: #fff; }
        .sidebar nav a.active { background: var(--accent); color: #fff; }
        .sidebar nav a .badge {
            margin-left: auto; background: #038C33; color: #fff;
            font-size: 10px; font-weight: 700; border-radius: 10px;
            padding: 1px 7px; min-width: 20px; text-align: center;
        }
        .sidebar nav a i { width: 18px; text-align: center; font-size: 14px; }

        .sidebar-footer {
            margin-top: auto; padding: 14px 12px;
            border-top: 1px solid rgba(255,255,255,0.08);
            display: flex; align-items: center; gap: 10px;
        }
        .sidebar-avatar {
            width: 34px; height: 34px; background: var(--accent);
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; color: #fff; font-weight: 700; font-size: 13px;
        }
        .sidebar-footer-info { flex: 1; }
        .sidebar-footer-info strong { display: block; color: #fff; font-size: 12px; }
        .sidebar-footer-info span { color: var(--sidebar-text); font-size: 11px; }
        .sidebar-footer a { color: var(--sidebar-text); font-size: 15px; }
        .sidebar-footer a:hover { color: #fff; }

        /* ───── MAIN ───── */
        .main { margin-left: 220px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        /* TOPBAR */
        .topbar {
            background: #fff; border-bottom: 1px solid var(--border);
            padding: 0 28px; height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 90;
        }
        .topbar h1 { font-size: 18px; font-weight: 700; color: var(--text); }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-search {
            display: flex; align-items: center; gap: 8px;
            background: var(--bg); border: 1px solid var(--border);
            border-radius: 8px; padding: 6px 14px; font-size: 13px; color: var(--muted);
        }
        .topbar-search input { border: none; background: transparent; outline: none; font-size: 13px; color: var(--text); width: 170px; }
        .topbar-icon {
            width: 34px; height: 34px; border-radius: 50%;
            background: var(--bg); border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            color: var(--muted); cursor: pointer; transition: background .15s;
        }
        .topbar-icon:hover { background: var(--border); }

        /* CONTENT */
        .content { padding: 28px; flex: 1; }

        .page-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 24px;
        }
        .page-header-left h2 { font-size: 22px; font-weight: 700; }
        .page-header-left p { color: var(--muted); font-size: 13px; margin-top: 2px; }

        .btn-primary {
            background: var(--accent); color: #fff;
            border: none; border-radius: 8px;
            padding: 9px 18px; font-size: 13px; font-weight: 600;
            cursor: pointer; display: flex; align-items: center; gap: 7px;
            text-decoration: none; transition: opacity .15s;
        }
        .btn-primary:hover { opacity: .88; }

        /* FILTERS */
        .filters {
            background: var(--card); border: 1px solid var(--border);
            border-radius: 12px; padding: 14px 20px;
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 22px; flex-wrap: wrap;
        }
        .filter-label { font-size: 12px; font-weight: 600; color: var(--muted); margin-right: 4px; }
        .filter-btn {
            padding: 5px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
            border: 1.5px solid var(--border); background: transparent;
            cursor: pointer; color: var(--muted); transition: all .15s;
        }
        .filter-btn.active, .filter-btn:hover {
            background: var(--accent); color: #fff; border-color: var(--accent);
        }
        .filter-select {
            margin-left: auto; padding: 6px 12px; border-radius: 8px;
            border: 1px solid var(--border); font-size: 12px;
            background: var(--bg); color: var(--text); cursor: pointer;
        }

        /* TABLE CARD */
        .table-card {
            background: var(--card); border: 1px solid var(--border);
            border-radius: 14px; overflow: hidden;
        }
        .table-card-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 16px 22px; border-bottom: 1px solid var(--border);
        }
        .table-card-header span { font-weight: 700; font-size: 14px; }
        .table-card-header small { color: var(--muted); font-size: 12px; margin-left: 8px; }

        table { width: 100%; border-collapse: collapse; }
        thead th {
            background: #f9fafb; text-align: left;
            padding: 11px 18px; font-size: 11px; font-weight: 700;
            letter-spacing: .7px; text-transform: uppercase; color: var(--muted);
            border-bottom: 1px solid var(--border);
        }
        tbody tr { transition: background .12s; }
        tbody tr:hover { background: #f5f3ff; }
        tbody td { padding: 13px 18px; font-size: 13px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        tbody tr:last-child td { border-bottom: none; }

        .vaga-info { display: flex; align-items: center; gap: 12px; }
        .vaga-img {
            width: 40px; height: 40px; border-radius: 8px; object-fit: cover;
            background: #e0d7ff; flex-shrink: 0;
        }
        .vaga-img-placeholder {
            width: 40px; height: 40px; border-radius: 8px;
            background: linear-gradient(135deg, #7c3aed22, #7c3aed44);
            display: flex; align-items: center; justify-content: center;
            color: var(--accent); font-size: 16px; flex-shrink: 0;
        }
        .vaga-title { font-weight: 600; font-size: 13px; color: var(--text); }
        .vaga-empresa { font-size: 11px; color: var(--muted); margin-top: 1px; }

        .badge {
            display: inline-block; padding: 3px 10px; border-radius: 20px;
            font-size: 11px; font-weight: 600;
        }
        .badge-presencial { background: #dbeafe; color: #1d4ed8; }
        .badge-remoto    { background: #d1fae5; color: #065f46; }
        .badge-hibrido   { background: #fef3c7; color: #92400e; }
        .badge-clt       { background: #ede9fe; color: #5b21b6; }
        .badge-pj        { background: #fce7f3; color: #9d174d; }
        .badge-estagio   { background: #e0f2fe; color: #0369a1; }

        .actions { display: flex; align-items: center; gap: 8px; }
        .btn-action {
            padding: 5px 12px; border-radius: 7px; font-size: 12px; font-weight: 600;
            border: none; cursor: pointer; transition: opacity .15s; text-decoration: none;
            display: inline-flex; align-items: center; gap: 5px;
        }
        .btn-edit  { background: #ede9fe; color: #5b21b6; }
        .btn-del   { background: #fee2e2; color: #991b1b; }
        .btn-view  { background: #e0f2fe; color: #0369a1; }
        .btn-action:hover { opacity: .78; }

        /* EMPTY STATE */
        .empty-state {
            text-align: center; padding: 60px 20px;
            color: var(--muted);
        }
        .empty-state i { font-size: 40px; color: #d1d5db; margin-bottom: 14px; display: block; }
        .empty-state p { font-size: 14px; }

        /* PAGINATION */
        .pagination {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 22px; border-top: 1px solid var(--border);
        }
        .pagination small { color: var(--muted); font-size: 12px; }
        .pag-btns { display: flex; gap: 6px; }
        .pag-btn {
            width: 30px; height: 30px; border-radius: 7px; border: 1px solid var(--border);
            background: transparent; cursor: pointer; font-size: 12px;
            display: flex; align-items: center; justify-content: center;
            color: var(--text); transition: all .15s;
        }
        .pag-btn.active, .pag-btn:hover { background: var(--accent); color: #fff; border-color: var(--accent); }

        /* SEARCH FILTER JS */
        .hidden { display: none !important; }
    </style>
</head>
<body>

<!-- ═══ SIDEBAR ═══ -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div style="width:32px;height:32px;background:#7c3aed;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px;">M</div>
        <div class="sidebar-logo-text">
            <strong>MGS</strong><br>
            <span>Matchwork Admin</span>
        </div>
    </div>

    <div class="sidebar-section">Principal</div>
    <nav>
        <a href="dashboard.php"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
        <a href="index.php"><i class="fa-solid fa-house"></i> Início</a>
        <a href="lista_vagas.php" class="active"><i class="fa-solid fa-briefcase"></i> Vagas <span class="badge"><?= is_array($vagas) ? count($vagas) : 0 ?></span></a>
        <a href="lista-usuarios.php"><i class="fa-solid fa-users"></i> Usuários</a>
        <a href="lista_empresas.php"><i class="fa-solid fa-building"></i> Empresas</a>
    </nav>

    <div class="sidebar-section">Suporte</div>
    <nav>
        <a href="global/lista_suporte.php"><i class="fa-solid fa-headset"></i> Chamados</a>
        <a href="global/assinatura.php"><i class="fa-solid fa-crown"></i> Planos</a>
    </nav>

    <div class="sidebar-section">Sistema</div>
    <nav>
        <a href="configuracoes.php"><i class="fa-solid fa-gear"></i> Configurações</a>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-avatar">AD</div>
        <div class="sidebar-footer-info">
            <strong><?= htmlspecialchars($_SESSION['email'] ?? 'Admin') ?></strong>
            <span>Administrador</span>
        </div>
        <a href="funcoes.php?logout=1" title="Sair"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>
</aside>

<!-- ═══ MAIN ═══ -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <h1>Vagas</h1>
        <div class="topbar-right">
            <div class="topbar-search">
                <i class="fa-solid fa-magnifying-glass" style="font-size:13px;"></i>
                <input type="text" id="searchInput" placeholder="Buscar vaga..." oninput="filtrarTabela()">
            </div>
            <div class="topbar-icon"><i class="fa-solid fa-bell" style="font-size:13px;"></i></div>
            <div class="topbar-icon"><i class="fa-solid fa-user" style="font-size:13px;"></i></div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <div class="page-header">
            <div class="page-header-left">
                <h2>Vagas publicadas</h2>
                <p>Gerencie todas as vagas cadastradas no sistema</p>
            </div>
            <a href="cadastrar_vaga.php" class="btn-primary">
                <i class="fa-solid fa-plus"></i> Nova Vaga
            </a>
        </div>

        <!-- FILTROS RÁPIDOS -->
        <div class="filters">
            <span class="filter-label">Modalidade:</span>
            <button class="filter-btn active" onclick="filtrarModalidade('todos', this)">Todos</button>
            <button class="filter-btn" onclick="filtrarModalidade('presencial', this)">Presencial</button>
            <button class="filter-btn" onclick="filtrarModalidade('remoto', this)">Remoto</button>
            <button class="filter-btn" onclick="filtrarModalidade('hibrido', this)">Híbrido</button>
            <select class="filter-select" onchange="filtrarModelo(this.value)">
                <option value="">Modelo de trabalho</option>
                <option value="CLT">CLT</option>
                <option value="PJ">PJ</option>
                <option value="Estágio">Estágio</option>
                <option value="Freelancer">Freelancer</option>
            </select>
        </div>

        <!-- TABELA -->
        <div class="table-card">
            <div class="table-card-header">
                <div>
                    <span>Lista de Vagas</span>
                    <small id="totalCount"><?= is_array($vagas) ? count($vagas) : 0 ?> vagas encontradas</small>
                </div>
            </div>

            <?php if (!is_array($vagas) || count($vagas) === 0): ?>
                <div class="empty-state">
                    <i class="fa-solid fa-briefcase"></i>
                    <p>Nenhuma vaga cadastrada ainda.</p>
                </div>
            <?php else: ?>
            <table id="vagasTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vaga / Empresa</th>
                        <th>Área</th>
                        <th>Modalidade</th>
                        <th>Modelo</th>
                        <th>Localização</th>
                        <th>Salário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($vagas as $i => $v): 
                    $modalidade = strtolower($v['modalidade'] ?? '');
                    $modelo     = $v['modelo_de_trabalho'] ?? '';
                    $badgeMod   = match($modalidade) {
                        'presencial' => 'badge-presencial',
                        'remoto'     => 'badge-remoto',
                        'híbrido','hibrido' => 'badge-hibrido',
                        default      => 'badge-presencial'
                    };
                    $badgeModelo = match(strtolower($modelo)) {
                        'clt'      => 'badge-clt',
                        'pj'       => 'badge-pj',
                        'estágio','estagio' => 'badge-estagio',
                        default    => 'badge-clt'
                    };
                ?>
                <tr data-modalidade="<?= htmlspecialchars($modalidade) ?>" data-modelo="<?= htmlspecialchars($modelo) ?>">
                    <td style="color:var(--muted);font-size:12px;"><?= $v['id'] ?></td>
                    <td>
                        <div class="vaga-info">
                            <?php if (!empty($v['imagem_vaga'])): ?>
                                <img class="vaga-img" src="assets/img/empresa/uploads/<?= htmlspecialchars($v['imagem_vaga']) ?>" alt="">
                            <?php else: ?>
                                <div class="vaga-img-placeholder"><i class="fa-solid fa-briefcase"></i></div>
                            <?php endif; ?>
                            <div>
                                <div class="vaga-title"><?= htmlspecialchars($v['vaga']) ?></div>
                                <div class="vaga-empresa"><i class="fa-solid fa-building" style="font-size:10px;"></i> <?= htmlspecialchars($v['nome_fantasia'] ?? '—') ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="font-size:12px;"><?= htmlspecialchars($v['area_atuacao'] ?? '—') ?></td>
                    <td><span class="badge <?= $badgeMod ?>"><?= htmlspecialchars($v['modalidade'] ?? '—') ?></span></td>
                    <td><span class="badge <?= $badgeModelo ?>"><?= htmlspecialchars($modelo ?: '—') ?></span></td>
                    <td style="font-size:12px;color:var(--muted);"><i class="fa-solid fa-location-dot" style="font-size:10px;"></i> <?= htmlspecialchars($v['localizacao'] ?? '—') ?></td>
                    <td style="font-size:12px;font-weight:600;">
                        <?= !empty($v['salario']) ? 'R$ ' . number_format((float)$v['salario'], 2, ',', '.') : '<span style="color:var(--muted);">A combinar</span>' ?>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="detalhe_vaga.php?id=<?= $v['id'] ?>" class="btn-action btn-view" title="Ver"><i class="fa-solid fa-eye"></i></a>
                            <a href="editar_vaga.php?id=<?= $v['id'] ?>" class="btn-action btn-edit" title="Editar"><i class="fa-solid fa-pen"></i></a>
                            <a href="deletar_vaga.php?id=<?= $v['id'] ?>" class="btn-action btn-del" title="Excluir"
                               onclick="return confirm('Deseja excluir esta vaga?')"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="pagination">
                <small id="paginacaoInfo">Mostrando <?= count($vagas) ?> de <?= count($vagas) ?> vagas</small>
                <div class="pag-btns">
                    <button class="pag-btn active">1</button>
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div><!-- /content -->
</div><!-- /main -->

<script>
function filtrarTabela() {
    const termo = document.getElementById('searchInput').value.toLowerCase();
    const linhas = document.querySelectorAll('#vagasTable tbody tr');
    let visiveis = 0;
    linhas.forEach(tr => {
        const txt = tr.innerText.toLowerCase();
        const ok = txt.includes(termo);
        tr.classList.toggle('hidden', !ok);
        if (ok) visiveis++;
    });
    document.getElementById('totalCount').textContent = visiveis + ' vagas encontradas';
}

let filtroModalidadeAtivo = 'todos';
let filtroModeloAtivo = '';

function filtrarModalidade(valor, btn) {
    filtroModalidadeAtivo = valor;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    aplicarFiltros();
}

function filtrarModelo(valor) {
    filtroModeloAtivo = valor.toLowerCase();
    aplicarFiltros();
}

function aplicarFiltros() {
    const linhas = document.querySelectorAll('#vagasTable tbody tr');
    let visiveis = 0;
    linhas.forEach(tr => {
        const mod   = tr.dataset.modalidade || '';
        const model = (tr.dataset.modelo || '').toLowerCase();
        const okMod   = filtroModalidadeAtivo === 'todos' || mod.includes(filtroModalidadeAtivo);
        const okModel = filtroModeloAtivo === '' || model.includes(filtroModeloAtivo);
        const ok = okMod && okModel;
        tr.classList.toggle('hidden', !ok);
        if (ok) visiveis++;
    });
    document.getElementById('totalCount').textContent = visiveis + ' vagas encontradas';
    document.getElementById('paginacaoInfo').textContent = 'Mostrando ' + visiveis + ' vagas';
}
</script>
</body>
</html>