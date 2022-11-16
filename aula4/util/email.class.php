<?php
class Email{
	//Atributos
	private $to;
	private $assunto;
	private $mensagem;

	//Construtor
	public function __construct($mensagem){
		$this->to = "eng.cralves@gmail.com";
		$this->assunto="contato via site";
		$this->mensagem=$mensagem;
	}//fecha o método

	/*Método que envia o email através da função mail()*/
	public function enviarEmail(){
		mail($this->to, $this->assunto, $this->mensagem);
	}//fecha o método
}//fecha a classe
?>