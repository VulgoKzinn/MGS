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

        $sql = "SELECT email FROM tb_login WHERE email = :email";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);
        $comando->execute();

        $dados = $comando->fetch(PDO::FETCH_ASSOC);

        if ($dados != null) {
            return "E-mail já existe!";
        } else {
            return criarConta($email, $senha, $empresa);
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

        if ($empresa == null) {
            $empresa = 2;
        } else {
            $empresa = 1;
        }
        // var_dump ($empresa);
        // exit;
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':senha', $senhaHash);
        $comando->bindValue(':id_nivel', $empresa);
        $comando->execute();
        return $conexao->lastInsertId();

      
        
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao cadastrar usuario!";
    }
}
function suporte($nome, $email, $descricao)
{
    global $conexao;

    try {
        $sql = "INSERT INTO tb_suporte 
            (nome,email,descricao) 
            VALUES (:nome,:email,:descricao)";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':nome', $nome);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':descricao', $descricao);
        $comando->execute();

        return "Mensagem enviada com sucesso, em breve entraremos em contato";
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao enviar mensagem";
    }
}
// ===========================================Ativar e inaivar=======================================================
function ativoEinativo($id)
{
    try {
        global $conexao;
        $sql = "UPDATE tb_suporte
        SET ativo = NOT ativo
        WHERE id = :id";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':id', $id);
        $comando->execute();
        header("Location:lista_suporte.php");
    } catch (PDOException $err) {
        error_log($err->getMessage());
    }
}
// ===========================================Ativar e inaivar=======================================================
function deletarChamado($id)
{
    try {

        global $conexao;
        $sql = "DELETE FROM tb_suporte WHERE id = :id";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':id', $id);
        $comando->execute();

        header("Location: lista_suporte.php");
    } catch (PDOException $err) {

        echo $err->getMessage(); // mostre o erro real
        error_log($err->getMessage());
    }
}
// ============================================Lista Chamado============================================
function listachamado()
{
    try {
        global $conexao;

        $sql = "SELECT * FROM tb_suporte";

        $comando = $conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        error_log($err->getMessage());
        echo $err->getMessage();

        return "Erro ao listar";
    }
}
// ============================================Lista Chamado============================================

// ===========================================Cadastrar Vaga=======================================================
function cadastrarVaga($vaga, $area_atuacao, $modalidade, $modelo_de_trabalho, $localizacao, $salario, $beneficio, $carga_horaria, $descricao, $requisitos)

{
    try {
        global $conexao;

        $sql = "INSERT INTO tb_vagas(vaga,area_atuacao,modalidade,modelo_de_trabalho,localizacao,salario,beneficio,carga_horaria,descricao,requisitos)VALUES(:vaga,:area_atuacao,:modalidade,:modelo_de_trabalho,:localizacao,:salario,:beneficio,:carga_horaria,:descricao,:requisitos)";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':vaga', $vaga);
        $comando->bindValue(':area_atuacao', $area_atuacao);
        $comando->bindValue(':modalidade', $modalidade);
        $comando->bindValue(':modelo_de_trabalho', $modelo_de_trabalho);
        $comando->bindValue(':localizacao', $localizacao);
        $comando->bindValue(':salario', $salario);
        $comando->bindValue(':beneficio', $beneficio);
        $comando->bindValue(':carga_horaria', $carga_horaria);
        $comando->bindValue(':descricao', $descricao);
        $comando->bindValue(':requisitos', $requisitos);

        $comando->execute();

        //retorna o id do insert do produto acima
        return $conexao->lastInsertId();

        header('Location: cadastro-vaga.php');
    } catch (PDOException $err) {
        error_log($err->getMessage());
        //echo $err->getMessage();
        return "Erro ao cadastrar";
    }

    $conexao = null;
}

