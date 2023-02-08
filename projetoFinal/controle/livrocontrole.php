<?php
session_start();
session_unset(); //Removendo as sessões anteriores

include_once '../modelo/livro.class.php';
include_once '../dao/livrodao.class.php';

if (isset($_GET['op'])) {
	switch ($_GET['op']) {

		case 'cadastrar':
			if (isset($_POST['txttitulo']) &&
			isset($_POST['txtautor'])) {

				$titulo = $_POST['txttitulo'];
				$autor = $_POST['txtsenha'];

				$livro = new Livro();

				$livro->titulo = $titulo;
				$livro->autor = $autor;
				

					
				$lDAO = new LivrosDao();

				$lDAO->cadastrarLivro($livro);

				$_SESSION['msg'] = 'Livro Cadastrado!';
				$_SESSION['livro'] = serialize($livro);

				header("location:../visao/guiresposta.php");

			}
			else {
				echo 'Variáveis Inválidas!';
			} //fecha o if isset

			break;

		case 'listar':

			$lDAO = new LivrosDAO();
			$array = array();
			$array = $lDAO->buscarLivros();

			$_SESSION['livros'] = serialize($array);
			//TODO: trocar para visao livros
			header("location:../visao/guiconsusuario.php");

			break; 

		case 'deletar':
			if (isset($_REQUEST['idLivro'])) {

				$lDAO = new LivrosDAO();
				$lDAO->deletarLivro($_REQUEST['idLivro']);

				header('location:../controle/livrocontrole.php?op=listar');
			}
			else {
				echo 'id do livro não existe!';
			}
			break; //fecha case deletar

		case 'alterar':
			if (isset($_POST['idLivro'])) {

				$lDAO = new LivroDAO();
				$livro = new Livro();
				$livro = $lDAO->alterarLivro($_POST['idLivro']);
				$_SESSION['livro'] = serialize($livro);
				header('location:../controle/livrocontrole.php?op=listar');
			}
			else {
				echo 'Não existem variáveis!';
			}
			break;

		default:
			echo 'Deu erro!';
			break; 
	}
}
else {
	echo 'Variável op não existe!';
} 
?>