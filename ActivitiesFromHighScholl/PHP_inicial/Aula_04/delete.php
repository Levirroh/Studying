<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    
<form method="POST" action="delete.php">
    <label for="name">Nome: </label>
        <input type="text" name="name" require>
    <input type="submit" value="Deletar">
</form>
    
<a href="create.php"><button>Voltar.</button></a>
</body>
</html>

<?php
include "db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $sql = "DELETE FROM user WHERE name = '$name'";

        if ($conn -> query($sql) === true){
            echo "Resgistro deletado com sucesso!";
        }else{
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
$conn -> close();

?>
