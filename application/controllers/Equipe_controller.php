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
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
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
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_equipe/cadastro_loja");
        $this->load->view("_inc/footer");
    }

    public function vendedor() {
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
                    redirect('Equipe_controller/vendedor');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                    redirect('Equipe_controller/vendedor');
                }
            }
        }
        $data['genders'] = $this->User_model->get_all_genders();
        $data['stores'] = $this->Team_model->get_stores_select();
        $data['type_sales'] = $this->Team_model->get_all_type_sale();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_equipe/cadastro_vendedor");
        $this->load->view("_inc/footer");
    }

    public function administrador() {
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
                    $this->session->set_flashdata('success', 'Vendedor cadastrado com sucesso!');
                    redirect('Equipe_controller/administrador');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível cadastrar');
                    redirect('Equipe_controller/administrador');
                }
            }
        }
        $data['genders'] = $this->User_model->get_all_genders();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = array(NULL => 'Selecione um estado');
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("cadastro_equipe/cadastro_administrador");
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

    public function cpf_check($str) {
        $this->load->model('User_model');
        if ($this->User_model->cpf_exists($str)) {
            $this->form_validation->set_message('cpf_check', 'O CPF já foi cadastrado');

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

}
