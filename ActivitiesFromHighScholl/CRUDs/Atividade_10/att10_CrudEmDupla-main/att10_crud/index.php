<?php
// Deve ser possível ver o quadro de horários com os dados da aula e tudo mais.

// Além disso, deve ser possível ir até uma página para inserir um professor ou aula.

// Ideia: no quadro de horário pode ser possível deletar o horário/aula.

// Ideia: no quadro de horário pode ser possível alterar o dado de uma aula


// nome Professor, ID do professor, dia da aula, sala da aula, ID da aula

// ============== READ ============== //

include 'bd.php';

$sql = "SELECT d.fk_professor, d.fk_aula, a.sala_aula, a.dia_aula, a.hora_aula, a.materia_aula, a.anotacoes, p.nome_professor 
        FROM aulas AS a 
        INNER JOIN diario AS d ON a.id_aula = d.fk_aula 
        INNER JOIN professores AS p ON d.fk_professor = p.id_professor";
$result = $conn->query($sql);
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
    header ("Location: index.php");
    exit();
}

$conn -> close();
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud em dupla</title>
</head>
<body>
    
    <h3>Quadro de Horário</h3>
    <h4>Ações:</h4>
    <a href="add_professor.php"><button>Professores</button></a>
    <a href="add_aula.php"><button>Criar Aulas</button></a>
    <a href="alterar_dados.php"><button>Alterar Aulas</button></a>
</body>
</html>