<?php

class Lojas_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function cadastro() {
        $this->load->library('form_validation');
        $data = $this->user_info;
        $this->load->model('Team_model');
        $this->load->model('Stock_model');
        $this->load->model('Store_model');
        if ($this->input->post()) {
            $this->form_validation->set_rules('store_id', 'Loja', 'required');
            $this->form_validation->set_rules('product_id', 'Produto', 'required');
            $this->form_validation->set_rules('amount', 'Quantidade', 'required|callback_amount_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_amount', '');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $product = $this->Stock_model->get_product_by_id($this->input->post('product_id'));
                $update = array('quantity_in_stock' => $product->quantity_in_stock - $this->input->post('amount'));
                $this->Stock_model->update_product($update, $this->input->post('product_id'));
                $insert_data['store_id'] = $this->input->post('store_id');
                $insert_data['product_id'] = $this->input->post('product_id');
                $insert_data['amount'] = $this->input->post('amount');
                $insert_data['value'] = $this->input->post('value');
                date_default_timezone_set('America/Sao_Paulo');
                $date = date('Y-m-d H:i');
                $insert_data['date_send'] = $date;
                $insert = $this->Store_model->insert($insert_data);
                if ($insert) {
                    $this->session->set_flashdata('success', 'Produtos enviados com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível enviar');
                }
                redirect('Lojas_controller/cadastro');
            }
        }
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['products'] = $this->Stock_model->get_products_select();
        $data['records'] = $this->Store_model->get_all_last();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("controle_loja/loja_cadastro_estoque");
        $this->load->view("_inc/footer");
    }

    public function visualizar() {
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("controle_loja/loja_visualizar_estoque");
        $this->load->view("_inc/footer");
    }

    public function translado() {
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("controle_loja/loja_translado_estoque");
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
