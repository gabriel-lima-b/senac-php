<?php
session_start();
session_unset(); //Removendo as sessões anteriores

include_once '../modelo/usuario.class.php';
include_once '../util/validacao.class.php';
include_once '../dao/usuariodao.class.php';
include_once '../util/controlelogin.class.php';

if (isset($_GET['op'])) {
	switch ($_GET['op']) {

		case 'cadastrar':
			//Cadastro COM Validação, verificando se existem as variáveis de post
			if (isset($_POST['txtlogin']) &&
			isset($_POST['txtsenha']) &&
			isset($_POST['seltipo'])) {

				//Criando as variáveis para receber os valor do Array
				$login = $_POST['txtlogin'];
				$senha = $_POST['txtsenha'];
				$tipo = $_POST['seltipo'];
				//Fazendo a validação
				$erros = array();

				if (!Validacao::testarLogin($login)) {
					$erros[] = 'Login inválido!';
				}

				if (!Validacao::testarSenha($senha)) {
					$erros[] = 'Senha inválida!';
				}

				if (!Validacao::testarTipo($tipo)) {
					$erros[] = 'Tipo inválido!';
				}

				if (count($erros) == 0) {

					$u = new Usuario();

					$u->login = $login;
					$u->senha = $senha;
					$u->tipo = $tipo;

					//Enviando o objeto $u para o banco de dados
					$uDAO = new UsuarioDAO();

					$uDAO->cadastrarUsuario($u);

					$_SESSION['msg'] = 'Usuário Cadastrado!';
					$_SESSION['usuario'] = serialize($u);

					header("location:../visao/guiresposta.php");
				}
				else {
					$_SESSION['e'] = serialize($erros);

					header("location:../visao/guierro.php");
				} //fim if count

			}
			else {
				echo 'Variáveis Inválidas!';
			} //fecha o if isset

			break;

		case 'consultar':

			//Criando o objeto do tipo DAO´para fazer consulta no banco
			$uDAO = new UsuarioDAO();
			$array = array();
			$array = $uDAO->buscarUsuarios();

			//Levar as informações para o GUIconsUsuario para mostrar na tela.
			$_SESSION['usuarios'] = serialize($array);
			header("location:../visao/guiconsusuario.php");

			break; //fecha case buscar

		case 'deletar':
			if (isset($_REQUEST['idUsuario'])) {

				$uDAO = new UsuarioDAO();
				$uDAO->deletarUsuario($_REQUEST['idUsuario']);

				header('location:../controle/usuariocontrole.php?op=consultar');
			}
			else {
				echo 'idUsuario não existe!';
			}
			break; //fecha case deletar

		case 'logar':
			if (isset($_POST['txtlogin']) && isset($_POST['txtsenha'])) {

				$cont = 0;
				if (!Validacao::testarLogin($_POST['txtlogin'])) {
					$cont++;
				}

				if (!Validacao::testarSenha($_POST['txtsenha'])) {
					$cont++;
				}

				if ($cont == 0) {
					$login = Validacao::retirarEspacos($_POST['txtlogin']);
					$login = Validacao::escaparAspas($login);

					$senha = Validacao::retirarEspacos($_POST['txtsenha']);
					$senha = Validacao::escaparAspas($senha);

					//Montando objeto
					$usuario = new Usuario();
					$usuario->login = $login;
					$usuario->senha = $senha;

					//Logar
					ControleLogin::logar($usuario);

				}
				else {
					$_SESSION['msg'] = "Login/senha inválidos!";
					header('location:../visao/guiresposta.php');
				}

			}
			else {
				echo 'Não existe txtlogin e/ou txtxsenha!';
			}
			break;

		case 'deslogar':
			ControleLogin::deslogar();
			break;

		case 'buscar':
			if (isset($_POST['txtfiltro']) && isset($_POST['rdfiltro'])) {

				$erros = array();

				if (!Validacao::validarFiltro($_POST['txtfiltro'])) {
					$erros[] = 'Dado inválido!';
				}

				if (count($erros) == 0) {
					$uDAO = new UsuarioDAO();
					$usuarios = array();

					if ($_POST['rdfiltro'] == 'idusuario') {
						$query = 'where idusuario = ' . $_POST['txtfiltro'];
					}
					else if ($_POST['rdfiltro'] == 'login') {
						$query = "where login = \"" . $_POST['txtfiltro'] . '"';
					}
					else if ($_POST['rdfiltro'] == 'parteslogin') {
						$query = "where login like \"%" . $_POST['txtfiltro'] . '%"';
					}
					else {
						$query = "where tipo = \"" . $_POST['txtfiltro'] . '"';
					} //fecha o else if post
				}
			}
			break;

		case 'alterar':
			if (isset($_GET['idUsuario'])) {
				$query = 'where idusuario = ' . $_GET['idUsuario'];
				$uDAO = new UsuarioDao();
				$usuarios = array();
				$usuarios = $uDAO->buscar($query);
				$_SESSION['usuario'] = serialize($usuarios);
				header('location:../visao/guialterar.php');
			}
			else {
				echo 'Não existem variáveis!';
			}
			break;

		case 'confirmalterar':
			if (isset($_POST['txtidusuario']) && isset($_POST['txtlogin']) && isset($_POST['txtsenha']) && isset($_POST['seltipo'])) {
				$idUsuario = $_POST['txtidusuario'];
				$login = $_POST['txtlogin'];
				$senha = $_POST['txtsenha'];
				$tipo = $_POST['seltipo'];

				$erros = array();

				if (!Validacao::testarLogin($login))
					$erros[] = 'Login inválido!';


				if (!Validacao::testarSenha($_POST['txtsenha']))
					$erros[] = 'Senha inválido!';


				if (!Validacao::testarTipo($_POST['$tipo']))
					$erros[] = 'Tipo inválido!';

				if (count($erros) == 0) {
					$u = new Usuario();
					$u->idUsuario = $idUsuario;
					$u->senha = $senha;
					$u->tipo = $tipo;

					$uDAO = new UsuarioDao();
					$uDAO->alterarUsuario($u);
					$_SESSION['u'] = serialize($u);
					header("location:../controle/usuariocontrole.php?op=consultar");
				}
				else {
					$_SESSION['erros'] = serialize($erros);
					header('location:../visao/guierro.php');
				}
			}
			else {
				echo 'Não existem variáveis!';
			}
			break;

		default:
			echo 'Deu Erro no switch';
			break; //fecha o default
	} //fecha o switch
}
else {
	echo 'Variável op não existe!';
} //fecha else ISSET op
?>