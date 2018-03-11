<?php

class Vendas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function etiquetas() {
        $this->load->library('form_validation');
        $data = $this->user_info;
        $this->load->model('Stock_model');
        $this->load->model('Team_model');
        $this->load->model('Store_model');
        if ($this->input->post()) {
            foreach ($this->input->post('product_id') as $key => $value) {
                $product = $this->Stock_model->get_product_by_id($value);
                for ($i = 0; $i < $this->input->post('amount')[$key]; $i++) {
                    $data['pdf'][] = array('name' => $product->product_name, 'amount' => $this->input->post('amount')[$key], 'value' => $this->input->post('value')[$key], 'code' => $product->code);
                }
            }
            ini_set('max_execution_time', 0);
            ini_set('memory_limit', '-1');
            $this->load->library('mpdf60/mpdf.php');
            ob_start(); // inicia o buffer
            $mpdf = new mPDF('utf-8', 'Letter', 0, '', -1, 0, 9, 0, 0, 0);
            $description = $this->load->view('description', $data, true);
            $mpdf->WriteHTML($description);
            $mpdf->Output();
        }
        $stores = array('' => 'Selecione a loja', '0' => 'Estoque');
        if ($this->Team_model->get_stores_select() != null)
            $data['stores'] = $stores + $this->Team_model->get_stores_select();
        else
            $data['stores'] = $stores;
        $data['products'] = array('' => 'Selecione a loja de origem');
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("vendas/etiquetas", $data);
        $this->load->view("_inc/footer");
    }

    public function index() {
        $data = $this->user_info;
        $this->load->model('Sales_model');
        $data['sales'] = $this->Sales_model->all();
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("vendas/visualizar", $data);
        $this->load->view("_inc/footer");
    }

    public function excluir($id) {
        
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
