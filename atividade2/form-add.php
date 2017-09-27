<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
        <link href="dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
        <h1 class="text-center">Sistema de Cadastro</h1>
        <hr>
        <h2>Cadastro de Usuário</h2>
        <hr>
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="email">Cor: </label>
            <br>
            <input type="text" name="color" id="color">
            <br><br>
            Preço
            <br>
            <input type="text" name="price" id="price">
            <br><br>
            <label for="birthdate">Data da compra </label>
            <br>
            <input type="text" name="startdate" id="startdate" placeholder="dd/mm/YYYY">
            <br><br>
            Quantidade
            <br>
            <input type="text" name="quantity" id="quantity">
            <br><br>
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </form>
        <script src="dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="dist/js/npm.js" type="text/javascript"></script>
        </div>
    </body>
</html>