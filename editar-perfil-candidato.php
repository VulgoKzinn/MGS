<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Perfil | Matchwork</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.svg">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="login">

    <!-- Logo -->
    <div id="ImgLogon" class="text-center mb-3">
        <a href="index.php">
            <img src="assets/img/logomaior.png" alt="Logo">
        </a>
    </div>

    <main id="Logon">
        <form action="" method="post">

            <!-- Botão voltar -->
            <div class="d-flex justify-content-start mb-3">
                <a href="perfil-candidato.php" class="btn btn-outline-light">
                    <i class="fa-solid fa-arrow-left"></i> Voltar
                </a>
            </div>

            <h2 class="text-center mb-4">Editar Perfil</h2>

            <!-- FOTO DE CAPA -->
            <div class="mb-3 text-center">
                <label for="capaInput" class="form-label">Foto de Capa</label><br>
                <img id="previewCapa" src="https://via.placeholder.com/600x150"
                     class="img-fluid rounded mb-2" style="max-height:150px;">
                <input type="file" class="form-control" id="capaInput" accept="image/*">
            </div>

            <!-- FOTO DE PERFIL -->
            <div class="mb-3 text-center">
                <label for="perfilInput" class="form-label">Foto de Perfil</label><br>
                <img id="previewPerfil" src="https://via.placeholder.com/120"
                     class="rounded-circle mb-2"
                     style="width:120px; height:120px; object-fit:cover;">
                <input type="file" class="form-control" id="perfilInput" accept="image/*">
            </div>

            <!-- Nome -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-user"></i>
                </span>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Nome Completo">
                    <label>Nome Completo</label>
                </div>
            </div>

            <!-- Email -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-envelope"></i>
                </span>
                <div class="form-floating">
                    <input type="email" class="form-control" placeholder="Email">
                    <label>E-mail</label>
                </div>
            </div>

            <!-- Telefone -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-phone"></i>
                </span>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Telefone">
                    <label>Telefone</label>
                </div>
            </div>

            <!-- Endereço -->
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-light fa-location-dot"></i>
                </span>
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Endereço">
                    <label>Endereço</label>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Salvar</button>

        </form>
    </main>

    <!-- JS Preview -->
    <script>
        // Preview capa
        document.getElementById('capaInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('previewCapa').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });

        // Preview perfil
        document.getElementById('perfilInput').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('previewPerfil').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>