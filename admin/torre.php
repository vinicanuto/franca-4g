<?php require_once "header.inc.php" ?>
<?php require_once "../backend/db.inc.php" ?>



<div class="box">
    <div class="box-header">
        <h3 class="box-title">Torres</h3>
        <div class="box-tools pull-right">
            <!-- Collapse Button -->
            <form method="get" action="cadastro_torre.php"><button class="btn btn-primary" type="submit" value="addtorre">Cadastrar</button></form>
        </div>
    </div>

    <!-- /.box-header -->

    <div class="box-body table-responsive no-padding">
        <table  id="example2" class="table table-hover">
<thead class="thead-primary">
                <tr>
                    <th>Id</th>
                    <th>SiteId</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Altura</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from torre";
                $result = $conn->query($sql);
                $i = 1;
                while ($torre = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $torre['id_torre']; ?></td>
                        <td><?= $torre['site_id']; ?></td>
                        <td><?= $torre['longitude']; ?></td>
                        <td><?= $torre['latitude']; ?></td>
                        <td><?= $torre['altura']; ?></td>
                        <td><form method="post" action="edit_torre.php?id=<?= $torre['id_torre']; ?>"><button class="btn btn-primary" type="submit" value="edit">Editar</button></form></td>
                        <td><form method="post" action="del_torre.php?id=<?= $torre['id_torre']; ?>"><button class="btn btn-danger" type="submit" name="id_torre" value="delete">Deletar</button></form></td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>

<!--        <table id="example2" class="table">
            <thead class="thead-primary">
                <tr>
                    <th>Id</th>
                    <th>SiteId</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Altura</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $sql = "SELECT * from torre";
        $result = $conn->query($sql);
        $i = 1;
        while ($torre = $result->fetch_assoc()) {
            ?>
                        <tr>
                            <td><?= $torre['id_torre']; ?></td>
                            <td><?= $torre['site_id']; ?></td>
                            <td><?= $torre['longitude']; ?></td>
                            <td><?= $torre['latitude']; ?></td>
                            <td><?= $torre['altura']; ?></td>
                            <td><form method="post" action="edit_torre.php?id=<?= $torre['id_torre']; ?>"><button class="btn btn-primary" type="submit" value="edit">Editar</button></form></td>
                            <td><form method="post" action="del_torre.php?id=<?= $torre['id_torre']; ?>"><button class="btn btn-danger" type="submit" name="id_torre" value="delete">Deletar</button></form></td>
                        </tr>
        <?php } ?>

            </tbody>
            <tfoot>

            </tfoot>
        </table>-->
    </div>



    <?php require_once "footer.inc.php" ?>