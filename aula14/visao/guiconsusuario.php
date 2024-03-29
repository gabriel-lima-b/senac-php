<?php
	session_start();
	include_once'../util/controlelogin.class.php';
	ControleLogin::verificarAcesso();
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

-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="Templates/modelo.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Aula11 - Consulta no Banco COM Validação</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="../estilos/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">Consulta</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="../index.php">Homepage</a></li>
					<li><a href="guicadusuario.php">Cadastro</a></li>
					
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
		<h2 class="title">Consulta de usuários</h2>

		<p>
			<?php
				if(isset($_SESSION['usuarios']) ){
					include_once'../modelo/usuario.class.php';
					$usu = array();
					$usu = unserialize($_SESSION['usuarios']);
			?>
					<table summary="Tabela de usuários" border="1">
						<caption>Usuários</caption>
						<thead>
							<tr>
								<th>Código</th>
								<th>Login</th>
								<th>Senha</th>
								<th>Tipo</th>
								<th>Alterar</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>Código</th>
								<th>Login</th>
								<th>Senha</th>
								<th>Tipo</th>
								<th>Alterar</th>
							</tr>
						</tfoot>

					//Imprimindo toString da classe Usuario
			<tbody>		
			<?php
					foreach ($usu as $u) {
						echo'<tr>';
						echo "<td>
						<a href='../controle/usuariocontrole.php?op=deletar&idUsuario=$u->idUsuario'>$u->idUsuario </a> </td>";
						echo'<td>'.$u->login.'</td>';
						echo'<td>*********</td>';
						echo'<td>'.$u->tipo.'</td>';
						echo"<td> <a href='../controle/usuariocontrole.php?op=alterar&idUsuario=$u->idUsuario'>Alterar</a> </td>";
						echo'</tr>';
					}//fecha a foreach
					unset($_SESSION['usuarios']);
			?>
			</tbody>
			</table>
			<?php		
				}else{
					echo 'Variável usuários não existe!';
				}//fecha o else isset usuarios
			?>
		</p>
				<!-- InstanceEndEditable -->

			</div>
		</div>
		<!-- end #content -->
		
		<div id="sidebar">
			<ul>
				<li>
					<h2>Categorias</h2>
					<ul>
						<li><a href="#">link 1</a></li>
						<li><a href="#">link 2</a></li>
						<li><a href="#">link 3</a></li>
					</ul>
				</li>
			</ul>
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