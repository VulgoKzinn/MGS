// <!-- KAUÃ -->
const estadoSelect = document.getElementById("estado");
const municipioSelect = document.getElementById("municipio");

{/* Carregar estados */ }
fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
    .then(res => res.json())
    .then(estados => {
        estados.sort((a, b) => a.nome.localeCompare(b.nome)); // ordenar alfabeticamente
        estados.forEach(e => {
            const opt = document.createElement("option");
            opt.value = e.id; // ou e.sigla
            opt.textContent = e.nome;
            estadoSelect.appendChild(opt);
        });
    });

{/* Quando escolher estado, carregar municípios */ }
estadoSelect.addEventListener("change", function () {
    const idEstado = this.value;
    municipioSelect.innerHTML = '<option value="">Selecione o município</option>';

    if (idEstado) {
        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${idEstado}/municipios`)
            .then(res => res.json())
            .then(municipios => {
                municipios.forEach(m => {
                    const opt = document.createElement("option");
                    opt.value = m.id;
                    opt.textContent = m.nome;
                    municipioSelect.appendChild(opt);
                });
            });
    }
});