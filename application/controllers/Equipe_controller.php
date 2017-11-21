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
      $this->load->view("_inc/header");
      $this->load->view("_inc/menu");
      $this->load->view("cadastro_loja");
      $this->load->view("_inc/footer");
    }

}
