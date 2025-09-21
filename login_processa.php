<?php
    session_start();
    
    $servername = 'localhost';
    $banco = 'ctsite';
    $username = 'root';
    $password = '';

    try {
        $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

        $comando = "SELECT id, nome FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        
        $sth = $conexao->prepare($comando);
        
        $sth->execute([
            'usuario' => $_POST['usuario'],
            'senha' => $_POST['senha']
        ]);
        
        $usuario_encontrado = $sth->fetch();

        if($usuario_encontrado) {
            $_SESSION['id_usuario'] = $usuario_encontrado['id'];
            $_SESSION['nome_usuario'] = $usuario_encontrado['nome'];
            header('Location: tarefas.php');
        } else {
            echo "Usuário ou senha inválidos.";
            echo '<br><a href="login_form.php">Tentar novamente</a>';
        }
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }

    $conexao = null;
?>