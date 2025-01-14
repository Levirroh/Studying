<?php

/*
Converta uma temperatura de Celsius para Fahrenheit e vice-versa. 
Verifique se um número fornecido é primo. FEITO
Receba um número e verifique se é par ou ímpar. FEITO
Receba o ano de nascimento e calcule a idade, considerando o ano atual. FEITO
Converta um número de minutos em horas e minutos.   FEITO
Crie uma função que imprima a tabuada de um número fornecido. FEITO
Calcule o fatorial de um número fornecido.
*/

echo '<h1>Reinicie a página para alterar os valores</h1>';
echo '<br><br>';


echo '<b>// ==================== TRANSFORMAÇÃO DE CELCIUS EM FAHRENHEIT ==================== //</b>';

echo '<p>Vamos transformar Celsius em Fahrenheit!</p>';

$tempC =  random_int(-15 , 45); // cria uma temperatura aleatória


echo 'O valor da temperatura é aleatório: ';

echo $tempC; // mostra o raio

echo '<p>A equação é: F = C * 1,8 + 32</p>';

$tempF = (float) $tempC * 1.8 + 32; // faz a conta

echo '<p>A temperatura se torna: ', $tempF ,'</p>'; // mostra o resultado


// Verifica se o número é primo
if ($tempC <= 1) { // verifica se é menor que 1
    $CehPrimo = false;
}
for ($i = 2; $i <= sqrt($tempC); $i++) { // verifica se é divisível por números (2,3,4,...) até sua raiz quadrada
    if ($tempC % $i == 0) {
        $CehPrimo = false;
    }
}



echo '<br><br>';
if ($tempC % 2 == 0){ // verifica se é impar ou par
    echo 'A temperatura (usando somente o número inteiro) é par';
    $ehPar = true;
}else{
    echo 'A temperatura (usando somente o número inteiro) é impar';
    $ehPar = false;
}

echo '<br><br>';
echo '<br><br>';


echo '<b>// ==================== TRANSFORMAÇÃO DE FAHRENHEIT EM CELCIUS ==================== //</b>';

echo '<p>Vamos transformar Fahrenheit em Celcius!</p>';

$tempF =  random_int(-15 , 45); // cria uma temperatura aleatória


echo 'O valor da temperatura é aleatório: ';

echo $tempF; // mostra o raio

echo '<p>A equação é: F = C * 1,8 + 32</p>';

$tempC = (float) ($tempF - 32)/ 1.8; // faz a conta

echo '<p>A temperatura se torna: ', $tempC ,'</p>'; // mostra o resultado


// Verifica se o número é primo
if ($tempF <= 1) { // verifica se é menor que 1
    $FehPrimo = false;
}
for ($i = 2; $i <= sqrt($tempF); $i++) { // verifica se é divisível por números (2,3,4,...) até sua raiz quadrada
    if ($tempF % $i == 0) {
        $FehPrimo = false;
    }
}



echo '<br><br>';
if ($tempC % 2 == 0){ // verifica se é impar ou par
    echo 'A temperatura (usando somente o número inteiro) é par';
    $ehPar = true;
}else{
    echo 'A temperatura (usando somente o número inteiro) é impar';
    $ehPar = false;
}

echo '<br><br>';
echo '<br><br>';


echo '<b>// ==================== IDADE DE ALGUÉM QUE NASCEU EM... ==================== //</b>';
echo '<br><br>';
$anoNascimento= random_int(1900, 2024);

$idade = 2024 - $anoNascimento;

echo '<br>Alguém que nasceu em ', $anoNascimento, ' possui ', $idade ,' de anos hoje.';

echo '<br><br>';
echo '<br><br>';


echo '<b>// ==================== MINUTOS EM HORAS ==================== //</b>';

echo '<br><br>';
$minutos = random_int(0,600);

$hora = $minutos/60;

$restoHora = $minutos%60;

echo '<br>', $minutos, ' minutos equivalem a ', (int) $hora ,' horas e ', $restoHora, ' minutos.';

echo '<br><br>';
echo '<br><br>';

echo '<b>// ==================== TABUADA DE UM NÚMERO ALEATÓRIO ==================== //</b>';

echo '<br><br>';
$numero = random_int(0,100);

for ($i=1; $i <= 10; $i++ ){
    if ($i == 1){
        echo '<br><em> Tabuada de ', $numero, '</em>';
        echo '<br> <br>', $i, 'x', $numero, ' = ' ,  $numero * $i;
    }else{
        echo '<br> ', $i, 'x', $numero, ' = ' , $numero * $i;
    }
}

echo '<br><br>';

echo '<b>// ==================== FATORIAL DE UM NÚMERO ALEATÓRIO ==================== //</b>';

echo '<br><br>';

$numeroFatorial = random_int(1,10);

function fatorial($numeroFatorial) {
    $fatorial = 1;
    for ($i = 1; $i <= $numeroFatorial; $i++) {
        $fatorial *= $i;
    }
    return $fatorial;
}

echo "O fatorial de $numeroFatorial é " . fatorial($numeroFatorial);



?>