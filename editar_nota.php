<?php
session_start();
$id = $_GET["id"] ??
    $encontrado = null;

foreach ($_SESSION["notas_alunos"] ?? [] as $registro) {
    if ($registro["id"] === $id) {
        $encontrado = $registro;
        break;
    }
}

if ($encontrado === null) {
    exit("Registro não encontrado.");
}

function h($valor)
{
    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar nota</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <h1>Editar nota do aluno</h1>
        <form action="atualizar_nota.php" method="POST">
            <input type="hidden" name="id" value="<?= h($encontrado["id"]) ?>">

            <label>Nome do aluno:</label>
            <input type="hidden" name="id" value="<?= h($encontrado["aluno"]) ?>" required>

            <label>Disciplina:</label>
            <input type="hidden" name="id" value="<?= h($encontrado["disciplina"]) ?>" required>

            <label>Nota (0 a 10)</label>
            <input type="hidden" name="id" value="<?= h($encontrado["nota"]) ?>" required>

            <button type="submit">Salvar alterações</button>

        </form>
    </main>


</body>

</html>