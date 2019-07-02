<?php require_once "header.inc.php" ?>
<?php require_once "../backend/db.inc.php" ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de Torres</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="../backend/torresubmit.php">
            <div class="form-group">
                <label for="exampleInputEmail1">SiteID</label>
                <input type="text" class="form-control" id="siteId" name="siteid" placeholder="Site ID">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Longitude</label>
                <input type="text" class="form-control" id="longTorre" name="longitude" placeholder="Longitude">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Latitude</label>
                <input type="text" class="form-control" id="latTorre" name="latitude" placeholder="Latitude">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Altura</label>
                <input type="text" class="form-control" id="alturaTorre" name="altura" placeholder="Altura">
            </div>
            <button type="submit" class="btn btn-primary" name="save" value="save">Cadastrar</button>
        </form>
    </div>
</div>

<?php require_once "footer.inc.php" ?>