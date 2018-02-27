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
                    <a href="#">Lojas</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Preencha as informações
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
                                        <i class="fa fa-gift"></i>Formulário de Cadastro</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?= base_url('Equipe/lojas') ?>" class="form-horizontal" method="post" data-toggle ="validator">
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
                                                        <label class="control-label col-md-3">Nome Fantasia</label>
                                                        <div class="col-md-9">
                                                            <?= form_input('fantasy_name', set_value('fantasy_name'), array('class' => 'form-control', 'placeholder' => 'ex: Site RootSilver', 'required' => 'required')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">CNPJ</label>
                                                        <div class="col-md-9">
                                                            <?= form_input('cnpj', set_value('cnpj'), array('class' => 'form-control cnpj', 'placeholder' => 'ex: 200122521/2150-3', 'required' => 'required')); ?>
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
                                                            <?= form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'required' => "true", 'id' => "selectState",), $states, set_value('city_id')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Cidade</label>
                                                        <div class="col-md-9">
                                                            <?= form_dropdown(array('class' => "form-control selectpicker", 'data-live-search' => "true", 'data-width' => "100%", 'required' => "true", 'name' => "city_id", 'id' => "selectCity",), $cities, set_value('selectCity')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <h3 class="form-section">Informações de Contato</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Telefone</label>
                                                        <div class="col-md-9">
                                                            <?= form_input('phone', set_value('phone'), array('class' => 'form-control phone', 'placeholder' => 'ex: (0XX) XXXX-XXXX')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">E-mail</label>
                                                        <div class="col-md-9">
                                                            <?= form_input(array('name' => 'email', 'class' => 'form-control', 'id' => 'email', 'type' => 'email', 'placeholder' => 'ex: contato@....'), set_value('email')); ?>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->

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
                            <span class="caption-subject bold uppercase">Lista de Lojas Cadastradas</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover sample_1">
                            <thead>
                                <tr>
                                    <th>
                                        Nome Fantasia
                                    </th>
                                    <th>
                                        CNPJ
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Cidade
                                    </th>
                                    <th>
                                        Telefone
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <?php if (count($stores) > 0): ?>
                                <?php foreach ($stores as $value): ?>
                                    <tr>
                                        <td> <?= $value->fantasy_name ?> </td>
                                        <td> <?= $value->cnpj ?> </td>
                                        <td> <?= $value->state ?> </td>
                                        <td> <?= $value->city ?> </td>
                                        <td> <?= $value->phone ?> </td>
                                        <td> <?= $value->email ?> </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <a type="button" href="<?= base_url('Clientes_controller/editar?id=' . $value->id) ?>" class="btn green">
                                                    <i class="fa fa-pencil"></i> Editar</a>
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir a Loja e todo o seu histórico? Os produtos do estoque da loja irão voltar para o estoque geral')" href="<?= base_url('Equipe/excluir_loja?id=' . $value->id) ?>"><span class="glyphicon glyphicon-remove"></span> Remover</a>
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
