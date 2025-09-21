<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Entrar no Sistema</h1>
    <form action="login_processa.php" method="post">
        <label for="usuario">Usuário:</label><br>
        <input type="text" id="usuario" name="usuario"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input type="submit" value="Entrar">
    </form>
    <br>
    <a href="cadastro_form.php">Não tem uma conta? Cadastre-se</a>
</body>
</html>