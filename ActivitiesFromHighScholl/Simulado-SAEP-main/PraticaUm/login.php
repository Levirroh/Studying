<?php
include "db_connect.php";
echo "tela login";
session_start();
if (isset($_POST["entrar"])) {
    $login_usuario = $_POST['login'];
    $senha_usuario = $_POST['senha'];
  
    
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome_usuario = ? OR email_usuario = ?");
    $stmt->bind_param("ss",  $login_usuario, $login_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();



    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        if ($senha_usuario == $row['senha_usuario']){
            $_SESSION['senha'] = $row['senha_usuario'];
            $_SESSION['nome'] = $row['nome_usuario'];
            $_SESSION['email'] = $row['email_usuario'];
            $_SESSION['tipo'] = $row['tipo_usuario'];
            $_SESSION['id_usuario'] = $row['id_usuario'];

            header("Location: index.php");
            exit();
        } else{
            echo"<br> Senha incorreta";
        }
      } else {
       echo'<br> Usuário não existente';
    };
}
if (isset($_POST['irCadastro'])) {
    header("Location: cadastro.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

</head>
<body>
    <form method="POST">
        <div>
            <label for="login">Digite seu nome de usuário</label>
            <input type="text" name="login">
        </div>
        <div>
            <label for="senha">Digite sua senha</label>
            <input type="text" name="senha" id="">
        </div>
        <input type="submit" value="Entrar" name="entrar">
    </form>
    <form method="POST">
        <input type="submit" name="irCadastro" value="Cadastrar-se">
    </form>
</body>
</html> 