<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid">
            
        <h1 class="text-center">Sistema de Cadastro</h1>
        <hr>
        <h3 class="text-center">Cadastro de Usuário</h3>
        <hr>
        <form action="add.php" method="post" class="form-horizontal">

            <label for="name">Nome:
            <input type="text" name="name" id="name">
            </label>
    
            <br><br>
  
            <label for="email">Email: 
            <input type="text" name="email" id="email">
            </label>
            <br><br>
            Gênero:
            <br>
            <input type="radio" name="gender" id="gener_m" value="m">
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" id="gener_f" value="f">
            <label for="gener_f">Feminino </label>
            <br><br>
    
            <label for="birthdate">Data de Nascimento: 
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY">
            </label>
            <br><br>
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </form>
        <script src="dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="dist/js/npm.js" type="text/javascript"></script>
        </div>
    </body>
</html>