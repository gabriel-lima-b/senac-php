<!DOCTYPE html>
<html>
<head>
	<title>Resposta</title>
</head>
<body>
	<h1>Resposta</h1>
	<?php
		//Capturando os dados de dentro do servidor(transferencia entre arquivos)
		$nome = $_GET['nome'];
		$email = $_GET['email'];
		$fone = $_GET['fone'];

		//Mostrar a resposta
		echo '<p>Nome: '.$nome.
			 '<br>Email: '.$email.
			 '<br>Fone: '.$fone.'</p>';
	?>
</body>
</html>