<h1>Calculadora</h1>
<!-- Formulário para escolher a operação e inserir os números -->
<form method="POST" action="">
    <!-- Menu de opções -->
    <label for="calculo">Escolha uma operação:</label>
    <select name="calculo" id="calculo">
        <option value="">Opções</option>
        <option value="Soma">Adição</option>
        <option value="Subtração">Subtração</option>
        <option value="Multiplicação">Multiplicação</option>
        <option value="Divisão">Divisão</option>
    </select>
    <br><br>

    <!-- Campos para os números -->
    <label for="numero1">Número 1:</label>
    <input type="number" id="numero1" name="numero1" required>
    <br><br>

    <label for="numero2">Número 2:</label>
    <input type="number" id="numero2" name="numero2" required>
    <br><br>

    <input type="submit" value="Calcular">
</form>

<!-- Exibição do resultado -->
<div class="form-container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pega a operação escolhida e os números
        $operacao = $_POST['calculo'] ?? '';
        $numero1 = $_POST['numero1'] ?? 0;
        $numero2 = $_POST['numero2'] ?? 0;

        // Variável para o resultado
        $resultado = null;

        // Verifica qual operação foi escolhida e calcula o resultado
        switch ($operacao) {
            case 'Soma':
                $resultado = $numero1 + $numero2;
                break;
            case 'Subtração':
                $resultado = $numero1 - $numero2;
                break;
            case 'Multiplicação':
                $resultado = $numero1 * $numero2;
                break;
            case 'Divisão':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Erro: Divisão por zero não permitida.";
                }
                break;
            default:
                $resultado = "Por favor, escolha uma operação.";
        }

        // Exibe o resultado
        if ($resultado !== null) {
            echo "<p>Resultado: " . htmlspecialchars($resultado) . "</p>";
        }
    }
    ?>
</div>

</body>
</html>
