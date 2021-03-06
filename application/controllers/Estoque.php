<?php

class Estoque extends CI_Controller {

    private $user_info;

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
        $this->load->model('Util_model');
        $data = $this->user_info;
        $this->load->model('Stock_model');
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_name', 'Nome do produto', 'required');
            $this->form_validation->set_rules('category', 'Categoria', 'required');
            $this->form_validation->set_rules('description', 'Descrição', 'required');
            $this->form_validation->set_rules('wholesale_value', 'Valor atacado', 'required');
            $this->form_validation->set_rules('retail_value', 'Valor Varejo', 'required');
            $this->form_validation->set_rules('quantity_in_stock', 'Quantidade em estoque', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == true) {
                $data_insert['code'] = $this->Util_model->generateRandomString(6, '1234567890');
                while ($this->Stock_model->verify_code($data_insert['code']) == true) {
                    $data_insert['code'] = $this->Util_model->generateRandomString(6, '1234567890');
                }
                $params = array('value' => $data_insert['code'],
                    'into' => 1,
                    'filename' => 'assets/qrcode/' . $data_insert['code'] . '.gif',
                    'width_bar' => 73,
                    'height_bar' => 60,
                    'show_codebar' => true);
                $this->load->library('barCodeGenrator', $params);
                $data_insert['product_name'] = $this->input->post('product_name');
                $data_insert['description'] = $this->input->post('description');
                $data_insert['quantity_in_stock'] = $this->input->post('quantity_in_stock');
                $data_insert['category'] = $this->input->post('category');
                $data_insert['wholesale_value'] = $this->input->post('wholesale_value');
                $data_insert['retail_value'] = $this->input->post('retail_value');
                $data_insert['weight'] = $this->input->post('weight');
                $insert = $this->Stock_model->insert_product($data_insert);
                if ($insert) {
                    $this->session->set_flashdata('success', 'Produto cadastrado com sucesso!');
                    redirect('Estoque');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                    redirect('Estoque/cadastro');
                }
            }
        }
        $data['category'] = $this->Stock_model->get_category();
        $data['last'] = $this->Stock_model->get_last_product_record();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("estoque/cadastro");
        $this->load->view("_inc/footer");
    }

    public function index() {

        $data = $this->user_info;
        $this->load->model('Stock_model');
        $data['products'] = $this->Stock_model->get_products();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("estoque/gerenciar");
        $this->load->view("_inc/footer");
    }

    public function editar() {
        $this->load->library('form_validation');
        $this->load->model('Stock_model');
        $data = $this->user_info;
        $id = $this->input->get_post('id');

        if ($this->input->post()) {
            $this->form_validation->set_rules('product_name', 'Nome do produto', 'required');
            $this->form_validation->set_rules('category', 'Categoria', 'required');
            $this->form_validation->set_rules('description', 'Descrição', 'required');
            $this->form_validation->set_rules('wholesale_value', 'Valor atacado', 'required');
            $this->form_validation->set_rules('retail_value', 'Valor Varejo', 'required');
            $this->form_validation->set_rules('quantity_in_stock', 'Quantidade em estoque', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == true) {
                $update = $this->Stock_model->update_product($this->input->post(), $this->input->get_post('id'));
                if ($update) {
                    $this->session->set_flashdata('success', 'Produto atualizado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível atualizar');
                }
                redirect('Estoque');
            }
        }

        $data['product'] = $this->Stock_model->get_product_by_id($id);
        $data['category'] = $this->Stock_model->get_category();
        $data['last'] = $this->Stock_model->get_last_product_record();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("estoque/cadastro");
        $this->load->view("_inc/footer");
    }

    public function excluir() {
        $this->load->model('Stock_model');
        $this->load->model('Store_model');
        $id = $this->input->get_post('id');
        $check_association = $this->Store_model->check_association($id);
        if ($check_association == FALSE) {
            $product = $this->Stock_model->get_product_by_id($id);
            $delete = $this->Stock_model->delete_product($id);
            if ($delete) {
                unlink('assets/qrcode/' . $product->code . '.gif');
                $this->session->set_flashdata('success', 'Produto excluído com sucesso!');
            } else {
                $this->session->set_flashdata('fail', 'Não foi possível excluir');
            }
            redirect('Estoque');
        } else {
            $this->session->set_flashdata('fail', 'O produto está associado ao estoque de uma loja, remova primeiro da loja para poder excluir');
            redirect('Estoque');
        }
    }

}
