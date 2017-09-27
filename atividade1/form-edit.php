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
$sql = "SELECT name, email, gender, birthdate FROM users WHERE id = :id";
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
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Sistema de Cadastro</h1>
            <hr>
        <h3 class="text-center">Edição de Usuário</h3>
        <hr>
        <form action="edit.php" method="post">
            <label for="name">Nome: 

            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
            </label>
            <br><br>
            <label for="email">Email:

            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">
            </label>
            <br><br>
            Gênero:
            <br>
            <input type="radio" name="gender" id="gener_m" value="m" <?php if ($user['gender'] == 'm'): ?> 
                   checked="checked" <?php endif; ?>>
            <label for="gener_m">Masculino </label>
            <input type="radio" name="gender" id="gener_f" value="f" <?php if ($user['gender'] == 'f'): ?> 
                   checked="checked" <?php endif; ?>>
            <label for="gener_f">Feminino </label>
            <br><br>
            <label for="birthdate">Data de Nascimento:

            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/YYYY" 
                   value="<?php echo dateConvert($user['birthdate']) ?>">
            </label>
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar" class="btn btn-success">
        </form>
        </div>
        <script src="dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="dist/js/npm.js" type="text/javascript"></script>
    </body>
</html>

