<?php
include "Johann_gr - db_connect.php";
   

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="Johann_gr - style.css">
</head>
<body>
    <header>
        <div>
            <h1>Tela de Cadastro de Usuários</h1>
        </div>
        <div>
            <a href="Johann_gr - index.php"><button>Menu Principal</button></a>
            <a href="Johann_gr - cadastrar_tarefa.php"><button>Cadastrar Tarefa</button></a>
            <a href="Johann_gr - cadastrar_usuario.php"><button>Cadastrar Usuário</button></a>
        </div>
    </header>
    <section>
        <form method="POST">
            <div>
                <label for="login">Digite o nome do usuário</label>
                <input type="text" name="login">
            </div>
            <div>
                <label for="email">Digite o email do usuário</label>
                <input type="email" name="email">
            </div>
            <input type="submit" value="cadastrar" name="cadastrar">
        </form>
    <?php
    if (isset($_POST["cadastrar"])) {
        $login_usuario = $_POST['login'];
        $email_usuario = $_POST['email'];
        if ($login_usuario == null OR !filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) {
            echo 'Os dados devem estar preenchidos corretamente';
        }
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email_usuario = ? OR nome_usuario = ?");
        $stmt->bind_param("ss",   $email_usuario, $nome_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            echo "<br>Um usuário com este email já existe";
        } else {
            $sql = "INSERT INTO usuarios (nome_usuario, email_usuario) VALUES ('$login_usuario', '$email_usuario');";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div class='popup'>Cadastro realizado com sucesso! Você pode sair desta tela agora.</div>";
            } else {
                echo "<div class='popup'>Erro: " . $conn->error . "</div>";
            }
        }
    
    };
    ?>
    </section>
</body>
</html> 