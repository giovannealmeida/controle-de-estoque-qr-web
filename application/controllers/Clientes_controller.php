<?php

class Clientes_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function visualizar_clientes() {
        $this->load->model('Client_model');
        $data = $this->user_info;
        $data['clients'] = $this->Client_model->all();
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("clientes/visualizar_clientes", $data);
        $this->load->view("_inc/footer");
    }

    public function excluir() {
        $this->load->model('Client_model');
        $id = $this->input->get_post('id');

        $delete = $this->Client_model->delete($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Cliente excluído com sucesso!');
            redirect('Clientes_controller/visualizar_clientes');
        } else {
            $this->session->set_flashdata('fail', 'Não foi possível excluir');
            redirect('Clientes_controller/visualizar_clientes');
        }
    }

}
