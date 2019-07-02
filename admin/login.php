<?php require_once "header.login.inc.php" ?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>FRANC4G</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Entrar</p>
        

        <form action="../backend/loginsubmit.php" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Senha" name="senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->


        <a href="registro.php" class="text-center">Cadastre-se</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php require_once "header.login.inc.php" ?>