<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atualiza Livro</title>
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
                    <a class="nav-link" href="../controle/livrocontrole.php?op=listar">Listar Livros</a>
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
                    <h2 class="title">Alteração de Livros</h2>

                    <?php

                    if (isset($_SESSION['livro'])) {
                        include_once '../modelo/livro.class.php';

                        $livro = new Livro();
                        $livro = unserialize($_SESSION['livro']);
                    } else {
                        echo 'Livros não existe!';
                    }

                    ?>

                    <form name="cad" id="cad" action="../controle/livrocontrole.php?op=confirmalterar" method="post">
                        <fieldset>
                            <legend>Atualizar Livro</legend>
                            <label for="txtidlivro">Código:
                            </label>
                            <input type="text" class="form-control" readonly name="txtidlivro" id="txtidlivro" value="<?php echo $livro->id; ?>"><br><br>


                            <label for="txttitulo">Titulo:
                            </label>
                            <input type="text" class="form-control" name="txttitulo" id="txttitulo" value="<?php echo $livro->titulo; ?>"><br><br>

                            <label for="txtautor">Autor:
                            </label>
                            <input type="text" class="form-control" name="txtautor" id="txtautor" value="<?php echo $livro->autor; ?>"><br><br>

                        </fieldset>

                        <br>
                        <fieldset>
                            <legend>Ações</legend>
                            <input class="btn btn-dark" type="reset" name="btnlimpar" id="btnlimpar" value="Limpar">
                            <input class="btn btn-dark" type="submit" name="btnalterar" id="btnalterar" value="Alterar">
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