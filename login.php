<!-- KAUÃ -->
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Matchwork</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body id="login">
    <div id="ImgLogon">
        <a href="index.php"><img src="img/Logomaior.png" alt="Logo"></a>
    </div>
    <main id="Logon">
        <form action="" method="post">
            <h2 class="text-center mb-4">Login</h2>
            <!--  Email -->
            <div class="input-group mb-3">
                <span class="input-group-text"> <i class="fa-light fa-envelope fa-lg" style="color: #6750a4;"></i>
                </span>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInputEmail" placeholder="E-mail"> <label
                        for="floatingInputEmail">E-mail</label>
                </div>
            </div>
            <!--  Senha -->
            <div class="input-group mb-3"> <span class="input-group-text"> <i class="fa-light fa-lock fa-lg"
                        style="color: #6750a4;"></i> </span>
                <div class="form-floating"> <input type="password" class="form-control" id="floatingInputPassword"
                        placeholder="Senha"> <label for="floatingInputPassword">Senha</label> </div>
            </div>
            <a href="#">Esqueceu a senha?</a>

            <button type="submit" class="btn btn-success mt-3">Logar</button>
            <!-- Links extras -->
            <div class="extra-links"> <a href="cadastro-candidato.php">Cadastrar Conta</a> <a href="cadastro-empresa.php">Cadastrar Empresa</a> </div>
        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
</body>

</html>