<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url('assets/template/dist/img/iconoLogo.ico'); ?>">
    <title>Sistema | CoolSoft</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/template/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/bootstrap/css/bootstrap.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/fontawesome/css/all.css'); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/AdminLTE.min.css'); ?>">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/template/DataTables-1.13.3/css/jquery.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/DataTables-1.13.3/css/dataTables.dateTimes.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/DataTables-1.13.3/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/DataTables-1.13.3/css/fixedColumns.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/Buttons-2.3.5/css/buttons.bootstrap4.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/skins/_all-skins.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/diseño.css'); ?>">
    <link href="<?= base_url('assets/select2-4.0.10/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/sweetalert/dist/sweetalert.css'); ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/template/jquery/jquery-3.6.0.min.js'); ?>"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo" id="menu3">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?= base_url('assets/template/dist/img/ICONO COOLSOFT jpg.png'); ?>" id="imgSmall"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="<?= base_url('assets/template/dist/img/ICONO COOLSOFT jpg.png'); ?>" id="img"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" id="menu2">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu" id="menu2">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs"><i class="fa-solid fa-user">&nbsp;&nbsp;</i><?= session('nombre') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="<?= base_url('clogin/clogout'); ?>" style="color:red;"><i class="fa-solid fa-xmark">&nbsp;&nbsp;</i>Cerrar Sesión</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <style>
            .navbar-nav>.user-menu>.dropdown-menu>.user-body a {
                color: red !important;
            }

            .navbar-nav>.user-menu>.dropdown-menu {
                width: 100px;
            }

            .skin-blue .main-header .navbar .nav > li > a:hover,
            .skin-blue .main-header .navbar .nav > li > a:active,
            .skin-blue .main-header .navbar .nav > li > a:focus,
            .skin-blue .main-header .navbar .nav .open > a,
            .skin-blue .main-header .navbar .nav .open > a:hover,
            .skin-blue .main-header .navbar .nav .open > a:focus,
            .skin-blue .main-header .navbar .nav > .active > a {
                color: #000000;
            }
        </style>
