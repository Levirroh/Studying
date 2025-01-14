<?php
include "db_connect.php";
session_start();
echo "tela index";
if (!isset($_SESSION["nome"])){
    session_destroy();  
    header("Location: login.php");
    exit();
};
    $id_usuario = $_SESSION['id_usuario'];
    $stmt = $conn->prepare("SELECT * FROM chamados INNER JOIN usuarios ON usuarios.id_usuario = chamados.fk_usuario");
    $stmt->execute();
    $resultado = $stmt->get_result();



if ($resultado->num_rows > 0) {
    echo "
        <table border='1'>
            <tr>
                <th> ID do Chamado </th>
                <th> ID do cliente </th>
                <th> Email do cliente </th>
                <th> Telefone do cliente </th>
                <th> ID do colaborador (Pode estar vazio) </th>
                <th> Descrição do chamado </th>
                <th> Status do chamado </th>
                <th> Criticidade do chamado </th>
                <th> Data de abertura do chamado </th>
                <th> Opções </th>                
            </tr>
        ";
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
                    <td> {$row['id_chamado']} </td>
                    <td> {$row['fk_usuario']} </td>
                    <td> {$row['email_usuario']} </td>
                    <td> {$row['telefone_usuario']} </td>
                    <td> {$row['fk_colaborador']} </td>
                    <td> {$row['descricao_chamado']} </td>
                    <td> {$row['status_chamado']} </td>
                    <td> {$row['criticidade_chamado']} </td>
                    <td> {$row['data_abertura_chamado']}</td>
                    <td> <form method='POST' action=''>
                            <input type='hidden' name='id_chamado' value='{$row['id_chamado']}'>
                            <input type='submit' name='deletar' value='Deletar Chamado'>
                        </form>
                        <form method='POST' action=''>
                            <input type='hidden' name='id_chamado' value='{$row['id_chamado']}'>
                            <input type='submit' name='pegar' value='Pegar chamado'>
                        </form>
                        </td>
                </tr>";
    }
    echo "</tbody></table>";
} else {
    echo '
        Nenhum chamado encontrado para solicitação.';
}
if (isset($_POST["deletar"])){
    $id_chamado = $_POST['id_chamado'];
    $sql = "DELETE FROM chamados WHERE id_chamado = ?";

    $stmt_deletar = $conn->prepare($sql);
    $stmt_deletar->bind_param('i', $id_chamado);
    $stmt_deletar->execute();

    if ($stmt_deletar->affected_rows > 0) {
        echo "Registro deletado com sucesso!";
        echo "<br>Talvez seja necessário atualizar a página!";
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao deletar o registro.";
    }
};

if (isset($_POST["pegar"])){
    $id_chamado = $_POST['id_chamado'];
    $sql = "UPDATE chamados SET fk_colaborador = ? WHERE id_chamado = ?";

    $stmt_alterar = $conn->prepare($sql);
    $stmt_alterar->bind_param('ii', $id_usuario, $id_chamado);
    $stmt_alterar->execute();

    if ($stmt_alterar->affected_rows > 0) {
        echo "Chamado coletado pelo seu ID!";
        echo "<br>Talvez seja necessário atualizar a página!";
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao coletar registro.";
    }
};

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

</head>
<body>
    <br>
    <a href="criar_chamado.php"><button>Criar chamado</button></a>
    <br>
    <a href="login.php"><button>Voltar</button></a>


</body>
</html> 