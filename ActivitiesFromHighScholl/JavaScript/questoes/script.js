function primeira() {
    let num = document.getElementById("num").value;

    let ndois = document.getElementById("ndois").value;

    function dif(){
        let result = num - ndois;
        if (result < 0){
            result = result * (-1);
        }
        document.getElementById("dif").textContent = `A diferença entre ${num} e ${ndois} é = ${result}`;
    }
    function dobromaistriplo(){
        let result = (2 * num) + (3 * ndois)
        document.getElementById("dobromaistriplo").textContent = `O dobro de ${num} mais o triplo de ${ndois} é igual a ${result}.`;
    }
    function mul(){
        let result = num * ndois;
        document.getElementById("mul").textContent = `A multiplicação entre ${num} e ${ndois} é igual a ${result}.`;
    }
    function maiornmenor(){
        if (num < ndois) {
            document.getElementById("maiormenor").textContent = `${ndois} é maior que ${num}`;
        } else{
            document.getElementById("maiormenor").textContent = `${num} é maior que ${ndois}`;
        }
}

    dif()

    dobromaistriplo()

    mul()

    maiornmenor()
}

function segunda(){
    let nome = document.getElementById("nome").value;
    let salarioB = document.getElementById("salarioB").value;
    let inss = 0.08;
    let descontoInss = (salarioB * 0.08)
    let salarioL = salarioB - descontoInss;

    document.getElementById("mnome").textContent = `O seu nome é: ${nome}`;
    document.getElementById("msalarioB").textContent = `O seu Salário Bruto é: ${salarioB}`;
    document.getElementById("minss").textContent = `O desconto do INSS foi de: ${inss * 100}% ou ${descontoInss} reais`;
    document.getElementById("msalarioL").textContent = `O seu Salário Líquido é: ${salarioL}`;
}


function terceira(){
    let nome = document.getElementById("nome").value;
    let salarioB = document.getElementById("salarioB").value;
    let inss = null;
    if (salarioB < 1000.01) {
        inss = 0.08;
    } 
    else if (salarioB <= 1500) {
        inss = 0.085;
    } 
    else {
        inss = 0.09;
    }
    
    let descontoInss = (salarioB * inss)
    let salarioL = (salarioB - descontoInss);

    document.getElementById("mnome").textContent = `O seu nome é: ${nome}`;
    document.getElementById("msalarioB").textContent = `O seu Salário Bruto é: ${salarioB}`;
    document.getElementById("minss").textContent = `O desconto do INSS foi de: ${inss * 100}% ou ${descontoInss} reais`;
    document.getElementById("msalarioL").textContent = `O seu Salário Líquido é: ${salarioL}`;
}
