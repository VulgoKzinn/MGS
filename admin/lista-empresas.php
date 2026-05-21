<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
validaAcesso();

// ===== Função auxiliar do seu sistema =====
function iniciais($email) {
    $partes = explode('@', $email);
    $nome = explode('.', $partes[0]);
    $ini = strtoupper(substr($nome[0], 0, 1));
    $ini .= isset($nome[1]) ? strtoupper(substr($nome[1], 0, 1)) : strtoupper(substr($partes[0], 1, 1));
    return $ini;
}

// Busca as empresas cadastradas através da função do backend
$empresas = listarEmpresas();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS Matchwork — Empresas Cadastradas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<div class="dash-wrapper">

    <?php include_once "templates/header.php"; ?>

    <div class="dash-main">
        <div class="dash-topbar">
            <div class="topbar-title">Gerenciamento de Empresas</div>
        </div>

        <div class="dash-content">
            
            <div class="mb-4">
                <h2 class="fw-bold" style="color:#2D1B69; font-size:20px;">Empresas Parceiras</h2>
                <p class="mb-0" style="color:#7B6FA8; font-size:13px;">Relação de todas as empresas integradas à plataforma MGS Matchwork</p>
            </div>

            <div class="row g-3">
                <div class="col-12">
                    <div class="dash-card">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="dash-card-title">
                                <i class="fa-solid fa-building text-success me-2"></i>Total de Empresas (<?php echo count($empresas); ?>)
                            </div>
                        </div>
                        
                        <table class="dash-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome Fantasia / E-mail</th>
                                    <th>Razão Social</th>
                                    <th>CNPJ</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($empresas)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center" style="color: #9E86C8; padding: 20px;">
                                            Nenhuma empresa cadastrada no sistema.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($empresas as $emp): 
                                        $ini = iniciais($emp['email']);
                                        $statusClass = $emp['ativo'] == 1 ? 'pill-active' : 'pill-blocked';
                                        $statusTxt = $emp['ativo'] == 1 ? 'Ativa' : 'Bloqueada';
                                    ?>
                                    <tr>
                                        <td style="color:#9E86C8; font-weight: 700;">#<?php echo $emp['id']; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="av green"><?php echo $ini; ?></div>
                                                <div>
                                                    <span class="td-name d-block"><?php echo htmlspecialchars($emp['nome_fantasia']); ?></span>
                                                    <small class="text-muted" style="font-size: 11px;"><?php echo htmlspecialchars($emp['email']); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="color:#2D1B69; font-weight: 500;"><?php echo htmlspecialchars($emp['rzsocial']); ?></td>
                                        <td style="color:#9E86C8;"><?php echo htmlspecialchars($emp['cnpj']); ?></td>
                                        <td style="color:#2D1B69;"><?php echo htmlspecialchars($emp['telefone']); ?></td>
                                        <td>
                                            <span class="pill <?php echo $statusClass; ?>">
                                                <?php echo $statusTxt; ?>
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