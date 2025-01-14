/*
A empresa Mawer precisa fazer o balanço financeiro anual, portanto te contrataram
e disseram: faça um algoritmo que peça o ganho bruto e os gastos desta empresa
para cada um dos 12 meses de um ano, e que mostre no final o ganho bruto anual,
o gasto anual e o saldo financeiro, informando também se a empresa teve lucro ou
prejuízo.
*/ 

let i = 1;
let bruto = 0;
let gasto = 0;
let saldo = 0;
let brutoAnual = 0;
let gastoAnual = 0;
while (i != 13){
    bruto = prompt(`Digite o ganho bruto do mês ${i}:`)
    gasto = prompt(`Digite o gasto do mês ${i}:`)
    i = i+1;
    brutoAnual = bruto + brutoAnual;
    gastoAnual = gasto + gastoAnual;
    saldo = bruto - gasto;
}

console.log(saldo)

if (gastoAnual > brutoAnual){
    console.log("Você teve PREJUÍZO!")
}else if (saldo == 0){
    console.log("Você não perdeu NEM ganhou!")
}else{
    console.log("Você teve LUCRO!")
}
