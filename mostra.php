<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostra dados</title>
</head>
<body>
    <?php
    $servername = 'localhost';
    $banco = 'ADS';
    $username = 'root';
    $password = '';

    $conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

    $comando = "SELECT * FROM `alunos`";

    $resultado = $conexao->query($comando);

    foreach($resultado as $linha) {
	echo $linha['nome'];
    echo "<br>";  
    echo $linha['senha'];
	echo "<br>";
    echo "<br>";
    }
    ?>
</body>
</html>