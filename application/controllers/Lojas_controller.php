<?php

class Lojas_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        
    }

    public function cadastro() {
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("loja_cadastro_estoque");
        $this->load->view("_inc/footer");
    }

}
