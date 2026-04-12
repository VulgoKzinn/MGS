<?php
require_once "backend/includes/funcoes.php";
// validaAcesso();
// $id_nivel = $_SESSION['id_nivel'];
// validaUsuario($id_nivel);

?>
<!-- SABRINA -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <title>Perfil Empresarial</title>
   <!-- Include Links -->
   <?php
   require_once 'assets/templates/head.php';
   ?>
   <!-- Para garantir responsividade em mobile bootstrap -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- css da pagina -->
   <link rel="stylesheet" href="assets/css/perfil-empresa.css">
   <!--OBS talvez tirar depois de padronizar a fonte -->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
   <main class="container mt-4">
      <!-- PERFIL -->
      <div class="position-relative">

         <!-- Capa -->
         <img src="assets/img/perfil-empresa/amazon-capa.jpg" class="img-fluid w-100 capa">

         <!-- Foto de perfil -->
         <img src="assets/img/perfil-empresa/amazon-perfil.jpeg" class="perfil rounded-circle">

         <!-- Configurações -->
         <div class="config-btn">
            <?php include "assets/templates/subedit.php"; ?>
         </div>

      </div>

      <!--QUEM SOMOS -->
      <div class="quem-somos text-center mt-5 pt-5 mb-5">
         <h1 class="text-center mt-5">QUEM SOMOS?</h1>
      </div>

      <!-- Primeira descrição da empresa -->
      <div class="container-fluid mt-7 px-5 mb-5">
         <div class="row align-items-center">

            <div class="col-md-5">
               <p class="descricao-texto">A Amazon é uma empresa global de tecnologia focada em facilitar a vida de
                  pessoas e negócios por meio da
                  inovação. Atuamos em áreas como e-commerce, computação em nuvem, logística e entretenimento digital,
                  sempre
                  com o cliente no centro de tudo o que fazemos.
                  Nossa cultura é guiada por princípios como obsessão pelo cliente, pensamento de longo prazo e busca
                  constante por excelência. Acreditamos em ambientes diversos, colaborativos e que incentivam o
                  aprendizado
                  contínuo, oferecendo oportunidades reais de crescimento profissional.
               </p>
            </div>

            <div class="col-md-6 text-center">
               <img src="assets/img/perfil-empresa/amazon-empresa01.webp" class="img-fluid imagem-descricao">
            </div>
         </div>
      </div>

      <!-- Segunda descrição da empresa -->
      <div class="container-fluid mt-7 px-5 mb-5">
         <div class="row align-items-center flex-md-row-reverse">

            <div class="col-md-5">
               <p class="descricao-texto">Aqui, valorizamos pessoas que gostam de desafios, têm espírito inovador e
                  desejam fazer parte de soluções
                  que impactam milhões de pessoas todos os dias, atuando em um ambiente dinâmico, diverso e orientado a
                  resultados, onde novas ideias são incentivadas e o desenvolvimento profissional é levado a sério.
               </p>
            </div>

            <div class="col-md-6 text-center">
               <img src="assets/img/perfil-empresa/amazon-empresa.jpg" class="img-fluid imagem-descricao">
            </div>
         </div>
      </div>

      <!--FAÇA PARTE DO NOSSO TIME-->

      <!-- Título Topo -->
      <div class="faca-parte text-center mt-5 pt-5 mb-5">
         <h1 class="text-center mt-5">FAÇA PARTE DO NOSSO TIME</h1>
      </div>

      <div class="container mt-5">
         <div class="info-vaga p-4">

            <!-- Título -->
            <div class="text-center mb-4">
               <h2 class="fw-bold text-dark">Analista de marketing digital</h2>
            </div>

            <div class="row g-3">

               <!-- IMAGEM -->

               <div class="col-12 text-center">
                  <img src="assets/img/perfil-empresa/amazon-empresa.jpg" class="img-fluid rounded">
               </div>

               <!-- CAMPOS PEQUENOS -->
               <div class="col-md-6">
                  <label class="form-label text-light">Área de Atuação</label>
                  <div class="form-control custom-box">Marketing</div>
               </div>

               <div class="col-md-6">
                  <label class="form-label text-light">Modalidade da Vaga</label>
                  <div class="form-control custom-box">Período Integral</div>
               </div>

               <div class="col-md-6">
                  <label class="form-label text-light">Modelo de Trabalho</label>
                  <div class="form-control custom-box">Híbrido</div>
               </div>

               <div class="col-md-6">
                  <label class="form-label text-light">Localização</label>
                  <div class="form-control custom-box">São João da Boa Vista - SP</div>
               </div>

               <div class="col-md-6">
                  <label class="form-label text-light">Salário</label>
                  <div class="form-control custom-box">A Combinar</div>
               </div>

               <div class="col-md-6">
                  <label class="form-label text-light">Benefícios</label>
                  <div class="form-control custom-box">
                     Vale Refeição, Vale Transporte e Plano de Saúde
                  </div>
               </div>

               <!-- CAMPOS GRANDES -->
               <div class="col-12">
                  <label class="form-label text-light">Carga Horária</label>
                  <div class="form-control custom-box">40 horas semanais</div>
               </div>

               <div class="col-12">
                  <label class="form-label text-light">Descrição da Vaga</label>
                  <div class="form-control custom-box area-grande">
                     Lorem ipsum...
                  </div>
               </div>

               <div class="col-12">
                  <label class="form-label text-light">Requisitos</label>
                  <div class="form-control custom-box area-grande">
                     Lorem ipsum...
                  </div>
               </div>

            </div>

         </div>
      </div>

      <!--CANAIS OFICIAIS-->
      <div class="canais-oficiais text-center mt-5 pt-5 mb-5">
         <h1 class="text-center mt-5">CANAIS OFICIAIS</h1>
      </div>


   </main>

   <!-- Include JS -->
   <?php
   require_once 'assets/templates/js.php';
   ?>
</body>

</html>