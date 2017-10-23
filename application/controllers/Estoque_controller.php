<?php

class Estoque_controller extends CI_Controller {

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
        $data = $this->user_info;
        $this->load->model('Stock_model');
        $data['category'] = $this->Stock_model->get_category();
        $data['last'] = $this->Stock_model->get_last_product_record();
        if($this->input->post()){
            $this->form_validation->set_rules('product_name', 'Nome do produto', 'required');
            $this->form_validation->set_rules('category', 'Categoria', 'required');
            $this->form_validation->set_rules('description', 'Descrição', 'required');
            $this->form_validation->set_rules('wholesale_value', 'Valor atacado', 'required');
            $this->form_validation->set_rules('retail_value', 'Valor Varejo', 'required');
            $this->form_validation->set_rules('quantity_in_stock', 'Quantidade em estoque', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == true) {
                $insert = $this->Stock_model->insert_product($this->input->post());
                if($insert){
                    $this->session->set_flashdata('success', 'Produto cadastrado com sucesso!');
                }else{
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                }
            }
        }
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_produto");
        $this->load->view("_inc/footer");
    }

    public function visualizar() {

        $data = $this->user_info;
        //print_r($data);die;
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("visualizar_produto");
        $this->load->view("_inc/footer");
    }

}
