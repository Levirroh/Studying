<?php
include "db_connect.php";
echo "tela criar solicitacao";
session_start();
if (isset($_POST["cadastrar_solicitacao"])) {
    $descricao = $_POST['descricao'];
    $urgencia = $_POST['urgencia'];
    $id_usuario = $_SESSION['id_usuario'];
    $data_abertura = date("Ymd"); // ano, mes, dia 
    
    
    $sql = "INSERT INTO solicitacoes (fk_usuario, descricao_solicitacao, status_solicitacao, urgencia_solicitacao, data_abertura_solicitacao) VALUES ('$id_usuario', '$descricao', 'Pendente', '$urgencia', '$data_abertura');";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green;'>solicitação realizado com sucesso!</div>";
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
            <label for="descricao">Digite a descrição do solicitacao</label>
            <br>
            <textarea name="descricao" rows="4" cols="50"></textarea>
        </div>
        <div>
            <label for="urgencia">Digite a urgência do solicitacao</label>
            <select name="urgencia">
                <option disabled>Selecione a urgência do solicitacao</option>
                <option value="Alta">Alta</option>
                <option value="Média">Média</option>
                <option value="Baixa">Baixa</option>
            </select>
        </div>
        <input type="submit" value="Criar solicitacao" name="cadastrar_solicitacao">
    </form>
    <a href="index.php"><button>Voltar</button></a>
</body>
</html> 