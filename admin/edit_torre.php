<?php require_once "header.inc.php" ?>

<?php
// including the database connection file
require_once "../backend/db.inc.php";




require_once "../backend/db.inc.php";
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * from torre WHERE id_torre=$id";
$result = $conn->query($sql);
$conn->close();



while ($res = mysqli_fetch_array($result)) {
    $site_id = $res['site_id'];
    $longitude = $res['longitude'];
    $latitude = $res['latitude'];
    $altura = $res['altura'];
}
?>


<!--<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de Torres</h3>
    </div>
     /.box-header 
    <div class="box-body">
        <form action="edit_torre.php">
            <div class="form-group">
                <label for="exampleInputEmail1">SiteID</label>
                <input type="text" class="form-control" id="site_id" name="site_id" placeholder="Site ID" value="<?php echo $site_id; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="<?php echo $latitude; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Altura</label>
                <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura" value="<?php echo $altura; ?>">
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="update" value="update">Salvar</button>
        </form>
    </div>
</div>-->


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
                    <h3 class="box-title">Editar Torre</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="form1" method="post" action="../backend/torresubmit.php">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="site_id" name="site_id" value="<?php echo $site_id; ?>">
                        <span class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="longitude" name="longitude" value="<?php echo $longitude; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="latitude" name="latitude" value="<?php echo $latitude; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="altura" name="altura" value="<?php echo $altura; ?>">
                        <span class="glyphicon  form-control-feedback"></span>
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