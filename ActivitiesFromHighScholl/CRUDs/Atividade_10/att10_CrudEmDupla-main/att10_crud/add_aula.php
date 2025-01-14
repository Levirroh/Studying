<?php 
include "bd.php";

// Verifica se o formulário foi enviado
if (isset($_POST["adicionar"])) {
    $sala_aula = $_POST['sala'];
    $dia = $_POST['dia'];
    $materia = $_POST['materia'];
    $hora = $_POST['hora'];
    $anotacoes = $_POST['anotacoes'];
    $professor_id = $_POST['professor']; // Agora estamos pegando o ID diretamente do select
    
    // Valida os campos
    if (empty($sala_aula) || empty($dia) || empty($materia) || empty($hora) || empty($professor_id)) {
        echo 'Valor inválido';
    } else {
        // Inserir os dados na tabela `aulas`
        $sql_aula = "INSERT INTO aulas (sala_aula, dia_aula, materia_aula, hora_aula, anotacoes) 
                     VALUES (?, ?, ?, ?, ?)";
        $stmt_aula = $conn->prepare($sql_aula);
        $stmt_aula->bind_param('sssss', $sala_aula, $dia, $materia, $hora, $anotacoes);
        $stmt_aula->execute();
        
        // Verifica se a aula foi inserida com sucesso
        if ($stmt_aula->affected_rows > 0) {
            // Obtém o ID da aula recém-inserida
            $id_aula = $stmt_aula->insert_id;

            // Inserir na tabela `diario` relacionando professor e aula
            $sql_diario = "INSERT INTO diario (fk_professor, fk_aula) VALUES (?, ?)";
            $stmt_diario = $conn->prepare($sql_diario);
            $stmt_diario->bind_param('ii', $professor_id, $id_aula);
            $stmt_diario->execute();

            if ($stmt_diario->affected_rows > 0) {
                echo "Novo registro criado com sucesso!";
            } else {
                echo "Erro ao inserir no diário.";
            }
        } else {
            echo "Erro ao inserir a aula.";
        }
    }
}

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
                        <input type='submit' name='delete' value='Deletar Dados'>
                    </form>
                    </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado";
}

// Deletar após apertar o botão "Deletar Dados"
if (isset($_POST["delete"])) {
    if (isset($_POST['id_aula']) && !empty($_POST['id_aula'])) {
        $id_del = $_POST['id_aula']; // Obtém o ID da aula a ser deletada
        
        // Deletar da tabela `diario` e da tabela `aulas`
        $sql_delete_diario = "DELETE FROM diario WHERE fk_aula = ?";
        $sql_delete_aula = "DELETE FROM aulas WHERE id_aula = ?";
        
        // Preparar e executar a exclusão da tabela `diario`
        $stmt_del_diario = $conn->prepare($sql_delete_diario);
        $stmt_del_diario->bind_param('i', $id_del);
        $stmt_del_diario->execute();
        
        // Preparar e executar a exclusão da tabela `aulas`
        $stmt_del_aula = $conn->prepare($sql_delete_aula);
        $stmt_del_aula->bind_param('i', $id_del);
        $stmt_del_aula->execute();

        if ($stmt_del_diario->affected_rows > 0 && $stmt_del_aula->affected_rows > 0) {
            echo "Registro deletado com sucesso!";
        } else {
            echo "Erro ao deletar o registro.";
        }
    } else {
        echo "ID da aula não encontrado.";
    }
    header ("Location: add_aula.php");
    exit();
}

// Consulta SQL para buscar os professores
$sql = "SELECT id_professor, nome_professor FROM professores";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

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


    <form method="POST" action="">
        <label for="sala">Sala da Aula: </label>
        <input type="text" name="sala" required>
        
        <label for="dia">Dia da aula: </label>
        <select name="dia" required>
          <option value="Segunda-Feira">Segunda-Feira</option>
          <option value="Terca-Feira">Terça-Feira</option>
          <option value="Quarta-Feira">Quarta-Feira</option>
          <option value="Quinta-Feira">Quinta-Feira</option>
          <option value="Sexta-Feira">Sexta-Feira</option>
        </select>

        <label for="materia">Matéria da Aula: </label>
        <select name="materia" required>
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

        <label for="professor">Professor</label>
        <select name="professor" required>
            <?php while ($professor = $result->fetch_assoc()): ?>
                <option value="<?= $professor['id_professor']; ?>">
                    <?= $professor['nome_professor']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="hora">Horário da Aula: </label>
        <input type="time" name="hora" required>

        <label for="anotacoes">Anotações da Aula: </label>
        <input type="text" name="anotacoes">

        <br>
        <input type="submit" name="adicionar">
    </form>
    <a href="index.php"><button>Ver Quadro de Horário</button></a>
    <a href="add_professor.php"><button>Inserir Professor</button></a>

</body>
</html>
