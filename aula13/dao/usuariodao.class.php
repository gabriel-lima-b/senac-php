<?php
include '../persistencia/ConexaoBanco.class.php';

class UsuarioDao
{
	private $conexao = null;

	public function __construct()
	{
		$this->conexao = ConexaoBanco::getInstancia();
	} //fecha o construtor

	public function cadastrarUsuario($u)
	{
		try {
			$stat = $this->conexao->prepare("insert into usuario(idusuario, login, senha, tipo)values(null,?,?,?)");

			$stat->bindValue(1, $u->login);
			$stat->bindValue(2, $u->senha);
			$stat->bindValue(3, $u->tipo);

			$stat->execute();

			//Encerrando a conexão cm o banco
			$this->conexao = null;

		}
		catch (PDOException $e) {
			echo 'Erro ao cadastrar usuário';
		} //fecha o catch
	} //fecha o método cadastrarUsuario

	public function buscarUsuarios()
	{
		try {
			$stat = $this->conexao->query("select * from usuario");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');
			$this->conexao = null;
			return $array;
		}
		catch (PDOException $e) {
			echo 'Erro ao buscar usuário!' . $e;
		} //fecha o catch
	} //fecha o método buscarUsuarios

	//Método deletarUsuario
	public function deletarUsuario($idUsuario)
	{
		try {
			$stat = $this->conexao->prepare("delete from usuario where idUsuario=?");

			$stat->bindValue(1, $idUsuario);

			$stat->execute();

			$stat->conexao = null;

		}
		catch (PDOException $e) {
			echo 'Erro ao deletar Usuário!';
		} //fecha o catch
	} //fecha o deletarUsuário
	public function verificarUsuario($u)
	{
		try {

			$usuario = $stat->fetchObject('Usuario');
			return $usuario;
		}
		catch (PDOException $e) {
			echo 'Erro ao verificar usuario!';
		}
	}
	public function buscar($query)
	{
		try {
			$stat = $this->conexao->query("select * from usuario " . $query);
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');

			$this->conexao = null;
			return $array;
		}
		catch (PDOException $e) {
			echo 'Erro ao buscar com filtro!';
		}
	}

	public function alterarUsuario($usu)
	{
		try {
			$stat = $this->conexao->prepare('update usuario set login = ?, senha = ?, tipo = ? where idusuario = ?');

			$stat->bindValue(1, $usu->login);
			$stat->bindValue(2, $usu->senha);
			$stat->bindValue(3, $usu->tipo);
			$stat->bindValue(4, $usu->idUsuario);

			$stat->execute();
			$this->conexao = null;
		}
		catch (PDOException $e) {
			echo 'Erro ao alterar usuários';
		}
	}

} //fecha a classe
?>