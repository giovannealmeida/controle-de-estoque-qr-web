<?php

class Equipe_controller extends CI_Controller {

    private $user_info;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function loja() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $data = $this->user_info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('fantasy_name', 'Nome Fantasia', 'required');
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == true) {
                $insert = $this->Team_model->insert_store($this->input->post());
                if ($insert) {
                    $this->session->set_flashdata('success', 'Loja cadastrada com sucesso!');
                    redirect('Equipe_controller/loja');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                    redirect('Equipe_controller/loja');
                }
            }
        }
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione uma cidade');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_loja");
        $this->load->view("_inc/footer");
    }

    public function vendedor() {
        $data = $this->user_info;
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_vendedor");
        $this->load->view("_inc/footer");
    }

    public function administrador() {
        $data = $this->user_info;
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_administrador");
        $this->load->view("_inc/footer");
    }

}
