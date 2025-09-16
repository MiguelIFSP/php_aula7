    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Formulário PHP</title>
    </head>
    <body>
        <h1>Insira seus dados</h1>
        <form action="insere.php" method="post">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome"><br><br>

            <label for="senha">Senha:</label><br>
            <input type="senha" id="senha" name="senha"><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
    </html>