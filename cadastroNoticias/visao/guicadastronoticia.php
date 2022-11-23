<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <!-- InstanceBegin template="/Templates/modelo.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Site</title>
    <!-- InstanceEndEditable -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link
      href="../estilo/estilo.css"
      rel="stylesheet"
      type="text/css"
      media="screen"
    />
    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="menu">
      <ul>
        <li id="button1"><a href="../index.php" title="">Home</a></li>
        <li id="button2">
          <a href="guicadastronoticia.php" title="">Cadastro de Noticia</a>
        </li>
        <li id="button3">
          <a href="../controle/noticiacontrole.php?op=listar" title="">Busca de Noticias</a>
        </li>
        <li id="button4"><a href="#" title="">Sobre</a></li>
        <li id="button5"><a href="#" title="">Contato</a></li>
      </ul>
    </div>
    <div id="header">
      <div id="logo">
        <h1><a href="#" title="">Cadastro de Notícias</a></h1>
      </div>
    </div>

    <div id="content">
      <div id="main">
        <div id="right">
          <div id="menu_lateral">
            <h2>Menu</h2>
            <ul>
              <li class="noend"><a href="#" title="">Link</a></li>
              <li class="noend"><a href="#" title="">Outro link</a></li>
            </ul>
          </div>
        </div>
        <div id="left">
          <!-- InstanceBeginEditable name="título do conteúdo" -->
          <h1>Cadastro de notícias</h1>
          <!-- InstanceEndEditable -->
          <form
            action="../controle/noticiacontrole.php?op=cadastrar"
            method="post"
            name="formcad"
          >
            <label for="titulo">Titulo</label>
            <br />
            <input type="text" name="titulo" id="titulo" />
            <br /><br />
            <label for="texto">Texto</label>
            <br />
            <textarea name="texto" id="texto" cols="30" rows="10"> </textarea>
            <br /><br />

            <br />
            <input type="submit" name="btn" id="btn" value="Cadastrar" />
          </form>
        </div>
      </div>
      <div id="conbot"></div>
      <!--detalhe -->
    </div>

    <div id="footer">
      <p>
        Template de Metamorphosis Design<a
          href="http://www.flashtemplatesdesign.com/"
          title="Free Flash Templates"
        ></a>
        - &quot;Contrast&quot;
      </p>
    </div>
  </body>
  <!-- InstanceEnd -->
</html>
