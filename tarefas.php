<?php
session_start();

// Se não houver sessão ativa, manda o usuário para a tela de login
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login_form.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minhas Tarefas</title>
</head>
<body>
    <h1>Olá, <?php echo $_SESSION['nome_usuario']; ?>!</h1>
    <a href="logout.php">Sair</a>

    <hr>
    <h2>Cadastrar Nova Tarefa</h2>
    <form action="tarefa_processa.php" method="post">
        <label for="nome_tarefa">Nome da Tarefa:</label><br>
        <input type="text" id="nome_tarefa" name="nome_tarefa" required><br><br>
        
        <label for="data_limite">Data Limite:</label><br>
        <input type="date" id="data_limite" name="data_limite" required><br><br>

        <input type="submit" value="Salvar Tarefa">
    </form>
    
    <hr>
    
    <!-- SEÇÃO DE TAREFAS ABERTAS (NOVO) -->
    <h2>Tarefas Abertas (Prazo de Hoje em Diante)</h2>
    <?php
    $servername = 'localhost';
    $banco = 'ctsite';
    $username = 'root';
    $password = '';

    try {
        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);
        
        // A lógica aqui mudou para >= CURDATE() para pegar tarefas de hoje e do futuro
        $comando = "SELECT nome_tarefa, data_limite FROM tarefas WHERE id_usuario = :id_usuario AND data_limite >= CURDATE() ORDER BY data_limite ASC";
        
        $sth = $conexao->prepare($comando);
        $sth->execute(['id_usuario' => $_SESSION['id_usuario']]);
        $tarefas_abertas = $sth->fetchAll();

        if (count($tarefas_abertas) > 0) {
            echo "<ul>";
            foreach ($tarefas_abertas as $tarefa) {
                echo "<li><b>Tarefa:</b> " . htmlspecialchars($tarefa['nome_tarefa']) . " - <b>Prazo:</b> " . date("d/m/Y", strtotime($tarefa['data_limite'])) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhuma tarefa aberta encontrada.";
        }
        
    } catch (PDOException $e) {
        echo "Erro ao buscar tarefas: " . $e->getMessage();
    }
    ?>

    <hr>

    <!-- SEÇÃO DE TAREFAS VENCIDAS -->
    <h2>Tarefas Vencidas</h2>
    <?php
    try {
        // A lógica aqui é < CURDATE() para pegar apenas tarefas do passado
        $comando = "SELECT nome_tarefa, data_limite FROM tarefas WHERE id_usuario = :id_usuario AND data_limite < CURDATE() ORDER BY data_limite DESC";
        
        $sth = $conexao->prepare($comando);
        $sth->execute(['id_usuario' => $_SESSION['id_usuario']]);
        $tarefas_vencidas = $sth->fetchAll();

        if (count($tarefas_vencidas) > 0) {
            echo "<ul>";
            foreach ($tarefas_vencidas as $tarefa) {
                echo "<li><b>Tarefa:</b> " . htmlspecialchars($tarefa['nome_tarefa']) . " - <b>Venceu em:</b> " . date("d/m/Y", strtotime($tarefa['data_limite'])) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhuma tarefa vencida encontrada.";
        }
        
    } catch (PDOException $e) {
        echo "Erro ao buscar tarefas: " . $e->getMessage();
    }
    
    $conexao = null; // Fecha a conexão aqui no final
    ?>
</body>
</html>