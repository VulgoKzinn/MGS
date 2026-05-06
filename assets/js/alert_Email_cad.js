Swal.fire({
  title: "Conta criada!",
  text: "Bem vindo a MGS!",
  icon: "success"
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "login.php";
  }
});