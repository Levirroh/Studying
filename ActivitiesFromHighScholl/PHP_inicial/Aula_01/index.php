<?php

// ligar xampp (Apache) --> criar arquivo do php na pasta htdocs do XAMPP --> criar arquivo formato php -->
// conectar ao localhost usando como início o htdocs (nõa insere o htdocs) no formato: pasta/pasta/arquivo

/*
PHP é uma linguagem fracamente tipada. 
Em uma linguagem de programação com tipagem fraca, as conversões automáticas e 
implícitas entre tipos de dados são comuns e não há uma aplicação rigorosa das regras de tipagem
*/

$mensagem = 'Olá, mundo!';

echo $mensagem;

echo '<h2>Script do PHP<h2>';


$primeiro_nome = 'Johann';
$idade = 22;
$masculino = true;
$faminino = false;


$resultado = $idade + 18 *7;

echo $resultado;
echo '<br>'; 

$num = 37.4;

echo 'Ponto Flutuante: ', $num, ' </br>'; //mostrar variável em texto

$num2 = (int) $num;

echo '<p>Inteiro: ' , $num2, '</p>';


$nota = random_int(0,10); // -->número aleatório entre 0 e 10 

if ($nota >= 7){
    echo '<p> Passou! </p>';
}else{
    echo '<p> Não Passou! </p>';
}


?>