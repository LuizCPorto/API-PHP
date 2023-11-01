<?php

require "vendor/autoload.php";
use controller\UsuariosController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $userController = new UsuariosController();
    $data = $userController->addUser($nome, $email, $senha);
    echo $data;
} elseif (isset($_GET['listaUsuarios'])) {
    $usuariosController = new UsuariosController();
    $usuarios = $usuariosController->mostrarUser();
    $usuarios = json_decode($usuarios);
    echo '<h1>Usuários Cadastrados:</h1>';
    foreach ($usuarios as $usuario) {
        echo "Nome: " . $usuario->nome . "<br>";
        echo "Email: " . $usuario->email . "<br><br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuários</title>
</head>
<body>
    <a href="index.php?listaUsuarios">Listar Usuários</a>
    <h1>Cadastro de Usuários</h1>
    <form action="index.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
