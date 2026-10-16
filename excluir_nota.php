<?php
session_start();
$id = $_POST['id'] ?? "";

foreach ($_SESSION["notas_alunos"] ?? [] as $indice => $registro) {
    if ($registro["id"] === $id) {
        unset($SESSION["notas_alunos"][$indice]);
        break;
    }
}

header("location:listar_notas.php");
exit;
?>