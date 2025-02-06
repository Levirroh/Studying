<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal to Binary</title>
</head>
<body>
    <h1>Conversor de Decimal em Binário.</h1>
    <form method="POST">
        <label for="decimal">Digite o número decimal</label>
        <input type="number" name="decimal">
        <input type="submit" value="calcular" name="calcular">
    </form>
<?php

if (isset($_POST['calcular'])){
    $decimal = $_POST['decimal'];
    $array = array_map('intval', str_split($decimal)); // faz com que toda a string de int seja dividida em item por item.
    
    // echo "<p>O número <b>". $binario ."</b> em decimal é: <b>". $soma."</b></p>";
}


/* mental map
i=2 --> 1, true --> $soma = 0 + 2^0 = 1;

i=1 --> 0, false --> $soma = 1;

i=0 --> 1, true --> $soma = 1 + 2^2 = 5;
*/

?>    
</body>
</html>