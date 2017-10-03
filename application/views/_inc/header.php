<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/simple-line-icons/simple-line-icons.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/uniform/css/uniform.default.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/morris/morris.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/fullcalendar/fullcalendar.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/jqvmap/jqvmap/jqvmap.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url("assets/global/css/components.min.css") ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url("assets/global/css/plugins.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= base_url("assets/layouts/layout/css/layout.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("/assets/layouts/layout/css/themes/darkblue.min.css") ?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= base_url("assets/layouts/layout/css/custom.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?= base_url("statistics_controller/index") ?>">
                    <img src="<?= base_url("assets/layouts/layout/img/logo.png") ?>" alt="logo" class="logo-default" style="margin-left:66px" /> </a>
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?= $user_profile->avatar != NULL ? base_url($user_profile->avatar) : base_url("assets/layouts/layout/img/avatar3_small.jpg") ?>" />
                            <span class="username username-hide-on-mobile"> <?= $user_profile->name ?> </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?= base_url("profile_controller/account") ?>">
                                    <i class="icon-user"></i> Editar perfil</a>
                            </li>
                             <li>
                                <a href="<?= base_url("profile_controller/alterPassword") ?>">
                                    <i class="icon-key"></i> Alterar senha </a>
                            </li>
                             <li>
                                <a href="<?= base_url("profile_controller/excluir") ?>">
                                    <i class="icon-ban"></i> Excluir conta </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?= base_url("login_controller/logout") ?>">
                                    <i class="icon-power"></i> Sair </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="<?= base_url("login_controller/logout") ?>" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <script src="<?= base_url('assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
