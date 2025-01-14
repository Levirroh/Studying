<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-width, initial-scale= 1.0">
    <title>Informa Primo</title> 
</head>
<body>
    <form method="POST" action="">
        <label for="numero-primo">Verificar se um número é primo</label>
        <input type="number" id="numero_primo" name="numero_primo" required>
        <button type="submit" name="verificar_primo">Verificar</button>
    </form>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){// quando houver um método sendo requisitado no server for igual a POST, executa. Quando tiver a requisição que isso acontece. $_SERVER é uma variável interna.
            if (isset($_POST['verificar_primo'])) {//isset é is set, verifica se está vazio (false [vazia] ou true)
                $numero = $_POST['numero_primo'];
                $ehPrimo = true;
                
                if($numero <= 1){
                    $ehPrimo = false;
                } else{
                    for ($i = 2; $i <= sqrt($numero); $i++){
                        if ($numero % $i == 0){
                            $ehPrimo = false;
                            break;
                        }
                    }
                }
                echo "O número $numero é ", ($ehPrimo ? 'primo' : 'não é primo');
            }
        }
    ?>

</body>
</html>
