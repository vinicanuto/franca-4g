<?php
if ($_SESSION["role"] = 0) {
    header("location: error.php");
}
?>

<?php require_once "header.inc.php" ?>


<?php require_once "../backend/db.inc.php" ?>



<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de Antenas</h3>
        <div class="box-tools pull-right">
            <!-- Collapse Button -->
            <form method="get" action="cadastro_antena.php"><button class="btn btn-primary" type="submit" value="addtorre">Cadastrar</button></form>
        </div>
    </div>
    <div class="box-body table-responsive no-padding">
        <table  id="example1" class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Setor</th>
                <th>Azimute</th>
                <th>tilt</th>
                <th>hori_bw</th>
                <th>vert_bw</th>
                <th>Torre</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select antena.id_antena, antena.sector, antena.azimuth, antena.tilt, antena.hori_bw, antena.vert_bw, torre.site_id from antena left join torre on antena.fk_Torre=torre.id_torre; ";
                $result = $conn->query($sql);
                $i = 1;
                while ($antena = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $antena['id_antena']; ?></td>
                        <td><?= $antena['sector']; ?></td>
                        <td><?= $antena['azimuth']; ?></td>
                        <td><?= $antena['tilt']; ?></td>
                        <td><?= $antena['hori_bw']; ?></td>
                        <td><?= $antena['vert_bw']; ?></td>
                        <td><?= $antena['site_id']; ?></td>

                        <td><form method="post" action="edit_antena.php?id=<?= $antena['id_antena']; ?>"><button class="btn btn-primary" type="submit" value="edit">Editar</button></form></td>
                        <td><form method="post" action="del_antena.php?id=<?= $antena['id_antena']; ?>"><button class="btn btn-danger" type="submit" name="del_torre" value="delete">Deletar</button></form></td>
                    </tr>
                <?php } ?>

            </tbody>
            </tbody></table>
    </div>
    <!-- /.box-header -->
<!--    <table id="example2" class="table table-bordered table-hover">
        <thead class=" thead-primary">
            <tr>
                <th>Id</th>
                <th>Setor</th>
                <th>Azimute</th>
                <th>tilt</th>
                <th>hori_bw</th>
                <th>vert_bw</th>
                <th>Torre</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select antena.id_antena, antena.sector, antena.azimuth, antena.tilt, antena.hori_bw, antena.vert_bw, torre.site_id from antena left join torre on antena.fk_Torre=torre.id_torre; ";
            $result = $conn->query($sql);
            $i = 1;
            while ($antena = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $antena['id_antena']; ?></td>
                    <td><?= $antena['sector']; ?></td>
                    <td><?= $antena['azimuth']; ?></td>
                    <td><?= $antena['tilt']; ?></td>
                    <td><?= $antena['hori_bw']; ?></td>
                    <td><?= $antena['vert_bw']; ?></td>
                    <td><?= $antena['site_id']; ?></td>

                    <td><form method="post" action="edit_antena.php?id=<?= $antena['id_antena']; ?>"><button class="btn btn-primary" type="submit" value="edit">Editar</button></form></td>
                    <td><form method="post" action="del_antena.php?id=<?= $antena['id_antena']; ?>"><button class="btn btn-danger" type="submit" name="del_torre" value="delete">Deletar</button></form></td>
                </tr>
            <?php } ?>

        </tbody>
        <tfoot>

        </tfoot>
    </table>-->
</div>



<?php require_once "footer.inc.php" ?>