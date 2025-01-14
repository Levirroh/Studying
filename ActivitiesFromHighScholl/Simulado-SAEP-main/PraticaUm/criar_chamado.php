<?php
include "db_connect.php";
echo "tela criar chamado";
session_start();
if (isset($_POST["cadastrar_chamado"])) {
    $descricao = $_POST['descricao'];
    $criticidade = $_POST['criticidade'];
    $id_usuario = $_SESSION['id_usuario'];
    $data_abertura = date("Ymd"); // ano, mes, dia 
    
    
    $sql = "INSERT INTO chamados (fk_usuario, descricao_chamado, status_chamado, criticidade_chamado, data_abertura_chamado) VALUES ('$id_usuario', '$descricao', 'Aberto', '$criticidade', '$data_abertura');";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green;'>Chamado realizado com sucesso!</div>";
    } else {
        echo "<div style='color: red;'>Erro: " . $conn->error . "</div>";
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
            <label for="descricao">Digite a descrição do chamado</label>
            <br>
            <textarea name="descricao" rows="4" cols="50"></textarea>
        </div>
        <div>
            <label for="criticidade">Digite a criticidade do chamado</label>
            <select name="criticidade">
                <option disabled>Selecione a criticidade do chamado</option>
                <option value="Alta">Alta</option>
                <option value="Média">Média</option>
                <option value="Baixa">Baixa</option>
            </select>
        </div>
        <input type="submit" value="Criar chamado" name="cadastrar_chamado">
    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html> 