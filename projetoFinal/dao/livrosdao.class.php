<?php
include '../persistencia/ConexaoBanco.class.php';

class LivrosDao
{
	private $conexao = null;

	public function __construct()
	{
		$this->conexao = ConexaoBanco::getInstancia();
	}

	public function cadastrarLivro($l)
	{
		try {
			$stat = $this->conexao->prepare("insert into livros (id, titulo, autor) values (null,?,?)");

			$stat->bindValue(1, $l->titulo);
			$stat->bindValue(2, $l->autor);

			$stat->execute();

			$this->conexao = null;
		} catch (PDOException $e) {
			echo 'Erro ao cadastrar livro';
		}
	}

	public function buscarLivros()
	{
		try {
			$stat = $this->conexao->query("select * from livros");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS, 'Livro');
			$this->conexao = null;
			return $array;
		} catch (PDOException $e) {
			echo 'Erro ao buscar livros!' . $e;
		}
	}

	public function deletarLivro($idLivro)
	{
		try {
			$stat = $this->conexao->prepare("delete from livros where id=?");

			$stat->bindValue(1, $idLivro);

			$stat->execute();

			$stat->conexao = null;
		} catch (PDOException $e) {
			echo 'Erro ao deletar Livro!';
		}
	}

	public function buscarLivroById($id)
	{
		try {
			$stat = $this->conexao->query("select * from livros where id='$id'");

			$livro = $stat->fetchObject('Livro');
			return $livro;
		} catch (PDOException $e) {
			echo 'Erro ao buscar o livro!';
		}
	}


	public function alterarLivro($livro)
	{
		try {
			$stat = $this->conexao->prepare('update livros set titulo = ?, autor = ? where id = ?');

			$stat->bindValue(1, $livro->titulo);
			$stat->bindValue(2, $livro->autor);
			$stat->bindValue(3, $livro->id);

			var_dump($stat);

			$stat->execute();
			$this->conexao = null;
		} catch (PDOException $e) {
			echo 'Erro ao alterar o livro';
		}
	}
}
