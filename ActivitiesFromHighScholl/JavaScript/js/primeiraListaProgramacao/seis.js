var Array = ['a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U'];

let letra = prompt("Digite uma letra para saber se é Consoante ou Vogal: ");


if (Array.includes(letra)){
    console.log("Sua letra é uma Vogal");
}else{
    console.log("Você digitou uma Consoante");
}