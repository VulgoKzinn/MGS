<?php
require_once('conexao.php');
require_once('envia-email.php');

function login($email, $senha)
{
    try {
        global $conexao;

        $sql = "SELECT id,email,ativo,id_nivel,s_temp FROM tb_login WHERE email=:email AND BINARY senha=:senha";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':senha', $senha);

        $comando->execute();
        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            if ($dados['ativo'] == 0) {
                return "Usuário bloqueado, entre em contato com o suporte!";
            } else {

                // Usuario correto e sem bloqueio algum, continua no login
                session_start();

                $_SESSION['id'] = $dados['id'];
                $_SESSION['sistema'] = 'sis_login';
                $_SESSION['email'] = $dados['email'];
                $_SESSION['id_nivel'] = $dados['id_nivel'];

                if ($dados['s_temp'] == 0) {
                    header('location: admin/dashboard.php');
                } else {
                    header('Location: usuario/nova-senha.php');
                }
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
        header('Location: ../');
    }
}

function validaAdmin($id_nivel)
{
    if ($id_nivel != 1) {
        header('Location: ../usuario/perfil.php');
    }
}

function logout()
{
    session_start();
    $_SESSION = [];
    session_destroy();

    header('Location: index.php');
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
                $sql = "UPDATE tb_login SET senha = :senha_temp, s_temp = :s_temp WHERE id = :id";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(':senha_temp', $senha_temp);
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

        $sql = "SELECT id,senha,s_temp FROM tb_login WHERE senha=:senha";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':senha', $senha);

        $comando->execute();
        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            if ($dados['s_temp'] == 0) {
                $sql = "UPDATE tb_login SET senha = :senha WHERE id = :id";

                $comando = $conexao->prepare($sql);
                $comando->bindValue(':senha', $senha);
                $comando->bindValue(':id', $dados['id']);
                $comando->bindValue(':s_temp', 1);

                $comando->execute();
                $dados = $comando->fetch(PDO::FETCH_ASSOC);
            } else {
            return "Sua senha não é temporaria!";
        }
        } else {
            return "Deu bom não :(";
        }
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao validar os dados";
    }
}