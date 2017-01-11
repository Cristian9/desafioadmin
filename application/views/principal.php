<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Administraci&oacute;n</title>
        <meta name="description" content="description">
        <meta name="author" content="DevOOPS">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url() ?>statics/plugins/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>statics/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url() ?>statics/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>statics/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>statics/plugins/select2/select2.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>statics/css/style_v2.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>statics/css/buttons.dataTables.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                        <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
                        <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--Start Header-->
        <div id="screensaver">
            <canvas id="canvas"></canvas>
            <i class="fa fa-lock" id="screen_unlock"></i>
        </div>
        <div id="modalbox">
            <div class="devoops-modal">
                <div class="devoops-modal-header">
                    <div class="modal-header-name">
                        <span>Basic table</span>
                    </div>
                    <div class="box-icons">
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="devoops-modal-inner">
                </div>
                <div class="devoops-modal-bottom">
                </div>
            </div>
        </div>
        <header class="navbar">
            <div class="container-fluid expanded-panel">
                <div class="row">
                    <div id="logo" class="col-xs-12 col-sm-2">
                        <a href="index_v1.html">UTP</a>
                    </div>
                    <div id="top-panel" class="col-xs-12 col-sm-10">
                        <div class="row">
                            <div class="col-xs-8 col-sm-4"></div>
                            <div class="col-xs-4 col-sm-8 top-panel-right">
                                <ul class="nav navbar-nav pull-right panel-menu">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                            <div class="avatar">
                                                <img src="<?php echo base_url() ?>statics/img/avatar.jpg" class="img-circle" alt="avatar" />
                                            </div>
                                            <i class="fa fa-angle-down pull-right"></i>
                                            <div class="user-mini pull-right">
                                                <span class="welcome">Conectado como,</span>
                                                <span><?php echo $_SESSION['uname']; ?></span>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="logout">
                                                    <i class="fa fa-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End Header-->
        <!--Start Container-->
        <div id="main" class="container-fluid">
            <div class="row">
                <div id="sidebar-left" class="col-xs-2 col-sm-2">
                    <ul class="nav main-menu">
                        <li>
                            <a href="users-newusers" class="active ajax-link">
                                <i class="fa fa-dashboard"></i>
                                <span class="hidden-xs">Usuarios</span>
                            </a>
                        </li>
                        <!--<li>
                            <a href="courses" class="active ajax-link">
                                <i class="fa fa-bar-chart-o"></i>
                                <span class="hidden-xs">Cursos</span>
                            </a>
                        </li>-->
                    </ul>
                </div>
                <!--Start Content-->
                <div id="content" class="col-xs-12 col-sm-10">
                    <!--<div class="preloader">
                        <img src="<?php echo base_url() ?>statics/img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
                    </div>-->
                    <div id="ajax-content"></div>
                </div>
                <!--End Content-->
            </div>
        </div>
        <!--End Container-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="http://code.jquery.com/jquery.js"></script>-->
        <script src="<?php echo base_url() ?>statics/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>statics/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- <script src="<?php //echo base_url() ?>statics/js/jquery.cookie.js"></script> -->
        <script src="<?php echo base_url() ?>statics/js/jquery.doubleScroll.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url() ?>statics/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- All functions for this theme + document.ready processing -->
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>statics/js/dataTables.buttons.js"></script>
        <script src="<?php echo base_url() ?>statics/js/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>statics/js/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>statics/js/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ?>statics/js/buttons.html5.js"></script>

        <script src="<?php echo base_url() ?>statics/js/devoops.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>statics/plugins/select2/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
    </body>
</html>
