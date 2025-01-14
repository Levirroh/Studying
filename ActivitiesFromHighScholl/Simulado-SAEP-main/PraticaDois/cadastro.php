<?php
include "db_connect.php";
echo "tela cadastro";
session_start();

if (isset($_POST["cadastrar"])) {
    $login_usuario = $_POST['login'];
    $senha_usuario = $_POST['senha'];
    $email_usuario = $_POST['email'];
    $telefone_usuario = $_POST['telefone'];
    $cpf = $_POST['cpf'];


    // |créditos| função para verificar cpf matematicamente pega em: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
 
    function ehCPF($cpf) { // 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
    function ehTelefone($telefone_usuario){
        if  (strlen($telefone_usuario) >= 8 AND strlen($telefone_usuario) <= 9){
            return true;
        } else {
            echo '<br><br>Digite um telefone válido, contendo 8 ou 9 dígitos. <br>';
        }
    }
    if (ehCPF($cpf) === true AND ehTelefone($telefone_usuario)){

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome_usuario = ? OR email_usuario = ? OR cpf_usuario = ?");
        $stmt->bind_param("sss",  $login_usuario, $email_usuario, $cpf);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            echo "<br>Um usuário com este nome ou email já existe";
        } else {
            $stmt = $conn->prepare("INSERT INTO usuarios (nome_usuario, senha_usuario, email_usuario, telefone_usuario, tipo_usuario, cpf_usuario) VALUES (?, ?, ?, ?, 'cliente', ?)");
            $stmt->bind_param("sssis", $login_usuario, $senha_usuario, $email_usuario, $telefone_usuario, $cpf);
            $stmt->execute();
            $sql = "INSERT INTO usuarios (nome_usuario, senha_usuario, email_usuario, telefone_usuario, tipo_usuario, cpf_usuario) VALUES ('$login_usuario', '$senha_usuario', '$email_usuario', $telefone_usuario, 'cliente', '$cpf');";
            
            if ($conn->query($sql) === TRUE) {
                echo "<div style='color: green;'>Cadastro realizado com sucesso!</div>";
                header("Location: login.php");
                exit();
            } else {
                echo "<div style='color: red;'>Erro: " . $conn->error . "</div>";
            }
        
        };
    } else{
        echo " <br> Os valores digitados não são válidos <br><br><br>";
    }
   
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
            <label for="email">Digite seu email</label>
            <input type="text" name="email" id="">
        </div>
        <div>
            <label for="telefone">Digite seu telefone</label>
            <input type="number" name="telefone" id="">
        </div>
        <div>
            <label for="cpf">Digite seu CPF</label>
            <input type="text" name="cpf" id="">
        </div>
        <div>
            <label for="senha">Digite sua senha</label>
            <input type="text" name="senha" id="">
        </div>
        
        <input type="submit" value="cadastrar" name="cadastrar">
    </form>

    <a href="index.php"><button>Voltar</button></a>

</body>
</html> 