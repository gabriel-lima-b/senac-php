<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TD/xhtml1-transitional.dtd">
<html xmls="http://w3.org/2022/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Envio de arquivo</title>
  </head>

  <body>
    <h1>Envio de arquivos</h1>
<?php



?>

    <form
      action="../controle/uploadcontrole.php"
      method="post"
      enctype="multipart/form-data"
      name="form1"
      id="form1"
    ></form>
    <fieldset>
      <legend>Envio de arquivos</legend>
      <label>
        Nome
        <br />
        <input type="text" name="txtnome" id="txtnome" />
        <br />
      </label>
      <label>
        Selecione seu arquivo
        <br />
        <input type="file" name="arquivo" id="arquivo" />
        <br />
      </label>
      <br />
      tamanho máximo de arquivo:2MB
      <br />
      Formatos aceitos: doc e pdf
      <p>
        <label>
          <input type="submit" name="btnenviar" id="btnenviar" value="Enviar" />
        </label>
      </p>
    </fieldset>
  </body>
</html>
