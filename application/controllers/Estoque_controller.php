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

        $data = $this->user_info;
        //print_r($data);die;
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
