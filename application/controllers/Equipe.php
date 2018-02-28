<?php

class Equipe extends CI_Controller {

    private $user_info;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function lojas() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $this->load->model('Store_model');
        $data = $this->user_info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('fantasy_name', 'Nome Fantasia', 'required');
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|callback_validar_cnpj|callback_cnpj_check');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check_store');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $insert = $this->Team_model->insert_store($this->input->post());
                if ($insert) {
                    $this->session->set_flashdata('success', 'Loja cadastrada com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                }
                redirect('Equipe/lojas');
            }
        }
        $data['stores'] = $this->Store_model->get_all_stores();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_loja");
        $this->load->view("_inc/footer");
    }

    public function vendedores() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $this->load->model('User_model');
        $data = $this->user_info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum|callback_cpf_check');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('password', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('birthday', 'Data de nascimento', 'required');
            $this->form_validation->set_rules('gender_id', 'Gênero', 'required');
            $this->form_validation->set_rules('store_id', 'Loja vinculada', 'required');
            $this->form_validation->set_rules('sale_id', 'Tipo de venda', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $insert_user['name'] = $this->input->post('name');
                $insert_user['cpf'] = $this->input->post('cpf');
                $insert_user['email'] = $this->input->post('email');
                $insert_user['city_id'] = $this->input->post('city_id');
                $insert_user['birthday'] = $this->input->post('birthday');
                $insert_user['gender_id'] = $this->input->post('gender_id');
                $insert_user['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $insert_user['level_id'] = 2;
                $insert = $this->User_model->insert($insert_user, $this->input->post('password'));
                if ($insert != NULL) {
                    $insert_user_store['user_id'] = $insert['userData']->id;
                    $insert_user_store['store_id'] = $this->input->post('store_id');
                    $insert_user_store['type_sale_id'] = $this->input->post('sale_id');
                    $this->Team_model->insert_user_store($insert_user_store);
                    $this->session->set_flashdata('success', 'Vendedor cadastrado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                }
                redirect('Equipe/vendedores');
            }
        }
        $data['sellers'] = $this->User_model->get_all_sellers();
        $data['genders'] = $this->User_model->get_all_genders();
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['type_sales'] = $this->Team_model->get_all_type_sale();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_vendedor");
        $this->load->view("_inc/footer");
    }

    public function administradores() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $this->load->model('User_model');
        $data = $this->user_info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum|callback_cpf_check');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('password', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('birthday', 'Data de nascimento', 'required');
            $this->form_validation->set_rules('gender_id', 'Gênero', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $insert_user['name'] = $this->input->post('name');
                $insert_user['cpf'] = $this->input->post('cpf');
                $insert_user['email'] = $this->input->post('email');
                $insert_user['city_id'] = $this->input->post('city_id');
                $insert_user['birthday'] = $this->input->post('birthday');
                $insert_user['gender_id'] = $this->input->post('gender_id');
                $insert_user['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $insert_user['level_id'] = 1;
                $insert = $this->User_model->insert($insert_user, $this->input->post('password'));
                if ($insert != NULL) {
                    $this->session->set_flashdata('success', 'Administrador cadastrado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                }
                redirect('Equipe/administradores');
            }
        }
        $data['administrators'] = $this->User_model->get_all_administrators();
        $data['genders'] = $this->User_model->get_all_genders();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_administrador");
        $this->load->view("_inc/footer");
    }

    public function editar_administrador() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Cities_model');
        $this->load->model('Team_model');
        $this->load->model('User_model');
        $data = $this->user_info;
        $data['administrator'] = $this->User_model->get_by_id($this->input->get_post('id'));
        if ($this->input->post()) {
            if ($data['administrator']->email == $this->input->post('email'))
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            else
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');

            if ($data['administrator']->cpf == $this->input->post('cpf'))
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum');
            else
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum|callback_cpf_check');
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('birthday', 'Data de nascimento', 'required');
            $this->form_validation->set_rules('gender_id', 'Gênero', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $update = array(
                    'name' => $this->input->post('name'),
                    'cpf' => $this->input->post('cpf'),
                    'email' => $this->input->post('email'),
                    'city_id' => $this->input->post('city_id'),
                    'birthday' => $this->input->post('birthday'),
                    'gender_id' => $this->input->post('gender_id'),
                );

                if ($this->input->post('password') != NULL) {
                    $update['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                }

                $update = $this->User_model->update($this->input->get_post('id'), $update);
                if ($update != NULL) {
                    $this->session->set_flashdata('success', 'Administrador atualizado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível atualizar');
                }
                redirect('Equipe/administradores');
            }
        }
        $data['state_selected'] = $this->States_model->get_by_city($data['user_profile']->city_id)->id;
        $data['cities'] = $this->Cities_model->get_by_state_id($data['state_selected']);
        $data['administrators'] = $this->User_model->get_all_administrators();
        $data['genders'] = $this->User_model->get_all_genders();
        $data['states'] = $this->States_model->get_all();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_administrador");
        $this->load->view("_inc/footer");
    }

    public function editar_loja() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $this->load->model('Store_model');
        $this->load->model('Cities_model');
        $data = $this->user_info;
        $data['store'] = $this->Store_model->get_by_id($this->input->get_post('id'));
        if ($this->input->post()) {
            if ($data['store']->email == $this->input->post('email'))
                $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
            else
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check_store');

            if ($data['store']->cnpj == $this->input->post('cnpj'))
                $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|callback_validar_cnpj');
            else
                $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|callback_validar_cnpj|callback_cnpj_check');
            $this->form_validation->set_rules('fantasy_name', 'Nome Fantasia', 'required');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $update = $this->Team_model->update_store($this->input->get_post('id'), $this->input->post());
                if ($update) {
                    $this->session->set_flashdata('success', 'Loja atualizada com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível atualizar');
                }
                redirect('Equipe/lojas');
            }
        }
        $data['state_selected'] = $this->States_model->get_by_city($data['user_profile']->city_id)->id;
        $data['cities'] = $this->Cities_model->get_by_state_id($data['state_selected']);
        $data['stores'] = $this->Store_model->get_all_stores();
        $data['states'] = $this->States_model->get_all();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_loja");
        $this->load->view("_inc/footer");
    }

    public function editar_vendedor() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Team_model');
        $this->load->model('User_model');
        $this->load->model('Cities_model');
        $data = $this->user_info;
        $data['salesman'] = $this->User_model->get_salesman_by_id($this->input->get_post('id'));
        if ($this->input->get_post('id')) {
            if ($data['salesman']->email == $this->input->post('email'))
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            else
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');

            if ($data['salesman']->cpf == $this->input->post('cpf'))
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum');
            else
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum|callback_cpf_check');
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('birthday', 'Data de nascimento', 'required');
            $this->form_validation->set_rules('gender_id', 'Gênero', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $update = array(
                    'name' => $this->input->post('name'),
                    'cpf' => $this->input->post('cpf'),
                    'email' => $this->input->post('email'),
                    'city_id' => $this->input->post('city_id'),
                    'birthday' => $this->input->post('birthday'),
                    'gender_id' => $this->input->post('gender_id'),
                );

                if ($this->input->post('password') != NULL) {
                    $update['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                }

                $this->User_model->update($this->input->get_post('id'), $update);
                $update_store['store_id'] = $this->input->post('store_id');
                $update_store['type_sale_id'] = $this->input->post('sale_id');
                $this->Team_model->update($data['salesman']->user_store_id, $update_store);
                $this->session->set_flashdata('success', 'Vendedor atualizado com sucesso!');
                redirect('Equipe/vendedores');
            }
        }
        $data['state_selected'] = $this->States_model->get_by_city($data['user_profile']->city_id)->id;
        $data['cities'] = $this->Cities_model->get_by_state_id($data['state_selected']);
        $data['sellers'] = $this->User_model->get_all_sellers();
        $data['genders'] = $this->User_model->get_all_genders();
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['type_sales'] = $this->Team_model->get_all_type_sale();
        $data['states'] = $this->States_model->get_all();
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("equipe/cadastro_vendedor");
        $this->load->view("_inc/footer");
    }

    public function email_check($str) {
        $this->load->model('User_model');
        if ($this->User_model->email_exists($str)) {
            $this->form_validation->set_message('email_check', 'O email já foi cadastrado');

            return false;
        }

        return true;
    }

    public function email_check_store($str) {
        $this->load->model('Store_model');
        if ($this->Store_model->email_exists($str)) {
            $this->form_validation->set_message('email_check_store', 'O email já foi cadastrado');

            return false;
        }

        return true;
    }

    public function cpf_check($str) {
        $this->load->model('User_model');
        if ($this->User_model->cpf_exists($str)) {
            $this->form_validation->set_message('cpf_check', 'O CPF já foi cadastrado');

            return false;
        }

        return true;
    }

    public function cnpj_check($str) {
        $this->load->model('Store_model');
        if ($this->Store_model->cnpj_exists($str)) {
            $this->form_validation->set_message('cnpj_check', 'O CNPJ já foi cadastrado');

            return false;
        }

        return true;
    }

    public function cpf_sum($second) {
        $second = str_replace('-', '', str_replace('.', '', $second));
        $this->form_validation->set_message('cpf_sum', 'O <strong>CPF</strong> não é válido.');
        $cpf = str_pad(preg_replace('[^0-9]', '', $second), 11, '0', STR_PAD_LEFT);
        //  print_r($cpf);
        if (strlen($cpf) != 11 ||
                $cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return FALSE;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }

                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
        return FALSE;
    }

    public function excluir_administrador() {
        $this->load->model('User_model');
        $id = $this->input->get_post('id');

        $delete = $this->User_model->delete($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Administrador excluído com sucesso!');
        } else {
            $this->session->set_flashdata('fail', 'Não foi possível excluir');
        }
        redirect('Equipe/administradores');
    }

    public function excluir_vendedor() {
        $this->load->model('User_model');
        $id = $this->input->get_post('id');

        $delete = $this->User_model->delete($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Vendedor excluído com sucesso!');
        } else {
            $this->session->set_flashdata('fail', 'Não foi possível excluir');
        }
        redirect('Equipe/vendedores');
    }

    public function excluir_loja() {
        $this->load->model('Store_model');
        $this->load->model('Stock_model');
        $id = $this->input->get_post('id');
        $associations = $this->Store_model->get_association($id);
        $delete = $this->Store_model->delete_store($id);
        if ($delete) {
            foreach ($associations as $value) {
                $product = $this->Stock_model->get_product_by_id($value->product_id);
                $update = array('quantity_in_stock' => $value->amount + $product->quantity_in_stock);
                $this->Stock_model->update_product($update, $value->product_id);
            }
            $this->session->set_flashdata('success', 'Loja excluída com sucesso!');
        } else {
            $this->session->set_flashdata('fail', 'Não foi possível excluir');
        }
        redirect('Equipe/lojas');
    }

    function validar_cnpj($cnpj) {
        //print_r($cnpj);die;
        $this->form_validation->set_message('validar_cnpj', 'O <strong>CNPJ</strong> não é válido.');
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

}
