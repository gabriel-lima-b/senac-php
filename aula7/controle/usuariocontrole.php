<?php
session_start();
include '../modelo/usuario.class.php';
include '../util/validacao.class.php';
include '../dao/usuariodao.class.php';

switch ($_GET['op']) {
    case 'cadastrar':
        //Cadastro sem validação
        $usuario = new Usuario();
        $usuario->login = $_POST['txtlogin'];
        $usuario->senha = $_POST['txtsenha'];
        $usuario->tipo = $_POST['seltipo'];

        //Enviando o objeto para o bd
        $usuarioDao = new UsuarioDAO();
        $usuarioDao->cadastrarUsuario($usuario);


        $_SESSION['usuario'] = serialize($usuario);

        header('location:../visao/guiresposta.php');
        break;

    case 'consultar':
        # code...
        break;

    default:
        echo 'ERRO NO SWITCH';
        break;
}

?>