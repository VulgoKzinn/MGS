<!-- KAUÃ -->
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Deficiência | Matchwork</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/logo.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body id="login">
  <div id="ImgLogon" class="text-center mb-4">
    <a href="index.php"><img src="img/Logomaior.png" alt="Logo"></a>
  </div>

  <main id="Logon">
    <form action="" method="post">
      <h2 class="text-center mb-4">Qual o tipo de deficiência?</h2>

      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Visual" id="def1">
          <label class="form-check-label" for="def1">Visual</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Intelectual" id="def2">
          <label class="form-check-label" for="def2">Intelectual</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Auditiva" id="def3">
          <label class="form-check-label" for="def3">Auditiva</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Física" id="def4">
          <label class="form-check-label" for="def4">Física</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Psicossocial" id="def5">
          <label class="form-check-label" for="def5">Psicossocial</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Múltipla" id="def6">
          <label class="form-check-label" for="def6">Múltipla</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="deficiencia[]" value="Transtorno de Espectro Autista (TEA)" id="def7">
          <label class="form-check-label" for="def7">Transtorno de Espectro Autista (TEA)</label>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
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
