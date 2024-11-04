<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COOLSOFT | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/template/bootstrap/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/font-awesome/css/font-awesome.min.css') ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/AdminLTE.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/diseño.css') ?>">
</head>
<body class="hold-transition login-page" id="login">
    <div class="login-box">
        <div class="login-logo">
            <!-- Aquí puedes agregar el logo si lo necesitas -->
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
        <figure>
            <center id="imglogin"><img src="<?= base_url('assets/template/dist/img/ICONO COOLSOFT jpg.png') ?>" /></center>
        </figure>
        <hr>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <p><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>

        <p class="login-box-msg">Introduzca sus datos de ingreso</p>

        <form action="<?= base_url('clogin/clogeo') ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Usuario" name="txtnombre" id="txtnombre">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="txtpass" id="txtpass">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-block" id="botonVioleta">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/template/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/template/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
