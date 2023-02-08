<?php
class Livro{
	//Atributos
	private $id;
	private $titulo;
	private $autor;

	//Construtor
	public function __construct(){

	}//fecha construtor

	public function Livro(){

	}

	public function __get($atrib){
		return $this->$atrib;
	}

	public function __set($atrib, $valor){
		$this->$atrib = $valor;
	}

	public function __toString(){
		return  '<br> id: '.$this->id.
				'<br> titulo: '.$this->titulo.
				'<br> autor: '.$this->autor;
	}//fecha o toString
}//fecha a classe livro
