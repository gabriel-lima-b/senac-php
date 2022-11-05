<?php
//importando a classe pessoa
include 'pessoa.class.php';

//instanciando a classe pessoa.class
$p = new Pessoa();

//Setando os dados
$p->setNome($_POST['txtnome']);
$p->setIdade($_POST['txtidade']);

//Mostrando os dados
echo '<br> nome: ' . $p->getNome() .
	'<br> idade: ' . $p->getIdade() .
	'<br> idade em meses: ' . $p->calcularMeses();
