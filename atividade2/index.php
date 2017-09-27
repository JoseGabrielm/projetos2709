<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM products ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, color, price, startdate, quantity  "
        . "FROM products ORDER BY name ASC";
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
    <body>
        <div class="container-fluid">
        <h1 class="text-center">Sistema de Cadastro</h1>
        <hr>
        <p class="text-center"><a href="form-add.php">Adicionar Usuário</a></p>
        <br />
        <h2 class="text-center">Lista de Produtos</h2>
        <p class="text-center">Total de Produtos: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
        <hr>
        
        <p class="text-center"><a href="form-add.php">Adicionar Produto</a></p>
        </div>
        <div class="container">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>COLOR</th>
                        <th>PREÇO</th>
                        <th>DATA</th>
                        <th>QUANTIDADE</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['color'] ?></td>
                            <td><?php echo "R$" . $user['price'] ?></td>
                            <td><?php echo dateConvert($user['startdate']) ?></td>
                            <td><?php echo $user['quantity'] ?></td>
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
        <div class="container-fluid">
            <p>Nenhum Produto registrado</p>
        </div>
        <?php endif; ?>
            <script src="dist/js/bootstrap.js" type="text/javascript"></script>
            <script src="dist/js/npm.js" type="text/javascript"></script>
        </div>
    </body>
</html>