/*
Faça um algoritmo que some quantos números o usuário quiser, sempre pedindo
seus valores a ele, e que ao fim mostre o resultado.
*/
let numberone = 0;
let numbertwo = 0;;
let calcular = false; 
let soma = 0;

while (calcular !== "calcular"){
    console.log("Digite dois números inteiros para somar:");
    let numberone = prompt("Primeiro um: ");
    let numbertwo = prompt("Segundo número: ");
	soma = parseInt(numberone) + parseInt(numbertwo) + soma;
    calcular = prompt("Para calcular digite calcular, senao aperte enter: ");
}

console.log(soma);

