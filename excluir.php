<?php
require_once "conecta.php";
require_once "src/funcao-alunos.php";
$idAluno = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

excluirAlunos($conexao,$idAluno);
header("location:visualizar.php");
?>