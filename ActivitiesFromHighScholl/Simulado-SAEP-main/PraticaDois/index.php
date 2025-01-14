<?php
include "db_connect.php";
session_start();
echo "tela index";
if ($_SESSION['tipo'] == 'funcionario'){
    echo '<br>';
    echo '<br>';
    echo 'Cadastrar novo funcionário:';
    echo '<br>';
    echo "<a href='cadastrar_funcionario'><button>Cadastrar Funcionário</button></a>";
    echo '<br>';
    echo '<br>';
}
if (!isset($_SESSION["nome"])){
    session_destroy();  
    header("Location: login.php");
    exit();
};
$id_usuario = $_SESSION['id_usuario'];

if (isset($_POST['filtro_urgencia'])){
    $urgencia = $_POST['urgencia'];
    $stmt = $conn->prepare("SELECT * FROM solicitacoes INNER JOIN usuarios ON usuarios.id_usuario = solicitacoes.fk_usuario WHERE urgencia_solicitacao = '$urgencia';");
    $stmt->execute();
    $resultado = $stmt->get_result();
} elseif (isset($_POST['filtro_funcionario'])){
    $funcionario = $_POST['funcionario'];
    $stmt = $conn->prepare("SELECT * FROM solicitacoes INNER JOIN usuarios ON usuarios.id_usuario = solicitacoes.fk_usuario WHERE fk_colaborador = '$funcionario';");
    $stmt->execute();
    $resultado = $stmt->get_result();
} elseif (isset($_POST['filtro_status'])){
    $status = $_POST['status'];
    $stmt = $conn->prepare("SELECT * FROM solicitacoes INNER JOIN usuarios ON usuarios.id_usuario = solicitacoes.fk_usuario WHERE status_solicitacao = '$status';");
    $stmt->execute();
    $resultado = $stmt->get_result();
} else if(isset($_POST['cancelar'])) {
    $stmt = $conn->prepare("SELECT * FROM solicitacoes INNER JOIN usuarios ON usuarios.id_usuario = solicitacoes.fk_usuario");
    $stmt->execute();
    $resultado = $stmt->get_result();
} else{
    $stmt = $conn->prepare("SELECT * FROM solicitacoes INNER JOIN usuarios ON usuarios.id_usuario = solicitacoes.fk_usuario");
    $stmt->execute();
    $resultado = $stmt->get_result();
}
if (isset($_POST["deletar"])){
    $id_solicitacao = $_POST['id_solicitacao'];
    $sql = "DELETE FROM solicitacoes WHERE id_solicitacao = ?";

    $stmt_deletar = $conn->prepare($sql);
    $stmt_deletar->bind_param('i', $id_solicitacao);
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
    $id_solicitacao = $_POST['id_solicitacao'];
    $sql = "UPDATE solicitacoes SET fk_colaborador = ?, status_solicitacao = 'Em andamento'  WHERE id_solicitacao = ?";

    $stmt_alterar = $conn->prepare($sql);
    $stmt_alterar->bind_param('ii', $id_usuario, $id_solicitacao);
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

if (isset($_POST["soltar"])){
    $id_solicitacao = $_POST['id_solicitacao'];
    $sql = "UPDATE solicitacoes SET fk_colaborador = ?, status_solicitacao = 'Pendente'  WHERE id_solicitacao = ?";

    $stmt_alterar = $conn->prepare($sql);
    $stmt_alterar->bind_param('ii', $id_usuario, $id_solicitacao);
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

if (isset($_POST["terminar"])){
    $id_solicitacao = $_POST['id_solicitacao'];
    $sql = "UPDATE solicitacoes SET fk_colaborador = ?, status_solicitacao = 'Finalizada' WHERE id_solicitacao = ?";

    $stmt_alterar = $conn->prepare($sql);
    $stmt_alterar->bind_param('ii', $id_usuario, $id_solicitacao);
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

$sql_funcionarios = "SELECT id_usuario, nome_usuario FROM usuarios WHERE tipo_usuario = 'funcionario'";
$stmt_funcionarios = $conn->prepare($sql_funcionarios);
$stmt_funcionarios->execute();
$result_funcionarios = $stmt_funcionarios->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

</head>
<body>
    <br>
    <a href="criar_solicitacao.php"><button>Criar solicitação</button></a>
    <br>
    <a href="login.php"><button>Voltar</button></a>
    <h3>Filtrar por:</h3>

    <form method="POST">
        <label for="status">Status</label>
        <select name="status" id="">
            <option value="Pendente">Pendente</option>
            <option value="Em Andamento">Em andamento</option>
            <option value="Finalizada">Finalizada</option>
        </select>
        <input type="submit" name="filtro_status" value="Filtrar">
        </form>
    <form method="POST">
        <label for="urgencia">Urgência</label>
        <select name="urgencia" id="">
            <option value="Alta">Alta</option>
            <option value="Média">Média</option>
            <option value="Baixa">Baixa</option>
        </select>
        <input type="submit" name="filtro_urgencia" value="Filtrar">
    </form>
    <form method="POST">
        <label for="funcionario">Funcionario</label>
        <select name="funcionario" id="">
            <?php while ($funcionario = $result_funcionarios->fetch_assoc()): ?>
                <option value="<?= $funcionario['id_usuario']; ?>">
                    <?= $funcionario['nome_usuario']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="filtro_funcionario" value="Filtrar">
    </form>
    <form method="POST">
        <input type="submit" name="cancelar" value="Cancelar Filtro">
    </form>
    

    <?php
    if ($resultado->num_rows > 0) {
        echo "
            <table border='1'>
                <tr>
                    <th> ID do solicitacao </th>
                    <th> ID do cliente </th>
                    <th> Email do cliente </th>
                    <th> Telefone do cliente </th>
                    <th> CPF do cliente </th>
                    <th> ID do colaborador (Pode estar vazio) </th>
                    <th> Descrição do solicitacao </th>
                    <th> Status do solicitacao </th>
                    <th> Urgência do solicitacao </th>
                    <th> Data de abertura do solicitacao </th>
                    <th> Opções </th>                
                </tr>
            ";
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>
                        <td> {$row['id_solicitacao']} </td>
                        <td> {$row['fk_usuario']} </td>
                        <td> {$row['email_usuario']} </td>
                        <td> {$row['telefone_usuario']} </td>
                        <td> {$row['cpf_usuario']} </td>
                        <td> {$row['fk_colaborador']} </td>
                        <td> {$row['descricao_solicitacao']} </td>
                        <td> {$row['status_solicitacao']} </td>
                        <td> {$row['urgencia_solicitacao']} </td>
                        <td> {$row['data_abertura_solicitacao']}</td>
                        <td> <form method='POST' action=''>
                                <input type='hidden' name='id_solicitacao' value='{$row['id_solicitacao']}'>
                                <input type='submit' name='deletar' value='Deletar solicitação'>
                            </form>
                            <form method='POST' action=''>
                                <input type='hidden' name='id_solicitacao' value='{$row['id_solicitacao']}'>
                                <input type='submit' name='pegar' value='Pegar solicitação'>
                            </form>
                            <form method='POST'>
                                <input type='hidden' name='id_solicitacao' value='{$row['id_solicitacao']}'>
                                <input type='submit' name='soltar' value='Soltar solicitação'>
                            </form>
                            <form method='POST'>
                                <input type='hidden' name='id_solicitacao' value='{$row['id_solicitacao']}'>
                                <input type='submit' name='terminar' value='Concluir solicitação'>
                            </form>
                            </td>
                    </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo '
            Nenhum solicitação encontrado para solicitação.';
    }
    ?>
</body>
</html> 