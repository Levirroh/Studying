<?php
include 'bd.php';

if (isset($_POST["salvar"])) {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $nota_id = $_POST['nota_id']; // Nota o ID

    if ($nota_id == 0) { // Se não há id, cria uma nova nota
        $sql = "INSERT INTO notas (titulo_nota, texto_nota) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $titulo, $conteudo);
        if ($stmt->execute()) {
            echo "Nota salva com sucesso!";
        } else {
            echo "Erro ao salvar nota.";
        }
    } else {
        // Atualiza a nota existente
        $sql = "UPDATE notas SET titulo_nota = ?, texto_nota = ? WHERE id _nota= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $titulo, $conteudo, $nota_id);
        if ($stmt->execute()) {
            echo "Nota alterada com sucesso!";
        } else {
            echo "Erro ao alterar nota.";
        }
    }
}

if (isset($_POST["deletar"]) && isset($_POST['nota_id'])) {
    $nota_id = $_POST['nota_id']; // Usa o ID da nota para deletar
    $sql = "DELETE FROM notas WHERE id_nota = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nota_id);

    if ($stmt->execute()) {
        echo "Nota deletada com sucesso!";
    } else {
        echo "Erro ao deletar nota.";
    }
}

// Buscar todos os títulos de notas para exibir no <select>
$sql = "SELECT id_nota, titulo_nota FROM notas";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se uma nota foi selecionada
$titulo_nota = '';
$conteudo_nota = '';
$nota_id = 0;
if (isset($_GET['nota_id'])) {
    $nota_id = $_GET['nota_id'];

    // Buscar o título e o conteúdo da nota com base no ID selecionado
    $sql = "SELECT titulo_nota, texto_nota FROM notas WHERE id_nota = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nota_id);
    $stmt->execute();
    $result_nota = $stmt->get_result();

    // Verifica se algum resultado foi retornado
    if ($row_nota = $result_nota->fetch_assoc()) {
        $titulo_nota = $row_nota['titulo_nota'];
        $conteudo_nota = $row_nota['texto_nota'];
    } else {
        if ($titulo_nota == null && $conteudo_nota == null) {
            
        } else {
        echo "Nota não encontrada!";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Bloco de Notas</title>
</head>
<body>

    <!-- Formulário para selecionar uma nota existente -->
    <form method="GET" action="">
        <label for="notas">Selecione uma nota:</label>
        <select name="nota_id" id="notas" onchange="this.form.submit()">
            <option value="">Nova nota</option>
            <?php while ($titulo = $result->fetch_assoc()): ?>
                <option value="<?= $titulo['id_nota']; ?>" <?= isset($nota_id) && $nota_id == $titulo['id_nota'] ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($titulo['titulo_nota']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </form>

    <section>
        <!-- Formulário para salvar ou deletar uma nota -->
        <form method="POST" action="">
            <input type="hidden" name="nota_id" value="<?= $nota_id ?>">

            <div class="container">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" class="texto" id="titulo" required value="<?= htmlspecialchars($titulo_nota); ?>">
            </div>

            <div class="container">
                <label for="conteudo">Texto:</label>
                <textarea name="conteudo" class="texto" id="conteudo" rows="20" required><?= htmlspecialchars($conteudo_nota); ?></textarea>
            </div>
            <div>
                <input type="submit" name="deletar" value="Deletar" class="acoes">
                <input type="submit" name="salvar" value="Salvar" class="acoes">
            </div>
        </form>
    </section>

</body>
</html>