// ===========================================Função upload imagem=======================================================
function uploadImagem($imagem)
{
    $pasta = "assets/img/empresa/uploads/";

    // Verifica erro no upload
    if ($imagem['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    // Limite de tamanho (ex: 2MB)
    if ($imagem['size'] > 2 * 1024 * 1024) {
        return false;
    }

    // Tipos permitidos
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];

    if (!in_array($imagem['type'], $tiposPermitidos)) {
        return false;
    }

    // Garante que é imagem real
    $check = getimagesize($imagem['tmp_name']);
    if ($check === false) {
        return false;
    }

    // Pega extensão
    $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));

    // Nome seguro
    $nomeUpload = md5(uniqid()) . '.' . $extensao;

    // Move arquivo
    if (!move_uploaded_file($imagem['tmp_name'], $pasta . $nomeUpload)) {
        return false;
    }

    return $nomeUpload;
}

// ===========================================Cadastrar Imagem Vaga=======================================================
function cadastrarImagemVaga($idVaga, $nomeImagemUpload)
{
    try {
        global $conexao;
        $sql = "INSERT INTO tb_img_vaga(imagem,id_vaga)VALUES(:nomeImagemUpload,:idVaga)";

        $comando = $conexao->prepare($sql);

        $comando->bindValue(':nomeImagemUpload', $nomeImagemUpload);
        $comando->bindValue(':idVaga', $idVaga);
        $comando->execute();

        header('Location: perfil-empresa.php');
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao cadastrar";
    }
}

// ===========================================Lista as Vagas=======================================================
function listaVaga()
{

    try {
        global $conexao;
        $sql = "SELECT * FROM tb_vagas";

        $comando = $conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Não foi possível listar a vaga";
    }
    // ANULA A CONEXAO COM O BANCO
    $conexao = null;
}

// ===========================================Traz informações da Vaga=======================================================
function listaVagaId($idVaga)
{

    try {
        global $conexao;
        $sql = "SELECT * FROM tb_vagas WHERE id = :idVaga";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':idVaga', $idVaga);
        $comando->execute();
        return $comando->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao conectar no banco de dados";
    }
}

// ===========================================Traz informações da Vaga=======================================================
function deletarVaga($id)
{
    try {
    } catch (\Throwable $th) {
    }
}
// ============================================Lista Atuacao============================================
function listaAtuacao()
{
    try {
        global $conexao;
        $sql = "SELECT * FROM tb_ramoatuacao";

        $comando = $conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        error_log($err->getMessage());
        echo $err->getMessage();

        return "Erro ao listar";
    }
}
// ============================================Lista Atuacao============================================
// =============================================Cadastro de Empresa======================================
function cadastrarEmpresa($dados, $id_login)

{
    global $conexao;
    $sql = "SELECT id FROM tb_empresa WHERE id_login = :id_login";
    $checkLogin = $conexao->prepare($sql);
    $checkLogin->bindValue(':id_login', $id_login);
    $checkLogin->execute();

    if ($checkLogin->fetch()) {
        return "Este login já possui uma empresa cadastrada!";
    }

    $sql = "SELECT id FROM tb_empresa WHERE cnpj = :cnpj";
    $checkCnpj = $conexao->prepare($sql);
    $checkCnpj->bindValue(':cnpj', $dados['cnpj']);
    $checkCnpj->execute();

    if ($checkCnpj->fetch()) {
        return "CNPJ já cadastrado!";
    }

    $sql = "INSERT INTO tb_empresa 
        (id_login, rzsocial, telefone, complemento, cnpj, cep, atuacao, numero, nome_fantasia) VALUES (:id_login, :razao, :telefone, :complemento, :cnpj, :cep, :ramo, :numero, :nome_fantasia)";

    $comando = $conexao->prepare($sql);

    $comando->bindValue(':id_login', $id_login);
    $comando->bindValue(':razao', $dados['razao']);
    $comando->bindValue(':telefone', $dados['telefoneEmp']);
    $comando->bindValue(':complemento', $dados['complementoEmp']);
    $comando->bindValue(':cnpj', $dados['cnpj']);
    $comando->bindValue(':cep', $dados['cepEmp']);
    $comando->bindValue(':ramo', $dados['ramo']);
    $comando->bindValue(':numero', $dados['numeroEmp']);
    $comando->bindValue(':nome_fantasia', $dados['nomeFantasia']);

    if ($comando->execute()) {
        return "sucesso";
    } else {
        return "Erro ao cadastrar empresa!";
    }
}

    // =============================================Cadastro de Empresa======================================


