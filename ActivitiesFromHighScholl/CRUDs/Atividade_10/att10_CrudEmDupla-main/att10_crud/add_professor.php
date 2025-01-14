<?php

include 'bd.php';

// Adicionar novo professor
if (isset($_POST["adicionar"])) {
    $nome = $_POST['nome_professor'];
    $formacao = $_POST['formacao'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO professores (nome_professor, formacao, cpf) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nome, $formacao, $cpf);

    if ($stmt->execute()) {
        echo "Novo professor registrado com sucesso!";
    } else {
        echo "Erro ao registrar professor.";
    }
}

// Exibir todos os professores
$sql = "SELECT * FROM professores";
$result = $conn->query($sql);

// Exibindo a tabela de professores
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID do Professor</th>
                <th>Nome do Professor</th>
                <th>Formação</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_professor']}</td>
                <td>{$row['nome_professor']}</td>
                <td>{$row['formacao']}</td>
                <td>{$row['cpf']}</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id_professor' value='{$row['id_professor']}'>
                        <input type='submit' name='delete' value='Deletar Dados'>
                    </form>
                    <form method='POST' action=''>
                        <input type='hidden' name='id_professor' value='{$row['id_professor']}'>
                        <input type='submit' name='alterar' value='Alterar Dados'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

// Deletar professor
if (isset($_POST["delete"])) {
    $id_professor = $_POST['id_professor'];

    $sql_delete = "DELETE FROM professores WHERE id_professor = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param('i', $id_professor);

    if ($stmt_delete->execute()) {
        echo "Registro deletado com sucesso!";
    } else {
        echo "Erro ao deletar o registro.";
    }

    header("Location: add_professor.php");
    exit();
}

// Alterar professor (exibir formulário)
if (isset($_POST["alterar"])) {
    echo "<br>
    <br>===/ALTERANDO VALORES\===
    <br>
    <br>";
    $id_update = $_POST["id_professor"]; // Obtendo o ID do professor

    $sql_select = "SELECT * FROM professores WHERE id_professor = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param('i', $id_update);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();

    if ($row = $result_select->fetch_assoc()) {
        echo "
        <form method='POST' action=''>
            <input type='hidden' name='id_professor' value='{$row['id_professor']}'>
            <label for='nome'>Nome do Professor: </label>
            <input type='text' name='nome' value='{$row['nome_professor']}' required><br>

            <label for='formacao'>Formação do Professor: </label>
            <select name='formacao' required>
                <option value='matematica' ".($row['formacao'] == 'matematica' ? 'selected' : '').">Matemática</option>
                <option value='portugues' ".($row['formacao'] == 'portugues' ? 'selected' : '').">Português</option>
                <option value='ingles' ".($row['formacao'] == 'ingles' ? 'selected' : '').">Inglês</option>
                <option value='historia' ".($row['formacao'] == 'historia' ? 'selected' : '').">História</option>
                <option value='geografia' ".($row['formacao'] == 'geografia' ? 'selected' : '').">Geografia</option>
                <option value='filosofia' ".($row['formacao'] == 'filosofia' ? 'selected' : '').">Filosofia</option>
                <option value='quimica' ".($row['formacao'] == 'quimica' ? 'selected' : '').">Química</option>
                <option value='fisica' ".($row['formacao'] == 'fisica' ? 'selected' : '').">Física</option>
                <option value='biologia' ".($row['formacao'] == 'biologia' ? 'selected' : '').">Biologia</option>
                <option value='ef' ".($row['formacao'] == 'ef' ? 'selected' : '').">Educação Física</option>
                <option value='tecnico' ".($row['formacao'] == 'tecnico' ? 'selected' : '').">Técnico</option>
                <option value='cursando' ".($row['formacao'] == 'cursando' ? 'selected' : '').">Cursando</option>
            </select><br>

            <label for='cpf'>CPF do Professor: </label>
            <input type='text' name='cpf' value='{$row['cpf']}' required><br>

            <input type='submit' name='salvar_alteracoes' value='Salvar Alterações'>
        </form>";
        
        echo "<br>
        <br>
        <br>
        ===/INSERINDO VALORES NOVOS\===
        <br>
        <br>
        <br>";
    }
}

// Salvar alterações do professor
if (isset($_POST["salvar_alteracoes"])) {
    $id_professor = $_POST['id_professor'];
    $nome = $_POST['nome'];
    $formacao = $_POST['formacao'];
    $cpf = $_POST['cpf'];

    $sql_update = "UPDATE professores SET nome_professor = ?, formacao = ?, cpf = ? WHERE id_professor = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('sssi', $nome, $formacao, $cpf, $id_professor);

    if ($stmt_update->execute()) {
        echo "Dados do professor atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados do professor.";
    }

    header("Location: add_professor.php");
    exit();
}

$conn->close();

?>

<form method="POST" action="add_professor.php">
    Nome: <input type="text" name="nome_professor" required>
    Formação: <select name="formacao" required>
          <option value="matematica">Matemática</option>
          <option value="portugues">Português</option>
          <option value="ingles">Inglês</option>
          <option value="historia">História</option>
          <option value="geografia">Geografia</option>
          <option value="filosofia">Filosofia</option>
          <option value="quimica">Química</option>
          <option value="fisica">Física</option>
          <option value="biologia">Biologia</option>
          <option value="ef">Educação Física</option>
          <option value="tecnico">Técnico</option>
        </select>
    CPF: <input type="text" name="cpf" required>
    <input type="submit" name="adicionar">
</form>

    <a href="index.php"><button>Ver Quadro de Horário</button></a>
    <a href="add_aula.php"><button>Criar Aulas</button></a>