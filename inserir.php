<?php
require_once "src/funcao-alunos.php";
$lista_alunos = lerAlunos($conexao);

if (isset($_POST['inserir'])) {
	
	$nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_SPECIAL_CHARS);

	$nota_um = filter_input(INPUT_POST,"nota_um", FILTER_SANITIZE_NUMBER_FLOAT);

	$nota_dois = filter_input(INPUT_POST,"nota_dois", FILTER_SANITIZE_NUMBER_FLOAT);
	
	inserirAlunos($conexao,$nome,$nota_um,$nota_dois);

	header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome">Nome:</label>
	    <input name="nome" type="text" id="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input name="nota_um"  type="number" id="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input name="nota_dois" type="number" id="segunda" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button type="submit" name="inserir">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>