<?php
require_once "backend/includes/funcoes.php";

//função que lista as vagas
$vagas = listaVaga();

//variavel de controle
$operacao = '';

if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
    //captura o id para edição
    $idVaga = $_GET['id'];

    $dadosEditar = listaVagaId($idVaga);

    //ativa o modo editar
    $operacao = 'editar';
}

if(isset($_POST['editar'])){
    $vaga =filter_input(INPUT_POST,'vaga');
    $area_atuacao =filter_input(INPUT_POST,'area_atuacao');
    $modalidade =filter_input(INPUT_POST,'modalidade');
    $localizacao =filter_input(INPUT_POST,'localizacao');
    $descricao =filter_input(INPUT_POST,'descricao');
    $requisitos =filter_input(INPUT_POST,'requisitos');
    $salario =filter_input(INPUT_POST,'salario');
    $beneficio =filter_input(INPUT_POST,'beneficio');
    $carga_horaria =filter_input(INPUT_POST,'carga_horaria');
    $data_cadastro =filter_input(INPUT_POST,'data_cadastro');
    $modelo_de_trabalho =filter_input(INPUT_POST,'modelo_de_trabalho');
    $id =filter_input(INPUT_POST, 'id');

    $mensagem = atualizarVaga($vaga,$area_atuacao,$modalidade,$localizacao,$descricao,$requisitos,$salario,$beneficio,$carga_horaria,$data_cadastro,$modelo_de_trabalho,$id);

    //só realiza o upload e update se existir uma nova imagem
    if(!empty($_FILES['imagem']['name'])){
        //realiza o upload da imagem
        $nomeImagemUpload = uploadImagem($_FILES['imagem']);
        //atualiza o nome da imagem no banco de dados
        atualizarImagemVaga($id,$nomeImagemUpload);
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vaga</title>

    <?php require_once 'assets/templates/head.php'; ?>
</head>

<body id="cadastroCand">

    <!-- LOGO -->
    <div id="ImgLogon" class="text-center my-4">
        <a href="perfil-empresa.php">
            <img src="assets/img/Logomaior.png" alt="Logo">
        </a>
    </div>

    <!-- CONTEÚDO -->
    <main id="CadCand" class="container">
        <div class="row justify-content-center">



            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle text-center mb-0">

                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Vaga</th>
                                <th>Área de Atuação</th>
                                <th>Data de Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($vagas as $vaga): ?>

                                <tr>

                                    <td><?= $vaga['id']; ?></td>

                                    <td class="fw-semibold">
                                        <?= $vaga['vaga']; ?>
                                    </td>

                                    <td>
                                        <?= $vaga['area_atuacao']; ?>
                                    </td>

                                    <td>
                                        <?= date('d/m/Y', strtotime($vaga['data_cadastro'])); ?>
                                    </td>

                                    <td>
                                        <a href="produto-gerenciar.php?acao=editar&id=<?php echo $vaga['id']; ?>">
                                            <button type="button" class="btn btn-primary btn-dark  btn-sm mt-1 w-75">Editar</button>
                                        </a>

                                        <a href="produto-gerenciar.php?acao=deletar&id=<?php echo $vaga['id']; ?>">
                                            <button type="button" class="btn btn-secondary btn-danger  btn-sm mt-1  w-75" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
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