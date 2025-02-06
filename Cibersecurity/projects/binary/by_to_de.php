<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary to Decimal</title>
</head>
<body>
    <h1>Conversor de Binário em Decimal.</h1>
    <form method="POST">
        <label for="binario">Digite o número binário</label>
        <input type="number" name="binario">
        <input type="submit" value="calcular" name="calcular">
    </form>
<?php

if (isset($_POST['calcular'])){
    $binario = $_POST['binario'];
    $array = array_map('intval', str_split($binario));
    $j = count($array) -1;
    $soma = 0;
    $k = 0;
    if ($binario == "0"){  // Verifica se o número é zero
        echo "O número binário 0 em decimal é: 0";
    } else {
        for ($i = $j; $i >= 0; $i = $i -1){
            if (isset($array[$i]) && $array[$i] == "1"){
                $soma = $soma + 2**$k;
            } 
            $k = $k + 1;
        }
    }
    echo "<p>O número <b>". $binario ."</b> em decimal é: <b>". $soma."</b></p>";
}


/* mental map
i=2 --> 1, true --> $soma = 0 + 2^0 = 1;

i=1 --> 0, false --> $soma = 1;

i=0 --> 1, true --> $soma = 1 + 2^2 = 5;
*/

?>    
</body>
</html>