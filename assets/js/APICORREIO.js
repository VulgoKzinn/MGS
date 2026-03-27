// KAUÃ
async function buscarEndereco(cep) {
  try {
    cep = cep.replace(/\D/g, '');
    if (cep.length !== 8) {
      alert("CEP inválido!");
      return;
    }

    document.getElementById("ruaEmp").value = "Carregando...";
    document.getElementById("bairroEmp").value = "Carregando...";
    document.getElementById("cidadeEmp").value = "Carregando...";
    document.getElementById("estadoEmp").value = "Carregando...";

    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    const data = await response.json();

    if (data.erro) {
      alert("CEP não encontrado.");
    } else {
      document.getElementById("ruaEmp").value = data.logradouro;
      document.getElementById("bairroEmp").value = data.bairro;
      document.getElementById("cidadeEmp").value = data.localidade;
      document.getElementById("estadoEmp").value = data.uf;
    }
  } catch (error) {
    console.error("Erro ao consultar CEP:", error);
    alert("Erro ao consultar CEP.");
  }
}

//PREENCHE OS OUTROS CAMPOS
document.addEventListener("DOMContentLoaded", () => {
  const cepInput = document.getElementById("cepEmp");
  cepInput.addEventListener("blur", () => {
    buscarEndereco(cepInput.value);
  });
});
