<?php
require_once "src/funcao-alunos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $aluno = lerUmAluno($conexao, $id);

    
        if (isset($_POST['atualizar'])) {
            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
            $nota_um = filter_input(INPUT_POST, "nota_um", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $nota_dois = filter_input(INPUT_POST, "nota_dois", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            atualizarAlunos($conexao, $nome, $nota_um, $nota_dois, $id); 

            header("location: visualizar.php");
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input  type="text" name="nome" id="nome" required value="<?=$aluno["nome"]?>"></p>
        
        <p><label for="nota_um">Primeira nota:</label>
	    <input name="nota_um" type="number" id="nota_um" step="0.01" min="0.00" max="10.00" required value="<?=$aluno["nota_um"]?>"></p>
	    
	    <p><label for="nota_dois">Segunda nota:</label>
	    <input name="nota_dois" type="number" id="nota_dois" step="0.01" min="0.00" max="10.00" required value="<?=$aluno["nota_dois"]?>"></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input  name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled value="<?=$media?>">
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button name="atualizar">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>



<script src="js/atualiza-campos.js"></script>
</body>
</html>