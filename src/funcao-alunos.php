<?php
require_once "conecta.php";

function lerAlunos(PDO $conexao){
    $sql = "SELECT id,nome, nota_um, nota_dois, ((nota_um + nota_dois) /2) AS media FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar alunos: ".$erro->getMessage());
    }
    return $resultado;
}

function lerUmAluno(PDO $conexao, int $id):array {
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id",$id, PDO::PARAM_INT); 

        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("ERRO ao carregar: ".$erro->getMessage());
    }

    return $resultado;
}

function inserirAlunos(
    PDO $conexao, 
    string $nome, 
    float $nota_um,
    float $nota_dois
    ):void {

    $sql = "INSERT INTO alunos(nome, nota_um, nota_dois) VALUES
    (:nome, :nota_um, :nota_dois)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":nota_um", $nota_um, PDO::PARAM_STR);
        $consulta->bindValue(":nota_dois", $nota_dois, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }

}

function atualizarAlunos(
    PDO $conexao, 
    string $nome, 
    float $nota_um,
    float $nota_dois,
    int $id):void{
    $sql = "UPDATE alunos SET
    nome = :nome,
    nota_um = :nota_um,
    nota_dois = :nota_dois
    WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":nota_um", $nota_um, PDO::PARAM_STR);
        $consulta->bindValue(":nota_dois", $nota_dois, PDO::PARAM_STR);
        $consulta->bindValue(":id",$id,PDO::PARAM_INT);

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function excluirAlunos(PDO $conexao,$id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id",$id,PDO::PARAM_INT);
        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao Apagar: ".$erro->getMessage());
    }
}