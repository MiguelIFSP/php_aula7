<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Processando Cadastro</title>
</head>
<body>
<?php
    $servername = 'localhost';
    $banco = 'ctsite';
    $username = 'root';
    $password = '';

    // Verifica se os dados foram enviados pelo formulário
    if(isset($_POST['usuario'])) {
        try {
            $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

            $comando = "INSERT INTO usuarios (usuario, senha, nome, nascimento, cep, numero) VALUES (:usuario, :senha, :nome, :nascimento, :cep, :numero)";

            $sth = $conexao->prepare($comando);

            $resultado = $sth->execute([
                'usuario' => $_POST['usuario'],
                'senha' => $_POST['senha'],
                'nome' => $_POST['nome'],
                'nascimento' => $_POST['nascimento'],
                'cep' => $_POST['cep'],
                'numero' => $_POST['numero']
            ]);

            if($resultado) {
                echo "Usuário cadastrado com sucesso!";
                echo '<br><a href="login_form.php">Ir para Login</a>';
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } catch (PDOException $e) {
            echo "Erro na conexão: ". $e->getMessage();
        }
    } else {
        echo "Por favor, preencha o formulário de cadastro primeiro.";
        echo '<br><a href="cadastro_form.php">Voltar para o cadastro</a>';
    }

    $conexao = null;
?>
</body>
</html>