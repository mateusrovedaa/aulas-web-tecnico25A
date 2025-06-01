<?php
require_once '../Controllers/ControlaUsuario.php';

$controlaUsuario = new ControlaUsuario();
$usuarios = $controlaUsuario->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.button {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            margin-right: 5px;
            border-radius: 3px;
        }
        a.button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>Usuários cadastrados</h2>

    <?php if (count($usuarios) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->getId() ?></td>
                        <td><?= $usuario->getNome() ?></td>
                        <td><?= $usuario->getEmail() ?></td>
                        <td><?= $usuario->getIdade() ?></td>
                        <td>
                            <a class="button" href="edita.php?id=<?= $usuario->getId() ?>">Editar</a>
                            <a class="button delete" href="../Services/exclui.php?id=<?= $usuario->getId() ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum usuário cadastrado.</p>
    <?php endif; ?>
</body>
</html>
