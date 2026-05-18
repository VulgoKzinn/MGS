<?php

function carregarEnv($caminho)
{
    if (!file_exists($caminho)) {
        return false;
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($linhas as $linha) {

        // Ignora comentários
        if (str_starts_with(trim($linha), '#')) {
            continue;
        }

        list($nome, $valor) = explode('=', $linha, 2);

        $_ENV[trim($nome)] = trim($valor);
    }

    return true;
}

carregarEnv(__DIR__ . '/.env');

try {

    $host = $_ENV['DB_HOST'];
    $porta = $_ENV['DB_PORT'];
    $banco = $_ENV['DB_NAME'];
    $usuario = $_ENV['DB_USER'];
    $senha = $_ENV['DB_PASSWORD'];

    $conexao = new PDO(
        "mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado com sucesso!";

} catch (PDOException $err) {

    echo "Erro ao conectar: " . $err->getMessage();

}
?>