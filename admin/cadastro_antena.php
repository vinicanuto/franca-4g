<?php require_once "header.inc.php" ?>
<?php require_once "../backend/db.inc.php" ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Cadastro de Antenas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="../backend/antenasubmit.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Setor</label>
                <input type="text" class="form-control" id="sector" name="sector" placeholder="Setor">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Azimute</label>
                <input type="text" class="form-control" id="Azimute" name="azimuth" placeholder="Azimute">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">tilt</label>
                <input type="text" class="form-control" id="tilt" name="tilt" placeholder="tilt">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">hori_bw</label>
                <input type="text" class="form-control" id="hori_bw" name="hori_bw" placeholder="hori_bw">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">vert_bw</label>
                <input type="text" class="form-control" id="vert_bw" name="vert_bw" placeholder="vert_bw">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Torre</label>
                <?php
                        $sql2 = "SELECT id_torre,site_id FROM torre";
                        $result2 = $conn->query($sql2);

                        echo "<select name='torre'>";
                        while ($row = $result2->fetch_assoc()) {
                            echo "<option value='" . $row['id_torre'] . "'>" . $row['site_id'] . "</option>";
                        }
                        echo "</select>";
                        ?>
            </div>
            <button type="submit" class="btn btn-primary" name="save" value="save">Cadastrar</button>
        </form>
    </div>
</div>

<?php require_once "footer.inc.php" ?>