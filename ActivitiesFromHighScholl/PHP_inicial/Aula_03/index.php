<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-width, initial-scale= 1.0">
    <link rel="stylesheet" href="style.css">
    <title>Informa Primo</title> 
</head>
<body>
    <form method="POST" action="">
        <label for="valor_base">Digite a base do triângulo retângulo</label>
        <input type="number" id="valor_base" name="valor_base" required>
        <label for="valor_altura">Digite a altura do triângulo retângulo</label>
        <input type="number" id="valor_altura" name="valor_altura" required>
        <button type="submit" name="calcular_area">Verificar</button>
    </form>

    <?php 
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){// quando houver um método sendo requisitado no server for igual a POST, executa. Quando tiver a requisição que isso acontece. $_SERVER é uma variável interna.
            if (isset($_POST['calcular_area'])){//isset é is set, verifica se está vazio (false [vazia] ou true)
                $base = $_POST['valor_base'];
                $altura = $_POST['valor_altura'];
                $area = ($base * $altura)/2;
                if ($area >= 100){
                    echo "A área do triângulo é maior que o limite";
                } else {
                    echo "A área do triângulo é menor que o limite";
                }
                echo "A área de um triângulo de base $base e altura de valor $altura é $area";
            }
        }
    ?>

</body>
</html>
