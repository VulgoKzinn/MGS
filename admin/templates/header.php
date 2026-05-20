<?php
// ===== TOTAL VAGAS (tb_vagas) =====
$totalVagas = $conexao->query("SELECT COUNT(*) FROM tb_vagas")->fetchColumn();

// ===== TOTAL CHAMADOS (tb_suporte) =====
$totalAbertos  = $conexao->query("SELECT COUNT(*) FROM tb_suporte WHERE ativo = 1")->fetchColumn();
?>
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

<!-- ========== SIDEBAR ========== -->
    <aside class="dash-sidebar">
        <div class="sidebar-logo">
            <img src="../assets/img/logomaior.png" alt="MGS">
            <div class="sidebar-logo-text">MGS <small>Matchwork Admin</small></div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Principal</div>
            <a href="dashboard.php"      class="sidebar-item active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="../"          class="sidebar-item"><i class="fa-solid fa-house"></i> Início</a>
            <a href="lista_vagas.php"    class="sidebar-item"><i class="fa-solid fa-briefcase"></i> Vagas <span class="sidebar-badge"><?php echo $totalVagas; ?></span></a>
            <a href="lista-usuarios.php" class="sidebar-item"><i class="fa-solid fa-users"></i> Usuários</a>
            <a href="lista-empresas.php" class="sidebar-item"><i class="fa-solid fa-building"></i> Empresas</a>
            

            <div class="sidebar-section">Suporte</div>
            <a href="../global/lista_suporte.php"  class="sidebar-item"><i class="fa-solid fa-comment-dots"></i> Chamados <span class="sidebar-badge"><?php echo $totalAbertos; ?></span></a>
            <a href="cadastrar-planos.php"         class="sidebar-item"><i class="fa-solid fa-star"></i> Planos</a>

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