<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, color, price, price, startdate, quantity FROM products WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Usuário</title>
        <link href="dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
        <h1 class="text-center">Sistema de Cadastro</h1>
        <hr>
        <h3>Edição de Usuário</h3>
        <hr>
        </div>
        <div class="container-fluid">
        <form action="edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input type="text" name="color" id="color" value="<?php echo $user['color'] ?>">
            <br><br>
            Preço
            <br>
            <input type="text" name="price" id="price" value="<?php echo $user['price'] ?>">
            <br><br>
            <label for="startdate">Data da Venda: </label>
            <br>
            <input type="text" name="startdate" id="startdate" placeholder="dd/mm/YYYY" 
                   value="<?php echo dateConvert($user['startdate']) ?>">
            <br><br>
            <label for="startdate">Quantidade: </label>
            <br>
            <input type="text" name="quantity" id="quantity" value="<?php echo $user['quantity'] ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar" class="btn btn-success">
        </form>
        <script src="dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="dist/js/npm.js" type="text/javascript"></script>
        </div>
    </body>
</html>