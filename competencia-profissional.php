<!-- KAUÃ -->
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Competência | Matchwork</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body id="cadastroCand">
    <div id="ImgLogon">
        <a href="index.html"><img src="img/Logomaior.png" alt="Logo"></a>
    </div>
    <!-- Formulário -->
    <main id="CadCand">
        <form action="" method="post" class="p-4">
            <h2 class="text-center mb-4">Competência Profissional</h2>

            <!-- Primeira linha -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="nome" class="form-label">Experiência profissional</label>
                    <input type="text" class="form-control" id="nome" placeholder="Experiência profissional">
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Nível acadêmico</label>
                    <select class="form-select" name="" id="">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="fundamental">Ensino Fundamental</option>
                        <option value="medio">Ensino Médio</option>
                        <option value="superior">Nível Superior</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Cursos e especializações</label>
                    <select class="form-select" name="" id="">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="fundamental">Excel</option>
                        <option value="medio">Power BI</option>
                        <option value="superior">Redes</option>
                        <option value="superior">Hardware</option>
                    </select>
                </div>

                <!-- Segunda linha -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Idiomas</label>
                        <select class="form-select" name="" id="">
                            <option value="" disabled selected>Selecione...</option>
                            <option value="fundamental">Inglês</option>
                            <option value="medio">Espanhol</option>
                        </select>
                    </div><!-- Resumo das qualificações -->
                    <div class="row mb-3">
                        <div class="col-md-9"> <label for="resumo" class="form-label">Resumo das qualificações</label>
                            <textarea class="form-control" id="resumo" rows="3"
                                placeholder="Resumo das suas qualificações"></textarea>
                        </div>
                    </div>

                    <!-- Terceira linha -->
                    <div class="row mb-3">
                        <div class="col-md-4 d-flex align-items-center">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="pcd">
                                <label class="form-check-label" for="pcd">
                                    Estou em busca do primeiro emprego
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="planos.html"><button type="submit"
                                class="btn btn-success">Cadastrar</button></a>
                    </div>
        </form>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#telefone').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
        });
    </script>

</body>

</html>