<?php

class Lojas extends CI_Controller {

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
        $this->load->model('Team_model');
        $this->load->model('Stock_model');
        $this->load->model('Store_model');
        if ($this->input->post()) {
            $this->form_validation->set_rules('store_id', 'Loja', 'required');
            $this->form_validation->set_rules('product_id', 'Produto', 'required');
            $this->form_validation->set_rules('amount', 'Quantidade', 'required|callback_amount_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_amount', '');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $exist = $this->Store_model->check_association($this->input->post('product_id'), $this->input->post('store_id'));
                if ($exist) {
                    $this->session->set_flashdata('fail', 'O produto já foi encaminhado para loja, para alterar a quantidade ou o valor utilize o botão editar na aba controle de estoque/visualizar estoque');
                } else {
                    $product = $this->Stock_model->get_product_by_id($this->input->post('product_id'));
                    $update = array('quantity_in_stock' => $product->quantity_in_stock - $this->input->post('amount'));
                    $this->Stock_model->update_product($update, $this->input->post('product_id'));
                    $insert_data['store_id'] = $this->input->post('store_id');
                    $insert_data['product_id'] = $this->input->post('product_id');
                    $insert_data['amount'] = $this->input->post('amount');
                    $insert_data['retail_value'] = $this->input->post('retail_value');
                    $insert_data['wholesale_value'] = $this->input->post('wholesale_value');
                    date_default_timezone_set('America/Sao_Paulo');
                    $date = date('Y-m-d H:i');
                    $insert_data['date_send'] = $date;
                    $insert = $this->Store_model->insert($insert_data);
                    if ($insert) {
                        $this->session->set_flashdata('success', 'Produtos enviados com sucesso!');
                    } else {
                        $this->session->set_flashdata('fail', 'Não foi possível enviar');
                    }
                }
                redirect('Lojas');
            }
        }
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['products_info'] = json_encode($this->Stock_model->get_products_info());
        $data['products'] = $this->Stock_model->get_products_select();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("lojas/cadastro_estoque");
        $this->load->view("_inc/footer");
    }

    public function editar() {
        $this->load->library('form_validation');
        $data = $this->user_info;
        $this->load->model('Team_model');
        $this->load->model('Stock_model');
        $this->load->model('Store_model');
        $data['store_stock'] = $this->Store_model->get_association_by_id($this->input->get_post('id'));
        if ($this->input->post()) {
            $this->form_validation->set_rules('amount', 'Quantidade', 'required|callback_amount_check');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_message('valid_amount', '');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $update_data['amount'] = $this->input->post('amount');
                $update_data['retail_value'] = $this->input->post('retail_value');
                $update_data['wholesale_value'] = $this->input->post('wholesale_value');
                $update = $this->Store_model->update($update_data, $this->input->get_post('id'));
                if ($update) {
                    $product = $this->Stock_model->get_product_by_id($data['store_stock']->product_id);
                    $update = array('quantity_in_stock' => ($data['store_stock']->amount - $update_data['amount']) + $product->quantity_in_stock);
                    $this->Stock_model->update_product($update, $product->id);
                    $this->session->set_flashdata('success', 'Estoque da loja atualizado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível atualizar o estoque da  loja');
                }
                redirect('Lojas');
            }
        }
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['products'] = $this->Stock_model->get_products_select();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("lojas/cadastro_estoque");
        $this->load->view("_inc/footer");
    }

    public function index() {
        $this->load->model('Store_model');
        $data['records'] = $this->Store_model->get_all();
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("lojas/visualizar_estoque", $data);
        $this->load->view("_inc/footer");
    }

    public function translado() {
        $this->load->library('form_validation');
        $data = $this->user_info;
        $this->load->model('Stock_model');
        $this->load->model('Team_model');
        $this->load->model('Store_model');

        if ($this->input->post()) {
            $this->form_validation->set_rules('home_store_id', 'Loja de origem', 'required');
            $this->form_validation->set_rules('destination_store_id', 'Loja de destino', 'required');
            $this->form_validation->set_rules('product_id', 'Produto', 'required');
            $this->form_validation->set_rules('amount', 'Quantidade', 'required|callback_amount_check');
            $this->form_validation->set_rules('retail_value', 'Valor Varejo', 'required');
            $this->form_validation->set_rules('wholesale_value', 'Valor Atacado', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_amount', '');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $exist = $this->Store_model->check_association($this->input->post('product_id'), $this->input->post('destination_store_id'));
                if ($exist) {
                    $store_stock = $this->Store_model->get_association($this->input->post('home_store_id'), $this->input->post('product_id'));
                    $update = array('amount' => $store_stock->amount - $this->input->post('amount'));
                    $this->Store_model->update($update, $store_stock->id);
                    $store_stock = $this->Store_model->get_association($this->input->post('destination_store_id'), $this->input->post('product_id'));
                    $update = array('amount' => $this->input->post('amount') + $store_stock->amount, 'retail_value' => $this->input->post('retail_value'), 'wholesale_value' => $this->input->post('wholesale_value'));
                    $update = $this->Store_model->update($update, $store_stock->id);
                    if ($update) {
                        $this->session->set_flashdata('success', 'Produtos enviados com sucesso!');
                    } else {
                        $this->session->set_flashdata('fail', 'Não foi possível enviar');
                    }
                } else {
                    $store_stock = $this->Store_model->get_association($this->input->post('home_store_id'), $this->input->post('product_id'));
                    $update = array('amount' => $store_stock->amount - $this->input->post('amount'));
                    $this->Store_model->update($update, $store_stock->id);
                    $insert_data['store_id'] = $this->input->post('destination_store_id');
                    $insert_data['product_id'] = $this->input->post('product_id');
                    $insert_data['amount'] = $this->input->post('amount');
                    $insert_data['retail_value'] = $this->input->post('retail_value');
                    $insert_data['wholesale_value'] = $this->input->post('wholesale_value');
                    date_default_timezone_set('America/Sao_Paulo');
                    $date = date('Y-m-d H:i');
                    $insert_data['date_send'] = $date;
                    $insert = $this->Store_model->insert($insert_data);
                    if ($insert) {
                        $this->session->set_flashdata('success', 'Produtos enviados com sucesso!');
                    } else {
                        $this->session->set_flashdata('fail', 'Não foi possível enviar');
                    }
                }
                redirect('Lojas');
            }
        }

        $stores = array('' => 'Selecione a loja');
        if ($this->Team_model->get_stores_select() != null)
            $data['stores'] = $stores + $this->Team_model->get_stores_select();
        else
            $data['stores'] = $stores;
        $data['products'] = array('' => 'Selecione a loja de origem');
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("lojas/translado", $data);
        $this->load->view("_inc/footer");
    }

    public function excluir() {
        $this->load->model('Store_model');
        $this->load->model('Stock_model');
        $id = $this->input->get_post('id');
        $association = $this->Store_model->get_association_by_id($id);
        $product = $this->Stock_model->get_product_by_id($association->product_id);
        $update = array('quantity_in_stock' => $association->amount + $product->quantity_in_stock);
        $delete = $this->Store_model->delete($id);
        if ($delete) {
            $update = $this->Stock_model->update_product($update, $association->product_id);
            $this->session->set_flashdata('success', 'Produto removido com sucesso!');
        } else {
            $this->session->set_flashdata('fail', 'Não foi possível remover');
        }
        redirect('Lojas');
    }

    public function amount_check($str) {
        $this->load->model('Stock_model');
        if ($this->input->post('home_store_id')) {
            $store_stock = $this->Store_model->get_association($this->input->post('home_store_id'), $this->input->post('product_id'))->amount;
            if ($store_stock < $str) {
                $this->form_validation->set_message('amount_check', 'Não há quantidade suficiente no estoque da loja');
                return false;
            }
            return true;
        } elseif ($this->input->post('product_id', TRUE) != FALSE) {
            $product_id = $this->input->post('product_id');
            $product = $this->Stock_model->get_product_by_id($product_id);
            if ($product->quantity_in_stock < $str) {
                $this->form_validation->set_message('amount_check', 'Não há quantidade suficiente em estoque');

                return false;
            }
            return true;
        } else {
            $product_id = $this->Store_model->get_association_by_id($this->input->get_post('id'))->product_id;
            $product = $this->Stock_model->get_product_by_id($product_id);
            $store_stock = $this->Store_model->get_association_by_id($this->input->get_post('id'))->amount;
            $var = $str - $store_stock;
            if ($var > 0) {
                if ($product->quantity_in_stock < $var) {
                    $this->form_validation->set_message('amount_check', 'Não há quantidade suficiente em estoque');

                    return false;
                }
            }
            return true;
        }
    }

}
