<?php
session_start();
include '../modelo/pessoa.class.php';

$p = new Pessoa();

$p->nome = $_POST['txtnome'];
$p->idade = $_POST['txtidade'];

$_SESSION['nome'] = $p->nome;
$_SESSION['idade'] = $p->idade;
$_SESSION['msg'] = 'Usuário Cadastrado';

header("location:../visao/guiresposta.php");

?>