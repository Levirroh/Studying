<?php

/*
Insira o raio de um círculo.
Defina a constante PI. --> 3.14
Calcule a área do círculo. --> A = π * r²
Verifique se a área calculada é maior do que um valor limite 50.
Exiba uma mensagem informando se a área é maior ou menor/igual ao valor limite.
*/



echo '<h2><b>Vamos calcular a Área de um Círculo!<b></h2>';

$raio =  random_int(0 , 10); // cria um raio aleatório


echo 'O valor do raio é aleatório: ';

echo $raio; // mostra o raio

echo '<p>O valor de π será 3.14</p>';

$pi = (float) 3.14; // cria a variável para pi

$area = (float) $pi * pow($raio, 2); // faz a conta
 
echo '<p>A área do círculo é: ', $area ,'</p>'; // mostra o resultado


if ($area > 50){ // verifica se é menor ou maior que 50
    echo 'A área é MAIOR que 50';
}else{
    echo 'A área é MENOR que 50';
}


?>