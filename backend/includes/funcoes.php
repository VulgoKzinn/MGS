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
                    $_SESSION['id_login'] = $dados['id'];
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
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION['sistema'] != 'sis_login') {
        header('Location: index.php');
    }

    if ($_SESSION['s_temp'] == 1) {
        header('Location: reset.php');
    }
}

function validaEmpresa()
{
    if (!isset($_SESSION['id_nivel']) || $_SESSION['id_nivel'] != 1) {
        header('Location: pag_inicial.php');
        exit;
    }
}

function validaUsuario()
{
    if (!isset($_SESSION['id_nivel']) || $_SESSION['id_nivel'] != 2) {
        header('Location: pag_inicial_empresa.php');
        exit;
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

        $idUsuario = $_SESSION['id_login'];
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

    //define a pasta para upload
    $pasta = "assets/img/empresa/uploads/";

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

    //faz o upload da imagem
    move_uploaded_file($imagem['tmp_name'], $pasta . $nomeUpload);

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
        $sql = "SELECT tb_vagas.*,
        tb_img_vaga.imagem
        FROM tb_vagas
        INNER JOIN tb_img_vaga ON tb_vagas.id = tb_img_vaga.id_vaga";

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

// =============================================Atualiza os dados da Vaga(EDITAR)======================================
function atualizarVaga($vaga, $area_atuacao, $modalidade, $localizacao, $descricao, $requisitos, $salario, $beneficio, $carga_horaria, $modelo_de_trabalho, $id)
{
    try {
        global $conexao;

        $sql = "UPDATE tb_vaga SET
        vaga = :vaga,
        area_atuacao = :area_atuacao,
        modalidade = :modalidade,
        localizacao = :localizacao,
        descricao = :descricao,
        requisitos = :requisitos,
        salario = :salario,
        beneficio = :beneficio,
        carga_horaria = :carga_horaria,
        modelo_de_trabalho = :modelo_de_trabalho
        WHERE id = :id";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':vaga', $vaga);
        $comando->bindValue(':area_atuacao', $area_atuacao);
        $comando->bindValue(':modalidade', $modalidade);
        $comando->bindValue(':localizacao', $localizacao);
        $comando->bindValue(':descricao', $descricao);
        $comando->bindValue(':requisitos', $requisitos);
        $comando->bindValue(':salario', $salario);
        $comando->bindValue(':beneficio', $beneficio);
        $comando->bindValue(':carga_horaria', $carga_horaria);
        $comando->bindValue(':modelo_de_trabalho', $modelo_de_trabalho);
        $comando->bindValue(':id', $id);

        $comando->execute();

        return "Dados atualizados com sucesso!";
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao atualizar!";
    }

    $conexao = null;
}
// =============================================Atualiza os dados da Vaga(EDITAR)======================================

// =============================================Atualiza a Imagem da Vaga(EDITAR)======================================
function atualizarImagemVaga($idVaga, $nomeImagemUpload)
{
    try {
        global $conexao;
        $sql = "UPDATE tb_img_vaga SET imagem= :nomeImagemUpload WHERE
        id_vaga = ;idVaga";

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
// =============================================Atualiza a Imagem da Vaga(EDITAR)======================================


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
// ============================================Lista Atuacao============================================
function VagasDisponiveis()
{
    try {
        global $conexao; 

        $sql = "SELECT 
                    tb_vagas.*, 
                    tb_empresa.nome_fantasia
                FROM tb_vagas
                INNER JOIN tb_empresa 
                ON tb_vagas.id_empresa = tb_empresa.id";

        $comando = $conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $err) {
        error_log($err->getMessage());
        echo $err->getMessage();

        return "Erro ao Listar vagas";
    }
}
// ============================================Lista Atuacao============================================


// ===========================================Cadastrar Candidato=======================================================
function cadastrarCandidato($nome, $email, $telefone, $endereco, $sobre, $cargo, $experiencia, $projeto, $certificado)
{
    try {
        global $conexao;
        $sql = "INSERT INTO tb_perfil_candidato (nome, email, telefone, endereco, sobre, cargo, experiencia, projeto, certificado) 
                VALUES (:nome, :email, :telefone, :endereco, :sobre, :cargo, :experiencia, :projeto, :certificado)";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':nome', $nome);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':telefone', $telefone);
        $comando->bindValue(':endereco', $endereco);
        $comando->bindValue(':sobre', $sobre);
        $comando->bindValue(':cargo', $cargo);
        $comando->bindValue(':experiencia', $experiencia);
        $comando->bindValue(':projeto', $projeto);
        $comando->bindValue(':certificado', $certificado);

        $comando->execute();
        return $conexao->lastInsertId();
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return "Erro ao cadastrar";
    }
}

// ===========================================Cadastrar Foto Perfil=======================================================
function cadastrarFotoPerfil($idCandidato, $nomeFotoPerfil)
{
    try {
        global $conexao;

        // Atualiza a coluna id_foto_perfil na tabela tb_perfil_candidato
        $sql = "UPDATE tb_perfil_candidato SET id_foto_perfil = :foto WHERE id = :id";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':foto', $nomeFotoPerfil);
        $comando->bindValue(':id', $idCandidato);
        $comando->execute();

    } catch (PDOException $err) {
        error_log($err->getMessage());
    }
}

// ===========================================Cadastrar Foto Banner (Capa)=======================================================
function cadastrarFotoBanner($idCandidato, $nomeBanner)
{
    try {
        global $conexao;

        // Atualiza a coluna id_foto_banner na tabela tb_perfil_candidato
        $sql = "UPDATE tb_perfil_candidato SET id_foto_banner = :banner WHERE id = :id";

        $comando = $conexao->prepare($sql);
        $comando->bindValue(':banner', $nomeBanner);
        $comando->bindValue(':id', $idCandidato);
        $comando->execute();

    } catch (PDOException $err) {
        error_log($err->getMessage());
    }
}

function listarPerfilCandidato() {
    try {
        global $conexao;
        // Puxa todos os candidatos (ou você pode filtrar por ID se preferir)
        $sql = "SELECT * FROM tb_perfil_candidato";
        $comando = $conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        error_log($err->getMessage());
        return [];
    }
}
// Função para buscar UM candidato pelo ID (para preencher o formulário de edição)
function listaCandidatoId($id) {
    try {
        global $conexao;
        $sql = "SELECT * FROM tb_perfil_candidato WHERE id = :id";
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':id', $id);
        $comando->execute();
        return $comando->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $err) {
        return [];
    }
}

// Função para dar o UPDATE nos dados
function atualizarCandidato($id, $nome, $email, $telefone, $endereco, $sobre, $cargo, $experiencia, $projeto, $certificado) {
    try {
        global $conexao;
        $sql = "UPDATE tb_perfil_candidato SET 
                nome = :nome, email = :email, telefone = :telefone, endereco = :endereco, 
                sobre = :sobre, cargo = :cargo, experiencia = :experiencia, 
                projeto = :projeto, certificado = :certificado 
                WHERE id = :id";
        
        $comando = $conexao->prepare($sql);
        $comando->bindValue(':nome', $nome);
        $comando->bindValue(':email', $email);
        $comando->bindValue(':telefone', $telefone);
        $comando->bindValue(':endereco', $endereco);
        $comando->bindValue(':sobre', $sobre);
        $comando->bindValue(':cargo', $cargo);
        $comando->bindValue(':experiencia', $experiencia);
        $comando->bindValue(':projeto', $projeto);
        $comando->bindValue(':certificado', $certificado);
        $comando->bindValue(':id', $id);
        
        return $comando->execute();
    } catch (PDOException $err) {
        return false;
    }
}