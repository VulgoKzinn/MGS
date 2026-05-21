<?php
try{
    define("SERVIDOR","10.97.46.104");
    define("USUARIO","admin");
    define("SENHA","admin");
    define("BANCO","db_mgs");
    // define("PORTA","");
    // ;port=".PORTA."

    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8mb4",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "deu bom";
}catch(PDOException $err){
    echo "Erro ao conectar no banco de dados".$err->getMessage();
}
?>