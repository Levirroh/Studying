let num = 0;


num = prompt("Digite um número: ");

if (num%2 == 0){
    console.log("Seu número é Par")
    console.log("Transformando em Ímpar...")
    num = parseInt(num) + 1;
    console.log(num)
}else{
    console.log("Seu número é Ímpar")
    console.log("Transformando em Par...")
    num = parseInt(num) + 1;
    console.log(num)
}