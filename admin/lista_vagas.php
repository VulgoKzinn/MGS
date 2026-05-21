<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
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
   <link rel="stylesheet" href="templates/dashboard.css">
</head>
<body>


<?php include_once "templates/header.php" ?>

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
                                <img class="vaga-img" src="../assets/img/empresa/uploads/<?= htmlspecialchars($v['imagem_vaga']) ?>" alt="">
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