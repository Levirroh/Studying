<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
<form method="POST" action="update.php">
    <label for="name">Nome: </label>
        <input type="text" name="name" require>
    <label for="upd_name">Novo Nome: </label>
        <input type="text" name="upd_name" require>
    <br>
    <label for="email">Email: </label>
        <input type="text" name="email" require>
    <label for="upd_email">Novo Email: </label>
        <input type="text" name="upd_email" require>
    <input type="submit" value="Alterar">
</form>

    
<a href="create.php"><button>Voltar.</button></a>
</body>
</html>

<?php
include "db.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $updName = $_POST['upd_name'];
        $updEmail = $_POST['upd_email'];
        $sql = "UPDATE user SET name = '$updName', email = '$updEmail' WHERE name = '$name'";

        if ($conn -> query($sql) === true){
            echo "Registro alterado com sucesso!";
        }else{
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
    $conn -> close();
?>
