<?php
// including the database connection file
require_once "../backend/db.inc.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // checking empty fields
    if (empty($nome) || empty($sobrenome) || empty($login) || empty($senha)) {
        if (empty($nome)) {
            echo "<font color='red'>Nome esta vazio.</font><br/>";
        }

        if (empty($sobrenome)) {
            echo "<font color='red'>Sobrenome está vazio.</font><br/>";
        }

        if (empty($login)) {
            echo "<font color='red'>Login está vazio.</font><br/>";
        }
        if (empty($senha)) {
            echo "<font color='red'>Senha está vazio.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE usuario SET nome='$nome' , sobrenome='$sobrenome' , login='$login', senha='$senha' WHERE id_usuario=$id";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "usuario alterado com sucesso";
            header("Location: users.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>

<?php
require_once "../backend/db.inc.php";
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM usuario WHERE id_usuario=$id";
$result = $conn->query($sql);
$conn->close();



while ($res = mysqli_fetch_array($result)) {
    $nome = $res['nome'];
    $sobrenome = $res['sobrenome'];
    $login = $res['login'];
    $status = $res['status'];
    $password = $res['senha'];
}
?>
<!--<html>
    <head>    
        <title>Edit Data</title>
    </head>

    <body>
        <a href="index.php">Home</a>
        <br/><br/>

        <form name="form1" method="post" action="edit_users.php">
            <table border="0">
                <tr> 
                    <td>Nome</td>
                    <td><input type="text" name="nome" value="<?php echo $nome; ?>"></td>
                </tr>
                <tr> 
                    <td>Sobrenome</td>
                    <td><input type="text" name="sobrenome" value="<?php echo $sobrenome; ?>"></td>
                </tr>
                <tr> 
                    <td>Login</td>
                    <td><input type="text" name="login" value="<?php echo $login; ?>"></td>
                </tr>
                <tr> 
                    <td>Senha</td>
                    <td><input type="password" name="senha" value="<?php echo $password; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>-->

<!DOCTYPE html>
<!--<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Registration Page</title>
         Tell the browser to be responsive to screen width 
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
         Bootstrap 3.3.7 
        <link rel="stylesheet" href="admin-theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
         Font Awesome 
        <link rel="stylesheet" href="admin-theme/bower_components/font-awesome/css/font-awesome.min.css">
         Ionicons 
        <link rel="stylesheet" href="admin-theme/bower_components/Ionicons/css/ionicons.min.css">
         Theme style 
        <link rel="stylesheet" href="admin-theme/dist/css/AdminLTE.min.css">
         iCheck 
        <link rel="stylesheet" href="admin-theme/plugins/iCheck/square/blue.css">

         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
         WARNING: Respond.js doesn't work if you view the page via file:// 
        [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]

         Google Font 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition register-page">
        <div class="edit-box">
            <div class="edit-box-body">
                <p class="login-box-msg">Editar conta </p>

                
            </div>
             /.form-box 
        </div>
         /.register-box 

         jQuery 3 
        <script src="admin-theme/bower_components/jquery/dist/jquery.min.js"></script>
         Bootstrap 3.3.7 
        <script src="admin-theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
         iCheck 
        <script src="admin-theme/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>-->

<html>
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
                        <h3 class="box-title">Editar Usuario</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form name="form1" method="post" action="edit_users.php">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $nome; ?>">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Login" name="login" value="<?php echo $login; ?>">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Senha" name="senha" value="<?php echo $password; ?>">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="update" value="Update">Salvar</button>
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
</html>   