<?php
require_once('backend/config/conexao.php');
require_once('envia-email.php');

function login($email, $senha)
{
    try {
        global $conexao;

        $sql = "SELECT id,email,senha,ativo,s_temp,id_nivel FROM tb_login WHERE email=:email";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);

        $comando->execute();
        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            $senhaHashBanco = $dados['senha'];
            if (password_verify($senha, $senhaHashBanco)) {

                if ($dados['ativo'] == 0) {
                    return "Usuário bloqueado, entre em contato com o suporte!";
                } else {

                    // Usuario correto e sem bloqueio algum, continua no login
                    session_start();

                    // guarda o s_temp (senha temporario) 
                    $_SESSION['id'] = $dados['id'];
                    // guarda o s_temp (senha temporario) 
                    $_SESSION['sistema'] = 'sis_login';
                    // guarda o email 
                    $_SESSION['email'] = $dados['email'];
                    // guarda o id_nivel (se é admin ou user) 
                    $_SESSION['id_nivel'] = $dados['id_nivel'];
                    // guarda o s_temp (senha temporario) 
                    $_SESSION['s_temp'] = $dados['s_temp'];

                    if ($dados['s_temp'] == 0) {
                        // redirecionar para painel admin
                        header('location: pag_inicial.php');
                    } else {
                        header('Location: reset.php');
                    }
                }
            } else {
                return 'Usuário ou senha inválido!';
            }
        } else {
            // email ou senha incorreto
            return "Dados inválidos, tente novamente!";
        }
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao validar os dados";
    }
}

function validaAcesso()
{
    session_start();

    if ($_SESSION['sistema'] != 'sis_login') {
        header('Location: index.php');
    }

    if ($_SESSION['s_temp'] == 1) {
        header('Location: reset.php');
    }
}

function validaEmpresa($id_nivel)
{
    if ($id_nivel == 1) {
        header('Location: pag_inicial_empresa.php');
    }
}

function validaUsuario($id_nivel)
{
    if ($id_nivel == 2) {
        header('Location: pag_inicial.php');
    }
}

function recuperarSenha($email)
{
    try {
        global $conexao;

        $sql = "SELECT id,email,ativo FROM tb_login WHERE email=:email";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);

        $comando->execute();
        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            if ($dados['ativo'] == 0) {
                return "Conta bloqueada, entre em contato com o suporte";
            } else {
                $senha_temp = uniqid();
                $senha_hash = password_hash($senha_temp, PASSWORD_ARGON2ID);

                $sql = "UPDATE tb_login SET senha = :senha_temp, s_temp = :s_temp WHERE id = :id";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(':senha_temp', $senha_hash);
                $comando->bindValue(':id', $dados['id']);
                $comando->bindValue(':s_temp', 1);

                $comando->execute();
                $dados = $comando->fetch(PDO::FETCH_ASSOC);

                return enviaEmail($email, $senha_temp);
            }
        } else {
            return "Caso tenha uma conta com o e-mail informado, verifique sua caixa e siga as etapas para recuperação de senha!";
        }
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao validar os dados";
    }
}

function novaSenha($senha)
{
    try {
        global $conexao;

        $idUsuario = $_SESSION['id'];
        $sql = "UPDATE tb_login SET senha=:senha, s_temp=0 WHERE id=:id";

        $senha_hash = password_hash($senha, PASSWORD_ARGON2ID);

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':senha', $senha_hash);
        $comando->bindValue(':id', $idUsuario);
        $comando->execute();

        logout();
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao validar os dados";
    }
}

function logout()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION = [];

    session_destroy();

    header('Location: login.php');
    exit;
}

function validaEmail($email, $senha, $empresa)
{
    try {
        global $conexao;

        $sql = "SELECT email,ativo FROM tb_login WHERE email=:email";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);

        $comando->execute();
        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            return "E-mail já existe!";
        } else {
            criarConta($email, $senha,$empresa);
        }
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao validar os dados!";
    }
}

function criarConta($email, $senha, $empresa)
{
    global $conexao;

    try {
        $sql = "INSERT INTO tb_login (email,senha,id_nivel) VALUES (:email,:senha,:id_nivel)";

        $senhaHash = password_hash($senha, PASSWORD_ARGON2ID);

        // var_dump($empresa);
        // exit;

        if($empresa == null){
            $empresa = 2;
        }else{
            $empresa = 1;
        }
        // var_dump ($empresa);
        // exit;
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':senha', $senhaHash);
        $comando->bindValue(':id_nivel', $empresa);
        $comando->execute();

        return "E-mail cadastrado com sucesso!";
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao cadastrar usuario!";
    }
}
