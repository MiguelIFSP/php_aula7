<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo dados</title>
</head>
<body>
    <?php

    $servername = 'localhost';
    $banco = 'ADS';
    $username = 'root';
    $password = '';
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $comando = "INSERT INTO `alunos` (`id`, `nome`, `senha`) VALUES (NULL, '$nome', '$senha');";

    $sth = $conexao->prepare($comando);

    $resultado = $sth->execute();

    if($resultado) {
	echo "Nome inserido com sucesso!";
    } else {
	echo "Erro ao salvar o dado!";
    }
    ?>
</body>
</html>  