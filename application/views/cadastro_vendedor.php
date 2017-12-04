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
                                <a href="index.html">Cadastro de Loja</a>
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
                                                <form action="#" class="form-horizontal" method="post" data-toggle ="">
                                                    <div class="form-body">
                                                        <h3 class="form-section">Informações Básicas</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nome Completo</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="vendedor_name" class="form-control" placeholder="ex: Tiago Silva" required="required" value="">
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">CPF</label>
                                                                    <div class="col-md-9">
                                                                      <input type="text" name="vendedor_cpf" class="form-control" placeholder="ex: 200122521893" required="required" value="">
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
                                                                        <input type="text" name="vendedor_email" class="form-control" placeholder="ex: Tiago Silva" required="" value="">
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Senha</label>
                                                                    <div class="col-md-9">
                                                                      <input type="text" name="vendedor_password" class="form-control" placeholder="Digite uma senha para o primeiro acesso" required="required" value="">
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
                                                                    <label class="control-label col-md-3">Cidade</label>
                                                                    <div class="col-md-9">
                                                                      <select name="category" class="form-control">
                                                                      </select>
                                                                      <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Estado</label>
                                                                    <div class="col-md-9">
                                                                      <select name="category" class="form-control">
                                                                      </select>
                                                                      <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                      <h3 class="form-section">Informações para Venda</h3>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Loja vinculada</label>
                                                                <div class="col-md-9">
                                                                  <select name="loja_vinculada" class="form-control">
                                                                  </select>
                                                                  <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                          </div>
                                                          <!--/span-->
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Tipo de Venda</label> <!-- Atacado,Varejo, Ambos-->
                                                                <div class="col-md-9">
                                                                  <select name="tipo_venda" class="form-control">
                                                                  </select>
                                                                  <div class="help-block with-errors"></div>
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
