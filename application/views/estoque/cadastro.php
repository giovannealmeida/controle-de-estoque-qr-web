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
                    <a href="index.html">Estoque</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span><?= isset($product->id) ? 'Edição' : 'Cadastro' ?></span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> <?= isset($product->id) ? 'Edição de Produto' : 'Cadastro de Produto' ?>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_2" data-toggle="tab" aria-expanded="true"> <?= isset($product->id) ? 'Edição' : 'Cadastro' ?> </a>
                        </li>
                        <li>
                            <a href="#tab_3" data-toggle="tab"> Último cadastrado </a>
                        </li>
                    </ul>


                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Formulário de <?= isset($product->id) ? 'edição' : 'cadastro' ?></div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="<?= isset($product->id) ? base_url('Estoque/editar?id=') . $product->id : base_url('Estoque/cadastro') ?>" class="form-horizontal" method="post" data-toggle ="validator">

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
                                                        <label class="control-label col-md-3">Nome do Produto</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="product_name" class="form-control" placeholder="ex: Colar de prata com pedra" required="required" value="<?= isset($product->product_name) ? $product->product_name : '' ?> ">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Categoria</label>
                                                        <div class="col-md-9">
                                                            <select name="category" class="form-control selectpicker" data-live-search ="true">
                                                                <?php foreach ($category as $value): ?>
                                                                    <option value="<?= $value->id ?>" <?= isset($product->category) && $product->category == $value->id ? 'selected' : '' ?>><?= $value->description ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
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
                                                        <label class="control-label col-md-3">Descrição</label>
                                                        <div class="col-md-9">
                                                            <input name="description" type="text" class="form-control" placeholder="ex: corrente entrelaçada com pedra indiana" required="required" value="<?= isset($product->description) ? $product->description : '' ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Valor Atacado</label>
                                                        <div class="col-md-3">
                                                            <input name="wholesale_value" type="text" class="form-control money" placeholder="ex: 5,00" required="required" value="<?= isset($product->wholesale_value) ? $product->wholesale_value : '' ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <label class="control-label col-md-3">Valor Varejo</label>
                                                        <div class="col-md-3">
                                                            <input name="retail_value" type="text" class="form-control money" placeholder="ex: 5,00" required="required" value="<?= isset($product->retail_value) ? $product->retail_value : '' ?>">
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
                                                        <label class="control-label col-md-3">Peso</label>
                                                        <div class="col-md-6">
                                                            <input name="weight" type="number" class="form-control" placeholder="ex: 200g" value="<?= isset($product->weight) ? $product->weight : '' ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quantidade em estoque</label>
                                                        <div class="col-md-6">
                                                            <input name="quantity_in_stock" type="number" class="form-control" placeholder="ex: 200" required="required" value="<?= isset($product->quantity_in_stock) ? $product->quantity_in_stock : '' ?>">
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
                                                            <button type="submit" class="btn green">Salvar</button>
                                                            <button type="button" class="btn default">Cancelar</button>
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
                        <!-- SEGUNDA ABA: VISUALIZAÇÃO -->
                        <div class="tab-pane" id="tab_3">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Último Produto Cadastrado</div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <h2 class="margin-bottom-20"> Detalhes do produto </h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nome do Produto</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->product_name) ? $last->product_name : '' ?> </p> <!-- Entrar com informações do banco -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Categoria:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->category) ? $last->category : '' ?> </p> <!-- Entrar com informações do banco -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Descrição:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->description) ? $last->description : '' ?> </p> <!-- Entrar com informações do banco -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Valor de atacado:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->wholesale_value) ? $last->wholesale_value : '' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quantidade:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->quantity_in_stock) ? $last->quantity_in_stock : '' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Valor de varejo:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?= isset($last->retail_value) ? $last->retail_value : '' ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a type="button" href="<?= isset($last->id) ? base_url('Estoque/editar?id=' . $last->id) : '#' ?>" class="btn green">
                                                                <i class="fa fa-pencil"></i> Editar</a>
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
<!-- END PAGE LEVEL SCRIPTS -->