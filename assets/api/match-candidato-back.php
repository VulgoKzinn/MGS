<?php

session_start();

require_once __DIR__ . "/../../backend/config/conexaoTST.php";

header('Content-Type: application/json');

try {

    if (!isset($_SESSION['id_login'])) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Usuário não autenticado'
        ]);

        exit;
    }

    if (!isset($_POST['id_vaga'])) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Vaga não enviada'
        ]);

        exit;
    }

    if (!isset($_POST['acao'])) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Ação não enviada'
        ]);

        exit;
    }

    $idUsuario = $_SESSION['id_login'];

    $idVaga = $_POST['id_vaga'];

    $acao = $_POST['acao'];



    // =========================================
    // MATCH
    // =========================================

    if ($acao == 'match') {

        $sql = "
            SELECT id
            FROM tb_match
            WHERE id_usuario = :id_usuario
            AND id_vaga = :id_vaga
        ";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':id_usuario', $idUsuario);
        $comando->bindValue(':id_vaga', $idVaga);

        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados) {

            echo json_encode([
                'status' => 'error',
                'message' => 'Você já deu match nessa vaga'
            ]);

            exit;
        }

        $sql = "
            INSERT INTO tb_match (
                id_usuario,
                id_vaga
            ) VALUES (
                :id_usuario,
                :id_vaga
            )
        ";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':id_usuario', $idUsuario);
        $comando->bindValue(':id_vaga', $idVaga);

        $comando->execute();

        echo json_encode([
            'status' => 'success',
            'message' => 'Match realizado com sucesso!'
        ]);

        exit;
    }



    // =========================================
    // REJEITAR
    // =========================================

    if ($acao == 'rejeitar') {

        $sql = "
            SELECT id
            FROM tb_vaga_rejeitada
            WHERE id_usuario = :id_usuario
            AND id_vaga = :id_vaga
        ";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':id_usuario', $idUsuario);
        $comando->bindValue(':id_vaga', $idVaga);

        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados) {

            echo json_encode([
                'status' => 'error',
                'message' => 'Você já rejeitou essa vaga'
            ]);

            exit;
        }

        $sql = "
            INSERT INTO tb_vaga_rejeitada (
                id_usuario,
                id_vaga
            ) VALUES (
                :id_usuario,
                :id_vaga
            )
        ";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':id_usuario', $idUsuario);
        $comando->bindValue(':id_vaga', $idVaga);

        $comando->execute();

        echo json_encode([
            'status' => 'success',
            'message' => 'Vaga rejeitada com sucesso'
        ]);

        exit;
    }

} catch (PDOException $erro) {

    echo json_encode([
        'status' => 'error',
        'message' => $erro->getMessage()
    ]);
}