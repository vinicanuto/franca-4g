<?php require_once "header.inc.php" ?>

<?php
// including the database connection file
require_once "../backend/db.inc.php";

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id;;
$sql = "select antena.id_antena, antena.sector, antena.azimuth, antena.tilt, antena.hori_bw, antena.vert_bw, antena.fk_Torre, torre.site_id from antena left join torre on antena.fk_Torre=torre.id_torre where id_antena=$id";
$result = $conn->query($sql);



while ($res = mysqli_fetch_array($result)) {
    $sector = $res['sector'];
    $azimuth = $res['azimuth'];
    $tilt = $res['tilt'];
    $hori_bw = $res['hori_bw'];
    $vert_bw = $res['vert_bw'];
    $fk_Torre = $res['fk_Torre'];
}
?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit User</title>
    <!--Tell the browser to be responsive to screen width--> 
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--        Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="admin-theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!--        Font Awesome -->
    <link rel="stylesheet" href="admin-theme/bower_components/font-awesome/css/font-awesome.min.css">
    <!--        Ionicons -->
    <link rel="stylesheet" href="admin-theme/bower_components/Ionicons/css/ionicons.min.css">
    <!--        Theme style -->
    <link rel="stylesheet" href="admin-theme/dist/css/AdminLTE.min.css">
    <!--        iCheck -->
    <link rel="stylesheet" href="admin-theme/plugins/iCheck/square/blue.css">

    <!--        HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
            WARNING: Respond.js doesn't work if you view the page via file:// 
            [if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]
    
            Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Antena</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="form1" method="post" action="../backend/antenasubmit.php">
                    <div class="form-group has-feedback">
                        <label for="editAntena">Setor</label>
                        <input type="text" class="form-control" placeholder="setor" name="sector" value="<?php echo $sector; ?>">
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="editAntena">Azimute</label>
                        <input type="text" class="form-control" placeholder="Azimute" name="azimuth" value="<?php echo $azimuth; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="editAntena">Tilt</label>
                        <input type="text" class="form-control" placeholder="tilt" name="tilt" value="<?php echo $tilt; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="editAntena">Horizontal</label>
                        <input type="text" class="form-control" placeholder="hori_bw" name="hori_bw" value="<?php echo $hori_bw; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="editAntena">Vertical</label>
                        <input type="text" class="form-control" placeholder="vert_bw" name="vert_bw" value="<?php echo $vert_bw; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="editAntena">Torre</label>
                        <?php
                        require_once "../backend/db.inc.php";

                        $sql2 = "SELECT id_torre,site_id FROM torre;";
                        $result2 = $conn->query($sql2);
                        $conn->close();

                        echo "<select name='torre'>";
                        while ($row = $result2->fetch_assoc()) {
                            if ($row['id_torre'] == $fk_Torre) {
                                echo "<option selected='selected'value='" . $row['id_torre'] . "'>" . $row['site_id'] . "</option>";
                            } else {
                                echo "<option value='" . $row['id_torre'] . "'>" . $row['site_id'] . "</option>";
                            }
                        }
                        echo "</select>";
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="update" value="update">Salvar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>



        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- /.row -->
</section>
<?php require_once "footer.inc.php" ?>	