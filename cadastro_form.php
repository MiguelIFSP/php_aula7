<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Crie sua Conta</h1>
    <!-- A action aponta para o arquivo que vai processar os dados -->
    <form action="cadastro_processa.php" method="post">
        <label for="usuario">Usuário (para login):</label><br>
        <input type="text" id="usuario" name="usuario"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <label for="nome">Nome Completo:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="nascimento">Data de Nascimento:</label><br>
        <input type="date" id="nascimento" name="nascimento"><br><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep"><br><br>

        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="login_form.php">Já tem uma conta? Faça login</a>
</body>
</html>