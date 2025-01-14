
let int1 = 0;
let int2 = 0;
let int3 = 0;
let int4 = 0;


var Array = [int1, int2, int3, int4];
let i = 0;

while (i !== 4){
    Array[i] = prompt("Digite um número: ");
    i = i + 1;
}



Array.sort(function(a,b){return b - a})


console.log(Array)