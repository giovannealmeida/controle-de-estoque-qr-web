<?php

class Inicio extends CI_Controller {

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
        $this->load->model('Stock_model');
        $this->load->model('Client_model');
        $this->load->model('Sales_model');
        $data = $this->user_info;
        $data['clients'] = $this->Client_model->all();
        $data['total_sales'] = $this->Sales_model->get_total_sales();
        $data['total_sales_wholesale'] = $this->Sales_model->get_total_sales(1);
        $data['total_sales_retail'] = $this->Sales_model->get_total_sales(2);
        $data['stock'] = $this->Stock_model->get_products();
        $data['top_salesman'] = $this->Sales_model->get_top_salesman();
        $data['top_stores'] = $this->Sales_model->get_top_stores();
        $data['top_sales'] = $this->Sales_model->get_top_sales();
        $data['statistics_wholesale'] = $this->Sales_model->get_statistics(1);
        $data['statistics_retail'] = $this->Sales_model->get_statistics(2);
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("dashboard");
        $this->load->view("_inc/footer");
    }

}
