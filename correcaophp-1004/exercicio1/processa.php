<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $soma = $num1 + $num2;

    echo "<h2>Resultado da Soma</h2>";
    echo "<p>$num1 + $num2 = $soma</p>";
}
