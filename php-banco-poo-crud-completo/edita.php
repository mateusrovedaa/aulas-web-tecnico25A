<?php
include 'ControlaUsuario.php';

if (!isset($_GET['id'])) {
    die('ID do usuário não informado.');
}

$controlaUsuario = new ControlaUsuario();
$usuario = $controlaUsuario->buscarPorId($_GET['id']);

if (!$usuario) {
    die('Usuário não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form action="processaEdicao.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <label>Nome completo</label>
        <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
        <label>Idade</label>
        <input type="text" name="idade" value="<?= $usuario['idade'] ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
