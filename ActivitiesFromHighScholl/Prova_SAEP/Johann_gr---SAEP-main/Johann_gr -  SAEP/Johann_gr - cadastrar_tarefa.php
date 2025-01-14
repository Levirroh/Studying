<?php
include "Johann_gr - db_connect.php";

if (isset($_GET["id_tarefa"])) {
    $id_tarefa = $_GET["id_tarefa"];
    $stmt_tarefa = $conn->prepare("SELECT * FROM tarefas INNER JOIN usuarios ON usuarios.id_usuario = tarefas.fk_usuario WHERE id_tarefa = ?");
    $stmt_tarefa->bind_param("i", $id_tarefa);
    $stmt_tarefa->execute();
    $dados_tarefa = $stmt_tarefa->get_result();
    $row = $dados_tarefa->fetch_assoc();
    $id_usuario_get = $row['id_usuario'];
    $prioridade_tarefa_get = $row['prioridade_tarefa'];
    $nome_usuario_get = $row['nome_usuario'];
    $get_id_tarefa = true;
    
} else{
    $get_id_tarefa = false;
}
    $sql_usuarios = "SELECT id_usuario, nome_usuario FROM usuarios";
    $stmt_usuarios = $conn->prepare($sql_usuarios);
    $stmt_usuarios->execute();
    $result_usuarios = $stmt_usuarios->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="Johann_gr - style.css">
</head>
<body>
    <header>
        <div>
            <h1>Tela de Cadastro de Tarefas</h1>
        </div>
        <div>
            <a href="Johann_gr - index.php"><button>Menu Principal</button></a>
            <a href="Johann_gr - cadastrar_tarefa.php"><button>Cadastrar Tarefa</button></a>
            <a href="Johann_gr - cadastrar_usuario.php"><button>Cadastrar Usuário</button></a>
        </div>
    </header>
    <section>
        <form method="POST">
            <div>
                <label for="descricao">Digite a descrição do tarefa</label>
                <br>
                <textarea name="descricao" rows="4" cols="50"><?php if (isset($_GET["id_tarefa"])) {echo $row['descricao_tarefa'];} ?></textarea>
            </div>
            
            <div>
                <label for="setor">Digite o setor tarefa</label>
                <input type="text" name="setor" value="<?php if (isset($_GET["id_tarefa"])) {echo $row['setor_tarefa'];} ?>">
            </div>
            <div>
                <label for="usuario">Digite o usuário</label>
                <select name="usuario">
                <option value="<?php if (isset($_GET["id_tarefa"])) {echo $id_usuario_get;}; ?>" select><?php if (isset($_GET["id_tarefa"])) {echo $nome_usuario_get;} else {echo "Selecione uma opção";}; ?></option>
                    ?>
                    <?php while ($usuarios = $result_usuarios->fetch_assoc()): ?>
                        <option value="<?= $usuarios['id_usuario']; ?>">
                            <?= $usuarios['nome_usuario']; ?>
                        </option>
                    <?php endwhile; 
                    ?>
                </select>
            </div>
            <div>
                <label for="prioridade">Digite a urgência do tarefa</label>
                <select name="prioridade">
                <option value="<?php if (isset($_GET["id_tarefa"])) {echo $prioridade_tarefa_get;}; ?>" select><?php if (isset($_GET["id_tarefa"])) {echo $prioridade_tarefa_get;} else {echo "Selecione uma opção";}; ?></option>
                    <option value="Alta">Alta</option>
                    <option value="Média">Média</option>
                    <option value="Baixa">Baixa</option>
                </select>
            </div>
            <input type="submit" value="Cadastrar" name="cadastrar_tarefa">
        </form>
        <a href="Johann_gr - index.php"><button>Voltar</button></a>
        <?php
        if (isset($_POST["cadastrar_tarefa"])) {
                $descricao = $_POST['descricao'];
                $prioridade = $_POST['prioridade'];
                $setor_tarefa = $_POST['setor'];
                $data_abertura = date("Ymd"); // ano, mes, dia 
                $fk_usuario = $_POST["usuario"];
            if ( $descricao == null OR $prioridade == null OR $setor_tarefa == null OR $fk_usuario == null OR $fk_usuario == 0) {
                echo "Preencha os dados corretamente!";
            } else{
                if (!isset($_GET["id_tarefa"])) {
                    $sql = "INSERT INTO tarefas (fk_usuario, descricao_tarefa, setor_tarefa, status_tarefa, prioridade_tarefa, data_cadastro_tarefa) VALUES ('$fk_usuario', '$descricao','$setor_tarefa', 'A fazer', '$prioridade', '$data_abertura');";
                
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='popup'>Tarefa cadastrada com sucesso!</div>";
                    } else {
                        echo "<div class='popup'>Erro: " . $conn->error . "</div>";
                    }
                } else{
                    $sql = "UPDATE tarefas SET fk_usuario = '$fk_usuario', descricao_tarefa = '$descricao', setor_tarefa = '$setor_tarefa', status_tarefa = 'A fazer' , prioridade_tarefa = '$prioridade', data_cadastro_tarefa = '$data_abertura' WHERE id_tarefa = '$id_tarefa'";
                
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='popup'>Tarefa cadastrada com sucesso!</div>";
                        header ("Location: Johann_gr - index.php");
                        exit();

                    } else {
                        echo "<div class='popup'>Erro: " . $conn->error . "</div>";
                    }
                }
            }
        }
        ?>
</section>
</body>
</html> 