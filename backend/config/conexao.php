<?php
try{
    define("SERVIDOR","localhost");
    define("USUARIO","root");
    define("SENHA","");
    define("BANCO","db_mgs");
    define("PORTA","3309");

    $conexao = new PDO("mysql:host=".SERVIDOR.";port=".PORTA.";dbname=".BANCO.";charset=utf8mb4",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "deu bom";
}catch(PDOException $err){
    echo "Erro ao conectar no banco de dados".$err->getMessage();
}
?>