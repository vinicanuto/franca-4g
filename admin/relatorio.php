<?php require_once "header.inc.php" ?>


<?php require_once "../backend/db.inc.php" ?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Relatorio</h3>
        <div class="col-xs-12">
            <form method="post" action="../backend/relatorio_submit.php?cleanlogs"><button class="btn btn-primary btn-sm pull-right" type="submit" value="cleanlogs">Limpar Logs</button></form>
            <form method="post" action="../backend/relatorio_submit.php?export"><button class="btn btn-primary btn-sm pull-right" type="submit" value="export"><i class="fa fa-download"></i> Exportar CSV</button></form>
        </div>

    </div>

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table  id="example2" class="table table-hover">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Usuário</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from relatorio";
                $result = $conn->query($sql);
                $i = 1;
                while ($antena = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $antena['data']; ?></td>
                        <td><?= $antena['usuario']; ?></td>
                        <td><?= $antena['descricao']; ?></td>

                    </tr>
                <?php } ?>

            </tbody>


        </table>
<!--        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Usuário</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from relatorio";
                $result = $conn->query($sql);
                $i = 1;
                while ($antena = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $antena['data']; ?></td>
                        <td><?= $antena['usuario']; ?></td>
                        <td><?= $antena['descricao']; ?></td>

                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>

            </tfoot>
        </table>-->
    </div>



    <?php require_once "footer.inc.php" ?>