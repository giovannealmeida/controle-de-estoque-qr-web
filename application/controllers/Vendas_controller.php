<?php

class Vendas_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function etiquetas() {
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("vendas/gerar_etiquetas");
        $this->load->view("_inc/footer");
    }

    public function venda() {
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("vendas/visualizar_vendas");
        $this->load->view("_inc/footer");
    }

    public function excluir($id){

    }

    public function amount_check($str) {
        $this->load->model('Stock_model');
        $product = $this->Stock_model->get_product_by_id($this->input->post('product_id'));
        if ($product->quantity_in_stock < $str) {
            $this->form_validation->set_message('amount_check', 'Não há quantidade suficiente em estoque');

            return false;
        }

        return true;
    }

}
