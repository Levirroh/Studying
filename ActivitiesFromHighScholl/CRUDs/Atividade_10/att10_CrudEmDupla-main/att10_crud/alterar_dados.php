<?php
include "bd.php";

// Consulta SQL para exibir os registros do diário
$sql = "SELECT d.fk_professor, d.fk_aula, a.sala_aula, a.dia_aula, a.hora_aula, a.materia_aula, a.anotacoes, p.nome_professor 
        FROM aulas AS a 
        INNER JOIN diario AS d ON a.id_aula = d.fk_aula 
        INNER JOIN professores AS p ON d.fk_professor = p.id_professor";
$result = $conn->query($sql);

// Exibindo a tabela de aulas
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Id da Aula</th>
                <th>Dia da Aula</th>
                <th>Sala da Aula</th>
                <th>Hora da Aula</th>
                <th>Professor Responsável</th>
                <th>Matéria da Aula</th>
                <th>Anotações</th>
                <th>Ações</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fk_aula']}</td>
                <td>{$row['dia_aula']}</td> 
                <td>{$row['sala_aula']}</td>
                <td>{$row['hora_aula']}</td>
                <td>{$row['nome_professor']}</td>
                <td>{$row['materia_aula']}</td>
                <td>{$row['anotacoes']}</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id_aula' value='{$row['fk_aula']}'>
                        <input type='submit' name='alterar' value='Alterar Dados'>
                    </form>
                    </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado";
}

// Consulta SQL para buscar os professores
$sql_professores = "SELECT id_professor, nome_professor FROM professores";
$stmt = $conn->prepare($sql_professores);
$stmt->execute();
$result_professores = $stmt->get_result();

// Verificando se o botão "alterar" foi clicado
if (isset($_POST["alterar"])) {
    $id_update = $_POST["id_aula"]; // Obtendo o ID da aula selecionada

    echo "ID da aula a ser alterada: $id_update
    <br>Valores a serem alterados:
    <br>
    <form method='POST' action=''>
        <input type='hidden' name='id_aula' value='$id_update'>
        <label for='sala'>Sala da Aula: </label>
        <input type='text' name='sala' required><br>

        <label for='dia'>Dia da aula: </label>
        <select name='dia' required>
            <option value='Segunda-Feira'>Segunda-Feira</option>
            <option value='Terca-Feira'>Terça-Feira</option>
            <option value='Quarta-Feira'>Quarta-Feira</option>
            <option value='Quinta-Feira'>Quinta-Feira</option>
            <option value='Sexta-Feira'>Sexta-Feira</option>
        </select><br>

        <label for='materia'>Matéria da Aula: </label>
        <select name='materia' required>
            <option value='matematica'>Matemática</option>
            <option value='portugues'>Português</option>
            <option value='ingles'>Inglês</option>
            <option value='historia'>História</option>
            <option value='geografia'>Geografia</option>
            <option value='filosofia'>Filosofia</option>
            <option value='quimica'>Química</option>
            <option value='fisica'>Física</option>
            <option value='biologia'>Biologia</option>
            <option value='ef'>Educação Física</option>
            <option value='tecnico'>Técnico</option>
        </select><br>

        <label for='professor'>Professor</label>
        <select name='professor' required>";
    
    // Loop para exibir a lista de professores
    while ($professor = $result_professores->fetch_assoc()) {
        echo "<option value='{$professor['id_professor']}'>{$professor['nome_professor']}</option>";
    }

    echo "</select><br>

        <label for='hora'>Horário da Aula: </label>
        <input type='time' name='hora' required><br>

        <label for='anotacoes'>Anotações da Aula: </label>
        <input type='text' name='anotacoes'><br>

        <input type='submit' name='salvar' value='Salvar Alterações'>
    </form>";
}

// Verificando se os novos valores foram enviados
if (isset($_POST["salvar"])) {
    $id_update = $_POST['id_aula'];
    $sala = $_POST['sala'];
    $dia = $_POST['dia'];
    $materia = $_POST['materia'];
    $professor = $_POST['professor'];
    $hora = $_POST['hora'];
    $anotacoes = $_POST['anotacoes'];

    // Atualizando os dados da aula na tabela 'aulas'
    $sql_update = "UPDATE aulas 
                   SET sala_aula = ?, dia_aula = ?, materia_aula = ?, hora_aula = ?, anotacoes = ?
                   WHERE id_aula = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('sssssi', $sala, $dia, $materia, $hora, $anotacoes, $id_update);
    $stmt_update->execute();

    // Atualizando o professor responsável na tabela 'diario'
    $sql_update_professor = "UPDATE diario SET fk_professor = ? WHERE fk_aula = ?";
    $stmt_prof = $conn->prepare($sql_update_professor);
    $stmt_prof->bind_param('ii', $professor, $id_update);
    $stmt_prof->execute();

    echo "Dados da aula atualizados com sucesso!";
    header ("Location: alterar_aula.php");
    exit();
}

$conn->close();
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
<br>



    </form>
    <a href="index.php"><button>Ver Quadro de Horário</button></a>
    <a href="add_professor.php"><button>Inserir Professor</button></a>

</body>
</html>