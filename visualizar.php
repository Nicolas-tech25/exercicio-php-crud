<?php
require_once "src/funcao-alunos.php";
$lista_alunos = lerAlunos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->
  
        
            <?php foreach($lista_alunos as $alunos) { 
                    $media = $alunos["media"];
            ?>
            <section>
                <p>Nome: <?=$alunos["nome"]?> </h3>
                <p>Nota um: <?=$alunos["nota_um"]?> </p>
                <p>Nota dois: <?=$alunos["nota_dois"]?></p>
                <p>Média: <?=$media?></p>
                <?php

                    if ($media >= 7) {
                        echo  "<p>Situação: Aluno aprovado!</p>";    
                    } else{
                        echo  "<p>Situação: Aluno reprovado!</p>";  
                    }
                } ?>
            </section>


    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>