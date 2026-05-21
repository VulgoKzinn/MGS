<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
validaAcesso();

// ===== Função auxiliar copiada do seu dashboard original =====
function iniciais($email) {
    $partes = explode('@', $email);
    $nome = explode('.', $partes[0]);
    $ini = strtoupper(substr($nome[0], 0, 1));
    $ini .= isset($nome[1]) ? strtoupper(substr($nome[1], 0, 1)) : strtoupper(substr($partes[0], 1, 1));
    return $ini;
}

// Busca os matches tratados pela função
$matches = listarMatches();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS Matchwork — Matches Realizados</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="templates/dashboard.css">
</head>
<body>

<div class="dash-wrapper">

    <?php include_once "templates/header.php"; ?>

    <div class="dash-main">
        <div class="dash-topbar">
            <div class="topbar-title">Matches de Contratação</div>
        </div>

        <div class="dash-content">
            
            <div class="mb-4">
                <h2 class="fw-bold" style="color:#2D1B69; font-size:20px;">Matches do Sistema</h2>
                <p class="mb-0" style="color:#7B6FA8; font-size:13px;">Relação de conexões bem-sucedidas entre candidatos e vagas</p>
            </div>

            <div class="row g-3">
                <div class="col-12">
                    <div class="dash-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">
                                <i class="fa-solid fa-heart text-danger me-2"></i>Todos os Matches (<?php echo count($matches); ?>)
                            </div>
                        </div>
                        
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Candidato (Usuário)</th>
                                    <th>Vaga Conectada</th>
                                    <th>Empresa</th>
                                    <th>Data / Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($matches)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center" style="color: #9E86C8; padding: 20px;">
                                            Nenhum match realizado até o momento.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($matches as $m): 
                                        $ini = iniciais($m['usuario_email']);
                                        $dataFmt = date('d/m/Y H:i', strtotime($m['data_match']));
                                    ?>
                                    <tr>
                                        <td style="color:#9E86C8; font-weight: 700;">#<?php echo $m['id']; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="av"><?php echo $ini; ?></div>
                                                <span class="td-name" title="<?php echo htmlspecialchars($m['usuario_email']); ?>">
                                                    <?php echo htmlspecialchars($m['usuario_email']); ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="fw-bold" style="color:#2D1B69;"><?php echo htmlspecialchars($m['vaga_titulo']); ?></td>
                                        <td style="color:#9E86C8;"><?php echo htmlspecialchars($m['empresa_nome']); ?></td>
                                        <td>
                                            <span class="pill pill-active" style="font-size: 11px; background-color: #E8F5E9; color: #2E7D32; padding: 4px 8px; border-radius: 12px;">
                                                <i class="fa-regular fa-calendar-days me-1"></i><?php echo $dataFmt; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div></div></div><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>