<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url("assets/global/plugins/datatables/datatables.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/fancybox/source/jquery.fancybox.css") ?>" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Alterar senha</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Altere sua senha
            <small>abaixo</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Editar conta</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="<?= base_url('Perfil_controller/alterar_senha') ?>" method="post" data-toggle ="validator">
                                        <div class="form-body">
                                            <?php if (validation_errors()): ?>
                                                <br/>
                                                <div class="alert alert-danger">
                                                    <strong>Erros no formulário!</strong><br/>
                                                    <br/>
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php elseif ($this->session->flashdata("success")): ?>
                                                <br/>
                                                <div class="alert alert-success">
                                                    <strong><?= $this->session->flashdata("success"); ?></strong><br/>
                                                </div>
                                            <?php elseif ($this->session->flashdata("fail")): ?>
                                                <br/>
                                                <div class="alert alert-danger">
                                                    <strong><?= $this->session->flashdata("fail"); ?></strong><br/>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Senha Atual', 'oldPassword'); ?>
                                                        <span class="required">*</span>
                                                        <?php if ($user_profile->password == NULL): ?>
                                                            <?php $config = array("name" => "oldPassword", "id" => "oldPassword", 'class' => 'form-control', 'placeholder' => "Senha Atual", 'disabled' => 'true'); ?>
                                                        <?php else: ?>
                                                            <?php $config = array("name" => "oldPassword", "id" => "oldPassword", 'class' => 'form-control', 'placeholder' => "Senha Atual", "Senha", "required" => "true", "data-minlength" => "6", "maxlength" => "22"); ?>
                                                        <?php endif; ?>
                                                        <?php echo form_password($config); ?>
                                                        <div class="help-block">A senha deve ter entre 6 a 22 caracteres</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Nova Senha', 'password'); ?>
                                                        <span class="required">*</span>
                                                        <?php echo form_password(array("name" => "password", "id" => "password", 'class' => 'form-control', 'placeholder' => "Senha", "required" => "true", "data-minlength" => "6", "maxlength" => "22")); ?>
                                                        <div class="help-block">A senha deve ter entre 6 a 22 caracteres</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Confirmar Nova Senha', 'ConfirmPassword'); ?>
                                                        <span class="required">*</span>
                                                        <?php echo form_password(array("name" => "ConfirmPassword", "id" => "ConfirmPassword", 'class' => 'form-control', 'placeholder' => "Confirme a senha", "required" => "true", "data-match" => "#password", "data-match-error" => "As senhas não conferem")); ?>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green" onclick="return confirm('Confirma a atualização?')"> Enviar </button>
                                                            <button type="button" class="btn default">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url("assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js") ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url("assets/js/validator.js") ?>"  type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"  type="text/javascript"></script>
<script src="<?= base_url('assets/js/mask.js') ?>"  type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/scripts/components-bootstrap-select.min.js") ?>"  type="text/javascript"></script>
<script src="<?= base_url('assets/js/changeCity.js') ?>"  type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
