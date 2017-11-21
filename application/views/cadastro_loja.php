<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url("assets/global/plugins/datatables/datatables.min.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css") ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url("assets/global/plugins/fancybox/source/jquery.fancybox.css") ?>" rel="stylesheet" type="text/css" />

<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Cadastro de Equipe</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span></span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title">
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
                                                <form action="#" class="form-horizontal" method="post" data-toggle ="">
                                                    <div class="form-body">
                                                        <h3 class="form-section">Informações Básicas</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nome do Produto</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="product_name" class="form-control" placeholder="ex: Colar de prata com pedra" required="required" value="">
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Categoria</label>
                                                                    <div class="col-md-9">
                                                                        <select name="category" class="form-control">
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
                                                                      <input name="description" type="text" class="form-control" placeholder="ex: corrente entrelaçada com pedra indiana" required="required" value="">
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Valor Atacado</label>
                                                                    <div class="col-md-3">
                                                                      <input name="wholesale_value" type="text" class="form-control money" placeholder="ex: 5,00" required="required" value="">
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                    <label class="control-label col-md-3">Valor Varejo</label>
                                                                    <div class="col-md-3">
                                                                      <input name="retail_value" type="text" class="form-control money" placeholder="ex: 5,00" required="required" value="">
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
                                                                    <label class="control-label col-md-3">Quantidade em estoque</label>
                                                                    <div class="col-md-6">
                                                                      <input name="quantity_in_stock" type="number" class="form-control" placeholder="ex: 200" required="required" value="">
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
                                                                        <button type="submit" class="btn green"> Enviar </button>
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
<!-- END PAGE LEVEL SCRIPTS -->
