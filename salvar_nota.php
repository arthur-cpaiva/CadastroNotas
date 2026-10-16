<?php
session_start();
if (!isset($_SESSION["notas_alunos"])) {
    $_SESSION["notas_alunos"] = [];
}



$aluno = trim($_POST["aluno"] ?? "");
$disciplina = trim($_POST["disciplina"] ?? "");
$nota = trim($_POST["nota"] ?? "");

if (
    $aluno === "" || $disciplina === "" || $nota === "" ||
    !is_numeric($nota) || (float)$nota < 0 || (float)$nota > 10
) {
    exit("Dados inválidos. Volte ao formulário e tente novamente.");
}

$_SESSION["notas_alunos"][] = [
    "id" => uniqid(),
    "aluno" => $aluno,
    "disciplina" => $disciplina,
    "nota" => (float)$nota,
    "alterado_em" => date("d/m/Y H:i")
];

header("Location:listar_notas.php");
exit;
?>