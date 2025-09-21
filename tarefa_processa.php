<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login_form.php');
    exit();
}

$servername = 'localhost';
$banco = 'ctsite';
$username = 'root';
$password = '';

$conexao = new PDO("mysql:host=$servername;dbname=$banco", $username, $password);

$comando = "INSERT INTO tarefas (nome_tarefa, data_limite, id_usuario) VALUES (:nome_tarefa, :data_limite, :id_usuario)";

$sth = $conexao->prepare($comando);

$sth->execute([
    'nome_tarefa' => $_POST['nome_tarefa'],
    'data_limite' => $_POST['data_limite'],
    'id_usuario' => $_SESSION['id_usuario']
]);

header('Location: tarefas.php');

$conexao = null;
?>