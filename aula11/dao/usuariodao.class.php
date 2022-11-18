<?php
include'../persistencia/ConexaoBanco.class.php';

class UsuarioDao{
	private $conexao = null;

	public function __construct(){
		$this->conexao = ConexaoBanco::getInstancia();
	}//fecha o construtor

	public function cadastrarUsuario($u){
		try{
			$stat = $this->conexao->prepare("insert into usuario(idusuario, login, senha, tipo)values(null,?,?,?)");

			$stat->bindValue(1,$u->login);
			$stat->bindValue(2,$u->senha);
			$stat->bindValue(3,$u->tipo);

			$stat->execute();

			//Encerrando a conexão cm o banco
			$this->conexao = null;

		}catch(PDOException $e){
			echo'Erro ao cadastrar usuário';
		}//fecha o catch
	}//fecha o método cadastrarUsuario
}//fecha a classe
?>