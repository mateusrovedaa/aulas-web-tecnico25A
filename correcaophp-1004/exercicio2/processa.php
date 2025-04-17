<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idade = $_POST['idade'];

    echo "<h2>Resultado:</h2>";
    if ($idade >= 16) {
        echo "<p>Você pode tirar o título de eleitor neste ano.</p>";
    } else {
        echo "<p>Você ainda não pode tirar o título de eleitor.</p>";
    }
}
