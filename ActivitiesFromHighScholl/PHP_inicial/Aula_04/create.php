<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    
    <form method="POST" action="create.php">
        <label for="name">Nome: </label>
        <input type="text" name="name" require>
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" require>
        <br>
        <input type="submit" value="Adicionar">
    </form>
    

    <a href="update.php"><button>Alterar Login.</button></a>
    <a href="delete.php"><button>Deletar Login.</button></a>
    <a href="read.php"><button>Ver Dados de Login.</button></a>

</body>
</html>

<?php
include"db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        if($name == null || $email == null){
            echo 'Valor inválido';
        } else {
            $sql = "INSERT INTO user (name,email) VALUE ('$name', '$email')";
            if ($conn -> query($sql) === TRUE){
                echo "Novo resgistro criado com sucesso!";
            }else{
                echo "Erro" . $sql . "<br>" . $conn -> error;
            }
        }
        


        
    }
 $conn -> close();
?>
