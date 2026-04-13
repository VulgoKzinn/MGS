<?php
require_once "backend/includes/funcoes.php";
// ===============================================DELETAR/ATIVO/INATIVO====================================================
$acao = $_GET['acao'] ?? null;
$id = $_GET['id'] ?? null;

if ($acao == 'deletar' && $id) {
    deletarChamado($id);
}

if ($acao == 'status' && $id) {
    ativoEinativo($id);
}

// ============================================Lista Chamado============================================
$listachamados = listachamado();
// ============================================Lista Chamado============================================
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGS |Lista-Suporte</title>

    <?php require_once 'assets/templates/head.php'; ?>
</head>

<body id="cadastroCand">

    <!-- LOGO -->
    <div id="ImgLogon" class="text-center my-4">
        <a href="index.php">
            <img src="assets/img/Logomaior.png" alt="Logo">
        </a>
    </div>

    <!-- CONTEÚDO -->
    <main id="CadCand" class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 col-lg-10">

                <table class="table table-hover table-bordered align-middle text-center shadow-sm">

                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Descricao</th>
                            <th>Data de Notificação</th>
                            <th>Em Aberto</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($listachamados as $listachamado): ?>

                            <tr>

                                <td><?= $listachamado['id']; ?></td>

                                <td class="fw-semibold">
                                    <?= $listachamado['nome']; ?>
                                </td>

                                <td>
                                    <span class="badge bg-primary">
                                        <?= $listachamado['email']; ?>
                                    </span>
                                </td>

                                <td>
                                    <?=($listachamado['descricao']) ?>
                                </td>

                                <td>
                                    <?= date('d/m/Y', strtotime($listachamado['data_cadastro'])); ?>
                                </td>

                                <td>

                                    <?php if ($listachamado['ativo'] == 1): ?>

                                        <span class="badge bg-success">Em aberto</span>

                                    <?php else: ?>

                                        <span class="badge bg-danger">Encerrado</span>

                                    <?php endif; ?>

                                </td>

                                <td>
                                    <a href="lista_suporte.php?acao=deletar&id=<?= $listachamado['id']; ?>"
                                        class="btn btn-sm btn-secondary"
                                        onclick="return confirm('Deseja excluir?')">
                                        <p>Apagar</p>
                                    </a>

                                    <a href="lista_suporte.php?acao=status&id=<?= $listachamado['id']; ?>">
                                        <?php if ($listachamado['ativo'] == 1): ?>
                                            <button class="btn btn-sm btn-success">
                                                <p>Em Aberto</p>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-danger">
                                                <p>Encerrado</p>
                                            </button>
                                        <?php endif; ?>
                                    </a>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </main>

    <!-- JS -->
    <?php require_once 'assets/templates/js.php'; ?>

</body>

</html>