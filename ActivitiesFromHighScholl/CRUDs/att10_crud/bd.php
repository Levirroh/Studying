<?php

$servername = "localhost"; // nome do servidor
$username = "root"; // nome do usuário
$password = "root"; // senha do usuário
$dbname = "crud_paulo_johann"; // nome do banco de dados

// conectando com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname); // variável de conexão 


if ($conn -> connect_error){ // Se a conexão der falha, mostrará erro com o tipo do erro.W
    die("Conexão Falhou: " . $conn -> connect_error);
};

?>