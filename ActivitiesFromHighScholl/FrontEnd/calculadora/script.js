function Calcular() {
     //adquirindo valores
    var numeroum = parseFloat(document.getElementById('numeroum').value);
    var numerodois = parseFloat(document.getElementById('numerodois').value);
    var opcao = document.getElementById('tipo-operacao').value;
    //adquirindo o tipo de operacao
    switch (opcao) {
        case "multiplicacao":
            var resultado = numeroum * numerodois;
            break;
        case "somar":
            var resultado = numerodois + numeroum;
            break;
        case "dividir":
            if (numerodois == 0) {
                alert("Não se pode dividir por ZERO!");
                break;
            } else{
                var resultado = numeroum / numerodois;
                break;
            }
        case "subtrair":
            var resultado = numeroum - numerodois;
            break;
        default: // caso não tenha nenhuma operacao
            alert("Escolha alguma operação! ")
    }
    var mostrar = document.getElementById('Mostrar'); //mostrar resultado
    mostrar.innerHTML = resultado;
}