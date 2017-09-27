<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM users ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, email, gender, birthdate "
        . "FROM users ORDER BY name ASC";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
        <link href="dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <div class="container-fluid">
    <body>
        <h1 class="text-center">Sistema de Cadastro</h1>
        <hr>
        <p class="text-center"><a href="form-add.php">Adicionar Usuário</a></p>
        <hr>
        <h2><i>Lista de Usuários</i></h2>
        <p>Total de usuários: <strong><?php echo $total ?></strong></p>
        <?php if ($total > 0): ?>
        <br>
    </div>
    <div class="container">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Gênero</th>
                        <th>Data de Nascimento</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo ($user['gender'] == 'M') ? 'Masculino' : 'Feminino' ?></td>
                            <td><?php echo dateConvert($user['birthdate']) ?></td>
                            <td><?php echo calculateAge($user['birthdate']) ?> anos</td>
                            <td>
                                <a href="form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                                <a href="delete.php?id=<?php echo $user['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </div>
        <?php else: ?>
    <p class="text-center"><strong><i>Nenhum usuário registrado</i></strong></p>
        <?php endif; ?>
            <script src="dist/js/bootstrap.js" type="text/javascript"></script>
            <script src="dist/js/npm.js" type="text/javascript"></script>
    </div>
    </body>
</html>