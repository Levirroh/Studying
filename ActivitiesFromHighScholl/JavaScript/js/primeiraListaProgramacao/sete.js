/* 
Faça um algoritmo para uma picoleteria que ao selecionar o tipo de sabor o preço do
picolé é mostrado, os sabores:
a. Chocolate custa R$:1,50
b. Morango custa R$:2,50
c. Creme custa R$:2,50
d. Manga custa R$:3,20
e. Melancia custa R$:3,40
f. Vanilla Ice custa R$:3,00
g. Céu Azul custa R$:3,60
h. Brownie custa R$:4,00
i. Hawaiano custa R$:5,00
*/
let sabores = ['Chocolate', 'Morango', 'Creme', 'Manga', 'Melancia', 'Vanilla', 'Céu Azul', 'Brownie', 'Hawaiano'];
let valores = [1.50, 2.50, 2.5, 3.20, 3.40, 3.00, 3.60, 4.00, 5.00];
let i = 0;
var igual = 0;
while (i !== 9){
    console.log(sabores[i]);
    i = i + 1;
}

let certo = false

while (certo === false) {
    let sabor = prompt("Escolha um sabor digitando seu nome: ");
    
    for (i = 0; i < 9; i++){
        if(sabor == sabores[i]){
            console.log(`O valor de ${sabores[i]} é: $${valores[i]} Reais.`);
            igual += 1;
            certo = true
        }
    }
    if (certo === false){
            console.log("Você digitou algo incorretamente, tente novamente!")   
        }
}

