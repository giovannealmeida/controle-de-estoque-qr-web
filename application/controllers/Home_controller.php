<?php

class Home_controller extends CI_Controller {

    private $user_info;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function index() {

        $data = $this->user_info;
        //print_r($data);die;
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("dashboard");
        $this->load->view("_inc/footer");
    }

}
