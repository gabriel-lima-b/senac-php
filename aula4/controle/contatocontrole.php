<?php
include_once '../modelo/contato.class.php';
include_once '../util/validacao.class.php';
include_once '../util/email.class.php';

$nome = $_POST['txt-nome'];
$email = $_POST['txt-email'];
$fone = $_POST['txt-fone'];


if (!Validacao::testarNome($nome) || !Validacao::testarEmail($email) || !Validacao::testarTelefone($fone)) {
    header("location:../visao/guierro.php");
}
else {
    $contatinho = new Contato($nome, $email, $fone);

    $mensagem = "Nome: $contatinho->nome ### Email: $contatinho->email ### Telefone: $contatinho->telefone";

    $e = new Email($mensagem);

    $e->enviarEmail();
    header("location:../visao/guiresposta.php?nome=$contatinho->nome&email=$contatinho->email&fone=$contatinho->telefone");
}

?>