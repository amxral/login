// Obtém o elemento select
const selectAnos = document.getElementById("anos");

// Obtém o ano atual
const anoAtual = new Date().getFullYear() - 13;

// Define o intervalo de anos (por exemplo, 100 anos atrás até o ano atual)
let anoInicial = anoAtual - 100;

// Loop para adicionar os anos ao select
for (let i = anoAtual; i >= anoInicial; i--) {
    const option = document.createElement("option");
    option.text = i;
    option.value = i;
    selectAnos.appendChild(option);
}

// Obtém a opção dia 
const selectDia = document.getElementById("nasc");
const diaMax = 31;

// Loop para adicionar os dias
for (let d = 1; d <= diaMax; d++) {
    const option = document.createElement("option");
    option.text = d;
    option.value = d;
    selectDia.appendChild(option);
}

// Obtém o valor do mês
const selectMes = document.getElementById('mes');
const mesMax = 12
// Loop para adicionar os meses 
for (let m = 1; m <= mesMax; m++) {
    const option = document.createElement('option');
    option.text = m;
    option.value = m;
    selectMes.appendChild(option)
}
