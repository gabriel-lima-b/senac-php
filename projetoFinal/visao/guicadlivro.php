<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista Livros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="../index.html">

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../visao/guicadlivro.php">Cadastrar Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../visao/guilistalivro.php">Listar Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../visao/guidellivro.php">Deletar Livros</a>
                </li>
            </ul>
        </div>
    </nav>

    <div container>
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                <div class="post">
                    <!-- InstanceBeginEditable name="conteúdo" -->
                    <h2 class="title">Cadastro de Livros</h2>

                    <form action="../controle/livrocontrole.php?op=cadastrar" method="post" name="formcad">
                        <fieldset>
                            <input type="text" name="txttitulo" id="txttitulo" placeholder="titulo"><br><br>
                            <input type="text" name="txtautor" id="txtautor" placeholder="autor"><br><br>
                        </fieldset>
                        <br>
                        <fieldset>
                            <input class="btn-dark" type="submit" name="btn" id="btn" value="Cadastrar">
                        </fieldset>
                    </form>
                    <!-- InstanceEndEditable -->

                </div>
            </div>
        </div>
    </div>







</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>