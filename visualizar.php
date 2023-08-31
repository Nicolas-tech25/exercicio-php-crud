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

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($lista_alunos as $alunos){?>
            <tr>
                <td><?=$alunos["nome"]?></td>                
                <td><?=$alunos["nota_um"]?></td>                
                <td><?=$alunos["nota_dois"]?></td> 
                
                <!-- LINK DINAMICO -->

                <td><a href=""></a></td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>