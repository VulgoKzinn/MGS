
<!-- KAUÃ -->
<?php
require_once __DIR__ . "/../backend/includes/funcoes.php";
validaAcesso();

if(session_status() === PHP_SESSION_NONE){
session_start();
}

$voltarLink = '../candidato/pag_inicial.php';

if (isset($_SESSION['id_nivel']) && $_SESSION['id_nivel'] == 1) {
    $perfilLink = '../empresa/pag_inicial_empresa.php';
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assinaturas | Matchwork</title>
    <?php require_once '../assets/templates/head.php'; ?>
    
</head>

<body id="login">
    <div id="ImgLogon">
        <a href="../"><img src="../assets/img/Logomaior.png" alt="Logo"></a>
    </div>
    <main>
        <div id="grid-plano">
            <div class="flat">
                <h3 class="card-title text-center">PLANO STARTER</h3>
                <h4 class="text-center text-primary">R$ 00,00</h4>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>☑ Cadastro de perfil básico</li>
                    <li>☑ Acesso a vagas compatíveis</li>
                    <li>☑ Limite de 3 matchs por dia</li>
                    <li>☑ Envio de currículo</li>
                    <li>☑ Notificações básicas</li>
                    <li>☑ Visualização limitada</li>
                </ul>
                <div class="text-center"> 
                    <a href="processa_assinatura.php?id=1" class="btn btn-success w-100">Escolher</a> 
                </div>
            </div>

            <div class="flat">
                <h3 class="card-title text-center">PLANO MATCH PRO</h3>
                <h4 class="text-center text-primary">R$ 14,90</h4>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>☑ Tudo do Starter</li>
                    <li>☑ Limite de 15 matchs por dia</li>
                    <li>☑ Destaque nas candidaturas</li>
                    <li>☑ Ver quem visitou seu perfil</li>
                    <li>☑ Notificações prioritárias</li>
                    <li>☑ Suporte por chat</li>
                </ul>
                <div class="text-center"> 
                    <a href="processa_assinatura.php?id=2" class="btn btn-success w-100">Escolher</a> 
                </div>
            </div>

            <div class="flat">
                <h3 class="card-title text-center">PLANO ELITE</h3>
                <h4 class="text-center text-primary">R$ 29,90</h4>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>☑ Matchs Ilimitados</li>
                    <li>☑ Análise de currículo por IA</li>
                    <li>☑ Acesso antecipado a vagas</li>
                    <li>☑ Consultoria de carreira</li>
                    <li>☑ Perfil verificado</li>
                    <li>☑ Suporte VIP 24h</li>
                </ul>
                <div class="text-center"> 
                    <a href="processa_assinatura.php?id=3" class="btn btn-success w-100">Escolher</a> 
                </div>
            </div>
            
            <!-- Voltar -->
            <div class="text-center">
                <a href="<?= $voltarLink ?>"
                    class="text-sm text-gray-400 hover:text-gray-200 transition">
                    ← Voltar para login
                </a>
            </div>

        </div>
    </main>

    <?php require_once '../assets/templates/js.php'; ?>
</body>
</html>