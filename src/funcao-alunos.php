<?php
require_once "conecta.php";

function lerAlunos(PDO $conexao){
    $sql = "SELECT nome,nota_um,nota_dois FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carrega produtos: ".$erro->getMessage());
    }
    return $resultado;
}

function inserirAlunos(PDO $conexao,string $nome,float $nota_um,float $nota_dois):void {
    $sql = "INSERT TO alunos(nome,nota_um,nota_dois) VALUES
    (:nome,:nota_um,:nota_dois)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome",$nome, PDO::PARAM_STR);
        $consulta->bindValue(":nota_um",$nota_um, PDO::PARAM_STR);
        $consulta->bindValue(":nota_dois",$nota_dois, PDO::PARAM_STR);
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}