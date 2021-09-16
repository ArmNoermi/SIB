<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Berkas DTI</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/dist/img/Dokumen.ico" />

    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-white sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('dashboard'); ?>" class="logo">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-cubes"></i>
                    Dokumen <b>TI</b>
                    <!-- <span class="logo-mini"><b>D</b>TI</span>
                <span class="logo-lg"> Divisi <b>TI</b> </span> -->
                </div>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>


                <img src="<?= base_url(); ?>assets/dist/img/logoSI.png" width="75px">
                <span>
                    <b>D</b>ivisi
                    <b>T</b>eknologi
                    <b>I</b>nformasi
                </span>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown tasks-menu">

                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('uploads/profile/') . $this->fungsi->user_login()->foto; ?>" class="user-image" alt="User Image">

                                <span class="hidden-xs"> <?= ucfirst($this->fungsi->user_login()->level == 1 ? "admin" : "karyawan"); ?></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="<?= base_url('uploads/profile/') . $this->fungsi->user_login()->foto; ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $this->fungsi->user_login()->name; ?>
                                        <small><?= $this->fungsi->user_login()->address; ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('users/profil_saya'); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->


        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('uploads/profile/') . $this->fungsi->user_login()->foto; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->name; ?></p>
                        <a href="<?php echo site_url('users/profil_saya'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">


                    <?php
                    $level_user = $this->fungsi->user_login()->level;
                    $queryMenu = "SELECT `auth_menu_user`.`id_menu`, `nama_menu`
                                     FROM `auth_menu_user` JOIN `auth_akses_user`
                                     ON `auth_menu_user`.`id_menu` = `auth_akses_user`.`id_menu`
                                     WHERE `auth_akses_user`.`id_level` = $level_user
                                     ORDER BY `auth_akses_user`.`id_menu` ASC
                            ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>

                    <?php foreach ($menu as $m) { ?>
                        <li class="header">
                            <b><?= $m['nama_menu'] ?></b>
                        </li>

                        <?php
                        $idMenu = $m['id_menu'];
                        $querySubMenu = "SELECT *
                                                    FROM `auth_sub_menu` JOIN `auth_menu_user`
                                                    ON `auth_sub_menu`.`id_menu` = `auth_menu_user`.`id_menu`
                                                    WHERE `auth_sub_menu`.`id_menu` = $idMenu
                                                    AND `auth_sub_menu`.`aktif` = 1
                                    ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) { ?>
                            <?php if ($judul == $sm['judul']) : ?>
                                <li class="active">
                                <?php else : ?>
                                <li class="">
                                <?php endif; ?>
                                <a href="<?= base_url($sm['url']) ?>">
                                    <i class="<?= $sm['icon'] ?>"></i>
                                    <span><?= $sm['judul'] ?></span>
                                </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                </ul>
            </section>
        </aside>

        <!-- =============================================== -->

        <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>


        <div class="content-wrapper">
            <?php echo $content; ?>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>DTI</b> Version
            </div>
            <center><strong>Copyright &copy; <?= date('Y') ?></strong> All rights reserved. </center>
        </footer>
    </div>

    <!-- jQuery 3 -->
    <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>

    <!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/Flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url(); ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>


</body>

</html>