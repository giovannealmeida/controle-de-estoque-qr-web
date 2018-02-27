<!--HEADER COMPLEMENTAR-->
<title>Administradores</title>
<!--PAGE LEVELS PLUGINS-->
<link href="<?= base_url('/assets/global/plugins/datatables/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" />
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
                    <a href="#">Cliente</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Editar clientes</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title"> Editar informações
            <small>de clientes cadastrados</small>
        </h3>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Informações de Cadastro </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?= base_url('Clientes/editar?id=' . $client->id) ?>" class="horizontal-form" method="post" data-toggle ="validator">
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
                            <div class="form-body">
                                <h3 class="form-section">Informações</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nome</label>
                                            <?= form_input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'ex: Tiago Silva', 'required' => 'required', 'value' => $client->name), set_value('name')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">E-mail</label>
                                            <?= form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'ex: contato@....', 'value' => $client->email), set_value('email')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Gênero</label>
                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'data-width' => "100%", 'required' => "true", 'name' => "gender_id", 'id' => "gender_id"), $genders, $client->gender_id, set_value('gender_id')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Telefone</label>
                                            <?= form_input(array('name' => 'phone', 'class' => 'form-control phone', 'required' => 'required', 'value' => $client->phone), set_value('phone')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <!--/row-->

                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Estado</label>
                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'required' => "true", 'id' => "selectState",), $states, $state_selected, set_value('selectState')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Cidade</label>
                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'data-width' => "100%", 'required' => "true", 'name' => "city_id", 'id' => "selectCity",), $cities, $user_profile->city_id, set_value('city_id')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">CPF</label>
                                            <?= form_input(array('name' => 'cpf', 'class' => 'form-control cpf', 'placeholder' => 'ex: 200122521893', 'required' => 'required', 'value' => $user_profile->cpf), set_value('cpf')); ?>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <div class="form-actions right">
                                <button type="button" class="btn default">Cancelar</button>
                                <button type="submit" class="btn blue">
                                    <i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE PLUGINS -->
<!-- <script src="<?= base_url('/assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script> -->
<script src="<?= base_url("assets/js/validator.js") ?>"  type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js") ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"  type="text/javascript"></script>
<script src="<?= base_url('assets/js/mask.js') ?>"  type="text/javascript"></script>
<script src="<?= base_url('/assets/global/scripts/datatable.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/global/plugins/datatables/datatables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/assets/pages/scripts/table-datatables-buttons.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js") ?>" type="text/javascript"></script>
<script src="<?= base_url("assets/pages/scripts/components-bootstrap-select.min.js") ?>"  type="text/javascript"></script>

<!-- END CONTAINER -->
<!-- END THEME LAYOUT SCRIPTS -->
