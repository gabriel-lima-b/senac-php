<?php
include_once '../dao/usuariodao.class.php';

class ControleLogin
{
    public static function logar($u)
    {
        $uDAO = new UsuarioDao();
        $usuario = $uDAO->verificarUsuario($u);

        if ($usuario && !is_null($usuario)) {
            $_SESSION['privateUser'] = serialize($usuario);

            header('location:../index.html');
        }
        else {
            $_SESSION['msg'] = 'login/senha inválidos!';
            header('location:../visao/guiresposta.php');
        }
    }

    public static function deslogar()
    {
        unset($_SESSION['privateUser']);
        $_SESSION['msg'] = 'Você foi deslogado!';
        header('location:../visao/guiresposta.php');
    }

    public static function verificarAcesso()
    {

    }
}

?>