// Função para garantir dois dígitos para números menores que 10
function padWithZero(num) {
    return String(num).padStart(2, '0'); // Adiciona um zero à esquerda para números de um dígito
}

// Obter elemento do ano
const selectAnos = document.getElementById("anos");
const anoAtual = new Date().getFullYear() - 13; // Assume idade mínima de 13 anos
const anoInicial = anoAtual - 100;

// Adicionar anos ao elemento select
for (let i = anoAtual; i >= anoInicial; i--) {
    const option = document.createElement("option");
    option.text = i;
    option.value = i;
    selectAnos.appendChild(option);
}

// Obter elemento do dia
const selectDia = document.getElementById("nasc");
const diaMax = 31;

// Adicionar dias ao elemento select com dois dígitos
for (let d = 1; d <= diaMax; d++) {
    const option = document.createElement("option");
    const diaFormatado = padWithZero(d); // Garante que será exibido com dois dígitos
    option.text = diaFormatado;
    option.value = diaFormatado;
    selectDia.appendChild(option);
}

// Obter elemento do mês
const selectMes = document.getElementById("mes");
const mesMax = 12;

// Adicionar meses ao elemento select com dois dígitos
for (let m = 1; m <= mesMax; m++) {
    const option = document.createElement("option");
    const mesFormatado = padWithZero(m); // Garante dois dígitos
    option.text = mesFormatado;
    option.value = mesFormatado;
    selectMes.appendChild(option);
}
