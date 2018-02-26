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
                                              <form action="#" class="horizontal-form">
                                                  <div class="form-body">
                                                      <h3 class="form-section">Informações</h3>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Nome</label>
                                                                  <input type="text" id="firstName" class="form-control" placeholder="Chee Kin">
                                                                  <span class="help-block"> This is inline help </span>
                                                              </div>
                                                          </div>
                                                          <!--/span-->
                                                          <div class="col-md-6">
                                                              <div class="form-group has-error">
                                                                  <label class="control-label">E-mail</label>
                                                                  <input type="text" id="lastName" class="form-control" placeholder="Lim">
                                                                  <span class="help-block"> This field has error. </span>
                                                              </div>
                                                          </div>
                                                          <!--/span-->
                                                      </div>
                                                      <!--/row-->
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Gênero</label>
                                                                  <select class="form-control">
                                                                      <option value="">Masculino</option>
                                                                      <option value="">Feminino</option>
                                                                      <option value="">Outros</option>
                                                                  </select>
                                                                  <span class="help-block"> Select your gender </span>
                                                              </div>
                                                          </div>
                                                          <!--/span-->
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Telefone</label>
                                                                  <input type="text" class="form-control" placeholder="(73)XXXXX-XXXX"> </div>
                                                          </div>
                                                          <!--/span-->
                                                      </div>
                                                      <!--/row-->

                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                  <label class="control-label">Cidade</label>
                                                                  <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="Category 1">Category 1</option>
                                                                      <option value="Category 2">Category 2</option>
                                                                      <option value="Category 3">Category 5</option>
                                                                      <option value="Category 4">Category 4</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <!--/span-->
                                                          <div class="col-md-6">
                                                              <div class="form-group">
                                                                <label class="control-label">Estado</label>
                                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    <option value="Category 1">Category 1</option>
                                                                    <option value="Category 2">Category 2</option>
                                                                    <option value="Category 3">Category 5</option>
                                                                    <option value="Category 4">Category 4</option>
                                                                </select>
                                                              </div>
                                                          </div>
                                                          <!--/span-->
                                                      </div>
                                                      <!--/row-->
                                                      <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group has-error">
                                                                <label class="control-label">CPF</label>
                                                                <input type="text" id="lastName" class="form-control" placeholder="CPF">
                                                                <span class="help-block"> This field has error. </span>
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
