//Um programa que contém duas variáveis inteiras e cada uma destas variáveis deve ter um valor atribuído. Escrever um programa que mostre os seguintes resultados: 

//1. A diferença entre as duas variáveis. 
//2. O dobro da primeira mais o triplo da segunda variável. 
//3. A multiplicação das duas variáveis. 
//4. Escrever um programa que declare duas variáveis inteiras e mostre no console o valor das duas do maior para o menor 

let num = prompt(console.log("Digite um número inteiro!"));
let ndois = prompt(console.log("Digite outro número inteiro!"));

function dif(){
    let result = num - ndois;
    console.log(`A diferença entre ${num} e ${ndois} é = ${result}`);
}
function dobromaistriplo(){
    let result = (2 * num) + (3 * ndois)
    console.log(`O dobro de ${num} mais o triplo de ${ndois} é igual a ${result}.`);
}
function mul(){
    let result = num * ndois;
    console.log(`A multiplicação entre ${num} e ${ndois} é igual a ${result}.`);
}
function maiornmenor(){
    if (num < ndois) {
        console.log(`${ndois} é maior que ${num}`)
    } else{
        console.log(`${num} é maior que ${ndois}`)
    } 
}

dif()

dobromaistriplo()

mul()

maiornmenor()
