<?php
session_start();

//Cria o array de registros somente na primeira visita.
if (!isset($_SESSION["notas_alunos"])) {
    $_SESSION["notas_alunos"] = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Notas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <h1>Cadastro de Notas dos Alunos</h1>

        <form action="salvar_nota.php" method="POST">
            <label>Nome do aluno: </label>
            <input type="text" name="aluno" required>

            <label>Disciplina: </label>
            <input type="text" name="disciplina" required>

            <label>Nota (0 a 10): </label>
            <input type="number" name="nota" min="0" max="10" step="0.1" required>

            <button type="submit">Cadastrar nota</button>
        </form>

        <p><a href="listar_notas.php">Consultar notas cadastradas</a></p>
    </main>
</body>

</html>