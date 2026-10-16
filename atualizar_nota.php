<?php
session_start();
$id = $_POST['id'] ?? "";
$aluno = trim($_POST["aluno"] ?? "");
$disciplina = trim($_POST["disciplina"] ?? "");
$nota = $_POST['nota'] ?? "";

if (
    $aluno === "" || $disciplina === "" || $nota === "" ||
    !is_numeric($nota) || (float)$nota < 0 || (float)$nota > 10
) {
    exit("Dados inválidos.");
}

foreach ($_SESSION["notas_alunos"] ?? [] as $indice => $registro) {
    if ($registro["id"] === $id) {
        $_SESSION["notas_alunos"][$indice]["aluno"] = $aluno;
        $_SESSION["notas_alunos"][$indice]["disciplina"] = $disciplina;
        $_SESSION["notas_alunos"][$indice]["nota"] = (float)$nota;
        $_SESSION["notas_alunos"][$indice]["alterado_em"] = date("d/m/Y H:i");
        break;
    }
}

header("location:listar_notas.php");
exit;


