

<!-- Begin page content -->
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>RootSilver Controle de Estoque</title>
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
        <link href="<?= base_url("assets/global/plugins/select2/css/select2.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/plugins/select2/css/select2-bootstrap.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url("assets/global/css/components.min.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url("assets/global/css/plugins.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?= base_url("assets/pages/css/login.min.css") ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?= base_url("assets/pages/img/logo-big.png") ?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <h3 class="form-title font-green">Entre!</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Digite seu login e senha. </span>
            </div>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($login_status) && ($login_status == "error")) : ?>
                <div class="alert alert-danger hint">
                    <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Usuário/Senha incorreto(s) </p>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata("login_status")): ?>
                <div class="alert alert-danger hint">
                    <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Este email já está cadastrado no sistema</p>
                </div>
            <?php endif; ?>

            <?php echo form_open('login_controller', array("data-toggle" => "validator")); ?>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" <?php echo form_input(array("name" => "email", "id" => "email", "class" => "form-control", "type" => "email", "placeholder" => "Email", "required" => "true")); ?> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" <?php echo form_input(array("name" => "password", "id" => "password", "class" => "form-control", "type" => "password", "placeholder" => "Senha", "data-minlength" => "6", "maxlength" => "22")); ?> </div>
            <div class="form-actions">
                <button class="btn green uppercase" type="submit" name="login" value="Login">Login</button>
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1" />Lembrar </label>
                <a href="javascript:;" id="forget-password" class="forget-password">Esqueceu a senha?</a>
                <?php form_close(); ?>
            </div>
            <div class="create-account">
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="<?= base_url('login_controller/forgot_password')?>" method="post">
        </br>
        </br>
            <h3 class="font-green">Esqueceu a senha ?</h3>
            <p> Digite seu e-mail para redefinir sua senha. </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Voltar</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright"> 2017 © IKing. Digital Influecers. </div>
    <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script type='text/javascript'>var base_url = {url: "<?= base_url() ?>"};</script>
    <script src="<?= base_url("assets/global/plugins/jquery.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/bootstrap/js/bootstrap.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/js.cookie.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/jquery.blockui.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/uniform/jquery.uniform.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") ?>" type="text/javascript"></script>


    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?= base_url("assets/global/plugins/jquery-validation/js/jquery.validate.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/jquery-validation/js/additional-methods.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("assets/global/plugins/select2/js/select2.full.min.js") ?>" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?= base_url("assets/global/scripts/app.min.js") ?>" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?= base_url("assets/pages/scripts/login.min.js") ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>