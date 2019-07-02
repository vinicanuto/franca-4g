<?php require_once "header.inc.php" ?>
<?php require_once "../backend/db.inc.php" ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de usuarios</h3>
        <div class="box-tools pull-right">
            <form method="get" action="cadastro_usuario.php"><button class="btn btn-primary pull-right" type="submit" value="addusuario">Cadastrar</button></form>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="box-body table-responsive no-padding">
            <table  id="example1" class="table table-hover">
                <thead class="thead-primary">
                    <tr>
                        <th>Sn</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Login</th>
                        <th>Administrador</th>
                        <th>Ativo</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from usuario";
                    $result = $conn->query($sql);
                    $i = 1;
                    while ($user = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user['nome']; ?>
                            </td>
                            <td><?= $user['sobrenome']; ?></td>
                            <td><?= $user['login']; ?></td>
                            <td><?= $user['fl_admin']; ?></td>
                            <td><?= $user['status']; ?></td>
                            <td><form method="post" action="edit_users.php?id=<?= $user['id_usuario']; ?>"><button class="btn btn-primary"type="submit">Editar</button></form></td>
                            <td><form method="post" action="del_users.php?id=<?= $user['id_usuario']; ?>"><button class="btn btn-danger"type="submit" name="id">Deletar</button></form></td>
                        </tr>
                    <?php } ?>

                </tbody>

            </table>
<!--            <table id="example2" class="table table-bordered table-hover">
                <thead class="thead-primary">
                    <tr>
                        <th>Sn</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Login</th>
                        <th>Administrador</th>
                        <th>Ativo</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from usuario";
                    $result = $conn->query($sql);
                    $i = 1;
                    while ($user = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $user['nome']; ?>
                            </td>
                            <td><?= $user['sobrenome']; ?></td>
                            <td><?= $user['login']; ?></td>
                            <td><?= $user['fl_admin']; ?></td>
                            <td><?= $user['status']; ?></td>
                            <td><form method="post" action="edit_users.php?id=<?= $user['id_usuario']; ?>"><button class="btn btn-primary"type="submit">Editar</button></form></td>
                            <td><form method="post" action="del_users.php?id=<?= $user['id_usuario']; ?>"><button class="btn btn-danger"type="submit" name="id">Deletar</button></form></td>
                        </tr>
                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sn</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Login</th>
                        <th>Administrador</th>
                        <th>Ativo</th>
                    </tr>
                </tfoot>
            </table>-->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <?php require_once "footer.inc.php" ?>

