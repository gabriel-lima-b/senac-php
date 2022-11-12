<?php
class Pessoa{
	
	private $nome;
	private $idade;

	public function __get($a){
		return $this->$a;
	}

	public function __set($a, $v){
		$this->$a = $v;
	}

	public function __toString(){
		return  '<br>Nome: '.$this->nome.
				'<br>Idade: '.$this->idade;
	}
}//fim da classe Pessoa
?>