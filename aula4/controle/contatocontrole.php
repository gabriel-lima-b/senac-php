<?php
	/*Incluindo e avaliando o arquivo informado durante a execução do script
	*/
	include_once '../modelo/contato.class.php';
	include_once '../util/validacao.class.php';
	include_once '../util/email.class.php';

	//Recebendo e armazenando os dados
	$nome = $_POST['txtnome'];
	$email = $_POST['txtemail'];
	$fone = $_POST['txtfone'];

	//Validando os dados recebidos
	if( !Validacao::testarNome($nome)||
		!Validacao::testarEmail($email)||
		!Validacao::testarFone($fone) ){

		header("location:../visao/guierro.php");
	}else{
		$c = new Contato($nome, $email, $fone);

		//Montando a mensagem que será  enviada por email
		$mensagem = "Nome: $c->nome ### Email: $c->email ### Fone: $c->fone ";

		/*Instanciando objeto $e a partir da classe Email. Enviando  a mensagem pelo construtor*/
		$e = new Email($mensagem);

		//Chamando o método que enviará o email
		$e->enviarEmail();

		header("location:../visao/guiresposta.php?nome=$c->nome&email=$c->email&fone=$c->fone");
	}

?>