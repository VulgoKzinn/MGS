<!-- KAUÃ -->
<?php
session_start(); // inicia a sessão
require_once __DIR__ . "/../backend/includes/funcoes.php";



$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = filter_input(INPUT_POST, 'email');

    $senha = filter_input(INPUT_POST, 'senha');

    $confirma = filter_input(INPUT_POST, 'confirma');

    $nome = filter_input(INPUT_POST, 'nome');

    $telefone = filter_input(INPUT_POST, 'telefone');

    $endereco = filter_input(INPUT_POST, 'endereco');

    $empresa = isset($_POST['empresa']) ? 1 : 0;

    if ($senha == '' || $confirma == '') {

        $mensagem = 'Preencha a senha!';
    } elseif ($senha !== $confirma) {

        $mensagem = 'Senhas não conferem!';
    } else {

        $retorno = validaEmail($email, $senha, $empresa);

        if (is_numeric($retorno)) {

            $id_login = $retorno;

            if ($empresa == 1) {

                $_SESSION['id_login'] = $id_login;

                header("Location: cadastro-empresa.php");
                exit;
            } else {

                cadastrarPerfilCandidato(
                    $id_login,
                    $nome,
                    $telefone,
                    $endereco
                );

                header("Location: login.php?finalizarCadastro=sucesso");    
                exit;
            }
        } else {

            $mensagem = $retorno;
        }
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro | Matchwork</title>
    <!-- Include Links -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php
    require_once __DIR__ . "/../assets/templates/head.php";
    ?>
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="../"><img src="../assets/img/Logomaior.png" alt="Logo"></a>
    </div>
    <!-- Formulário -->
    <main id="CadCand">
        <form action="" method="post" id="formCadastro" class="p-4 col-md-6 mx-auto">
            <h2 class="text-center mb-4">Crie sua Conta</h2>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="email@exemplo.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>

            <!-- Confirmar senha -->
            <div class="mb-3">
                <label class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" name="confirma" placeholder="Confirme sua senha" required>
            </div>

            <!-- Confir Empresa -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="empresa" id="empresa">
                <label class="form-check-label">
                    Perfil Empresarial
                </label>
            </div>

            <!-- Mensagem -->
            <?php if (!empty($mensagem)): ?>
                <div class="text-sm text-indigo-300 bg-indigo-900/20 border border-indigo-800 p-2 rounded">
                    <?= $mensagem; ?>
                </div>
            <?php endif; ?>

            <!-- Campos extras para realização do model para login -->
            <input type="hidden" name="nome" id="nome">
            <input type="hidden" name="telefone" id="telefone">
            <input type="hidden" name="endereco" id="endereco">

            <div class="text-end">
                <button type="submit" class="btn btn-success w-100" name="cadastrar">
                    Criar Conta
                </button>
            </div>
        </form>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="modalCadastro" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Complete seu cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control" id="modalNome">
                    </div>

                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="tel" class="form-control" id="modalTelefone" maxlength="15">
                    </div>

                    <div class="mb-3">
                        <label>Endereço</label>
                        <input type="text" class="form-control" id="modalEndereco">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-success" id="finalizarCadastro">
                        Finalizar Cadastro
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Include JS -->
    <?php
    require_once '../assets/templates/js.php';
    ?>

    <script>
        const form = document.getElementById("formCadastro");

        let modalPreenchido = false;

        form.addEventListener("submit", function(e) {

            const empresa = document.getElementById("empresa").checked;

            // Se NÃO for empresa
            if (!empresa && !modalPreenchido) {

                e.preventDefault();

                const modal = new bootstrap.Modal(
                    document.getElementById('modalCadastro')
                );

                modal.show();
            }

        });

        document.getElementById("finalizarCadastro")
            .addEventListener("click", function() {

                let nome = document.getElementById("modalNome").value;
                let telefone = document.getElementById("modalTelefone").value;
                let endereco = document.getElementById("modalEndereco").value;

                if (nome == '' || telefone == '' || endereco == '') {

                    alert("Preencha todos os campos!");
                    return;
                }

                // joga nos hidden inputs
                document.getElementById("nome").value = nome;
                document.getElementById("telefone").value = telefone;
                document.getElementById("endereco").value = endereco;

                // libera envio
                modalPreenchido = true;

                // envia form
                form.submit();

            });

        // máscara telefone
        $(document).ready(function() {
            $('#modalTelefone').mask('(00) 00000-0000');
        });

        // alert de cadastro de empresa
        // alert de cadastro de empresa
        <?php if (isset($_GET['finalizarCadastro'])): ?>

            <?php if ($_GET['finalizarCadastro'] == 'sucesso'): ?>

                Swal.fire({
                    title: "Conta criada!",
                    text: "Bem vindo a MGS!",
                    icon: "success"
                }).then(() => {
                    window.history.replaceState({}, document.title, "login.php");
                });

            <?php endif; ?>

        <?php endif; ?>
    </script>


</body>

</html>