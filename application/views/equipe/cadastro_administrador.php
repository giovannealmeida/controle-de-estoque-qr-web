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
                    <a href="#">Equipe</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Administradores</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Preeencha as informações
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
                                        <i class="fa fa-gift"></i>Formulário de <?= isset($administrator) ? 'Edição' : 'Cadastro' ?></div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?= isset($administrator) ? base_url('Equipe/editar_administrador?id=' . $administrator->id) : base_url('Equipe/administradores') ?>" class="form-horizontal" method="post" data-toggle ="validator">
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
                                            <h3 class="form-section">Informações Básicas</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nome Completo</label>
                                                        <div class="col-md-9">
                                                            <?= form_input(array('class' => 'form-control', 'placeholder' => 'ex: Tiago Silva', 'required' => 'required', 'name' => 'name', 'value' => isset($administrator) ? $administrator->name : set_value('name'))); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CPF</label>
                                                        <div class="col-md-9">
                                                            <?= form_input(array('class' => 'form-control cpf', 'placeholder' => 'ex: 200122521893', 'required' => 'required', 'name' => 'cpf', 'value' => isset($administrator) ? $administrator->cpf : set_value('cpf'))); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">E-mail</label>
                                                        <div class="col-md-9">
                                                            <?= form_input(array('name' => 'email', 'class' => 'form-control', 'id' => 'email', 'type' => 'email', 'placeholder' => 'ex: contato@....', 'required' => 'required', 'value' => isset($administrator) ? $administrator->email : set_value('email'))); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Senha</label>
                                                        <div class="col-md-9">
                                                            <?php if (isset($administrator)): ?>
                                                                <?= form_password(array("name" => "password", "class" => "form-control", "placeholder" => "Digite uma senha para o primeiro acesso")); ?>
                                                            <?php else: ?>
                                                                <?= form_password(array("name" => "password", "class" => "form-control", "placeholder" => "Digite uma senha para o primeiro acesso", "required" => "required")); ?>
                                                            <?php endif; ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Estado</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'required' => "true", 'id' => "selectState",), $states, isset($administrator) ? $state_selected : set_value('selectState')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Cidade</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'data-width' => "100%", 'required' => "true", 'name' => "city_id", 'id' => "selectCity",), $cities, isset($administrator) ? $administrator->city_id : set_value('city_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Data de nascimento</label>
                                                        <div class="col-md-9">
                                                            <?= form_input(array('name' => 'birthday', 'class' => 'form-control', 'id' => 'birthday', 'type' => 'date', 'required' => 'true', 'value' => isset($administrator) ? $administrator->birthday : set_value('birthday'))); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gênero</label>
                                                        <div class="col-md-9">
                                                            <?php echo form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'data-width' => "100%", 'required' => "true", 'name' => "gender_id", 'id' => "gender_id"), $genders, isset($administrator) ? $administrator->gender_id : set_value('gender_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green"> Salvar </button>
                                                            <!--<button type="button" class="btn default">Cancelar</button>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Lista de Administradores</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        CPF
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Cidade
                                    </th>
                                    <th>
                                        Nascimento
                                    </th>
                                    <th>
                                        Gênero
                                    </th>                                    
                                    <th>
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <?php if (count($administrators) > 0): ?>
                                <?php foreach ($administrators as $value): ?>
                                    <tr>
                                        <td> <?= $value->name ?> </td>
                                        <td> <?= $value->cpf ?> </td>
                                        <td> <?= $value->email ?> </td>
                                        <td> <?= $value->state ?> </td>
                                        <td> <?= $value->city ?> </td>
                                        <td> <?php
                                            $date = date_create($value->birthday);
                                            echo date_format($date, "d/m/Y");
                                            ?> 
                                        </td>
                                        <td> <?= $value->gender ?> </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <a type="button" href="<?= base_url('Equipe/editar_administrador?id=' . $value->id) ?>" class="btn green">
                                                    <i class="fa fa-pencil"></i> Editar</a>
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o administrador e todo o seu histórico?')" href="<?= base_url('Equipe/excluir_administrador?id=' . $value->id) ?>"><span class="glyphicon glyphicon-remove"></span> Remover</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
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
