<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Keyboard 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120915
13 - Cadastro, busca, filtro, alteração e exclusão de usuários
-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="Templates/modelo.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Aula 13 - Conexão com Banco: Alterar</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="../estilos/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">Alterar</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="../index.php">Homepage</a></li>
					<li><a href="guicadusuario.html">Cadastro</a></li>
				</ul>
			</div>
		</div>
		<div id="banner">
			<div class="content"><img src="../imagens/img02.jpg" width="1000" height="300" alt="teclado"></div>
		</div>
	</div>
	<!-- end #header -->
	
	<div id="page">
		<div id="content">
        
		  <div class="post">
				<!-- InstanceBeginEditable name="conteúdo" -->
		<h2 class="title">Alterar de usuário</h2>

<?php
if (isset($_SESSION['usuarios'])) {
	include_once '../modelo/usuario.class.php';

	$usuario = array();
	$usuario = unserialize($_SESSION['usuarios']);


}
else {
	echo 'Usuários não existe!';
}
?>

	<form name="cad" id="cad" action="../controle/usuariocontrole.php?op=confirmaalterar" method="post">
		<fieldset><legend>Atualizar Usuário</legend>
			<label>Código:
				<input type="text" name="txtidusuario" id="txtidusuario" value="<?php echo $usuario[0]->idUsuario; ?>">*<br><br>
			</label>

			<label>Login:
				<input type="text" name="txtlogin" id="txtlogin" value="<?php echo $usuario[0]->login; ?>">*<br><br>
			</label>

			<label>Password:
				<input type="password" name="txtsenha" id="txtsenha" value="<?php echo $usuario[0]->senha; ?>">*<br><br>
			</label>


			<label>Tipo
			<select name="seltipo" id="seltipo">
			<?php
if ($usuario[0]->tipo == 'adm') {
	echo '<option value="adm" selected="selected">adm</option>';
	echo '<option value="visitante">visitante</option>';
}
else {
	echo '<option value="adm">adm</option>';
	echo '<option value="visitante" selected="selected">visitante</option>';
}

unset($_SESSION['usuarios']);
?></label><br>
				</select>	
			</fieldset>

			<br>
			<fieldset><legend>Ações</legend>
				<input type="reset" name="btnlimpar" id="btnlimpar" value="Limpar">
				<input type="submit" name="btnalterar" id="btnalterar" value="Alterar">
			</fieldset>
		</form>

<!-- InstanceEndEditable -->
			</div>
		</div>
		<!-- end #content -->
		
		<div id="sidebar">
<?php
if (!isset($_SESSION['privateUser'])) {
?>
		<form name="login" id="login" method="post" action="../controle/usuariocontrole.php?op=logar">
			<input type="text" name="txtlogin" id="txtlogin" placeholder="login"><br>
			<input type="password" name="txtsenha" id="txtsenha" placeholder="senha"><br>
			<input type="submit" name="btnlogar" id="btnlogar" value="Logar">
		</form>
<?php
}
else {
?>
		<ul>
			<li>
				<h2>Links privados</h2>
				<ul>
					<li><a href="../controle/usuariocontrole.php?op=consultar">Consultar</a></li>
					<li><a href="guidelusuario.php">Excluir</a></li>
					<li><a href="guibuscausuario.php">Busca Avançada</a></li>
					<li><a href="../controle/usuariocontrole.php?op=deslogar">Deslogar</a></li>
				</ul>
			</li>
		</ul>
<?php
}
?>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>Copyright (c) 2022 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
<!-- InstanceEnd --></html>