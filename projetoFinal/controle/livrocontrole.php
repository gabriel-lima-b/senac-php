<?php
session_start();
session_unset(); //Removendo as sessões anteriores

include_once '../modelo/livro.class.php';
include_once '../dao/livrosdao.class.php';

if (isset($_GET['op'])) {
	switch ($_GET['op']) {

		case 'cadastrar':
			if (
				isset($_POST['txttitulo']) &&
				isset($_POST['txtautor'])
			) {

				$titulo = $_POST['txttitulo'];
				$autor = $_POST['txtautor'];

				$livro = new Livro();

				$livro->titulo = $titulo;
				$livro->autor = $autor;



				$lDAO = new LivrosDao();

				$lDAO->cadastrarLivro($livro);

				$_SESSION['msg'] = 'Livro Cadastrado!';
				$_SESSION['livro'] = serialize($livro);

				header("location:./livrocontrole.php?op=listar");
			} else {
				echo 'Variáveis Inválidas!';
			} //fecha o if isset

			break;

		case 'listar':

			$lDAO = new LivrosDAO();
			$array = array();
			$array = $lDAO->buscarLivros();

			$_SESSION['livros'] = serialize($array);
			//TODO: trocar para visao livros
			header("location:../visao/guilistalivro.php");

			break;

		case 'deletar':
			if (isset($_REQUEST['idLivro'])) {

				$lDAO = new LivrosDAO();
				$lDAO->deletarLivro($_REQUEST['idLivro']);

				header('location:./livrocontrole.php?op=listar');
			} else {
				echo 'id do livro não existe!';
			}
			break; //fecha case deletar



		case 'alterar':
			if (isset($_POST['idLivro'])) {

				$lDAO = new LivrosDAO();
				$livro = new Livro();
				$livro = $lDAO->buscarLivroById($_POST['idLivro']);
				$_SESSION['livro'] = serialize($livro);
				header('location:../visao/guialteralivro.php');
			} else {
				echo 'Não existem variáveis!';
			}
			break;

		case 'confirmalterar':
			if (
				isset($_POST['txtidlivro']) &&
				isset($_POST['txttitulo']) &&
				isset($_POST['txtautor'])
			) {

				$idLivro = $_POST['txtidlivro'];
				$titulo = $_POST['txttitulo'];
				$autor = $_POST['txtautor'];
				$l = new Livro();
				$l->id = $idLivro;
				$l->titulo = $titulo;
				$l->autor = $autor;

				$lDAO = new LivrosDao();

				$lDAO->alterarLivro($l);
				header("location:./livrocontrole.php?op=listar");
			} else {
				echo 'Variáveis não existem!';
			}

			break;



		default:
			echo 'Deu erro no switch!';
			break;
	}
} else {
	echo 'Variável op não existe!';
}
