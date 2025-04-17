<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura * $altura);
    $imc = round($imc, 2);

    echo "<h2>Seu IMC é: $imc</h2>";

    if ($imc < 18.5) {
        echo "<p>Classificação: Abaixo do peso</p>";
    } elseif ($imc < 25) {
        echo "<p>Classificação: Peso normal</p>";
    } elseif ($imc < 30) {
        echo "<p>Classificação: Sobrepeso</p>";
    } else {
        echo "<p>Classificação: Obesidade</p>";
    }
}
