<?php
try{
    define("SERVIDOR","26.179.55.6");
    define("USUARIO","admin");
    define("SENHA","admin");
    define("BANCO","db_mgs");

    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8mb4",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "deu bom";
}catch(PDOException $err){
    echo "Erro ao conectar no banco de dados".$err->getMessage();
}
?>