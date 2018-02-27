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

    public function editar() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Cities_model');
        $this->load->model('Client_model');
        $this->load->model('User_model');
        $data = $this->user_info;
        $data['client'] = $this->Client_model->get_by_id($this->input->get_post('id'));
        if ($this->input->post()) {
            if ($data['client']->email == $this->input->post('email'))
                $this->form_validation->set_rules('email', 'Email', 'valid_email');
            else
                $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_email_check');

            if ($data['client']->cpf == $this->input->post('cpf'))
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum');
            else
                $this->form_validation->set_rules('cpf', 'CPF', 'required|callback_cpf_sum|callback_cpf_check');
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('city_id', 'Cidade', 'required');
            $this->form_validation->set_rules('gender_id', 'Gênero', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('valid_email', 'Email inválido');
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            if ($this->form_validation->run() == true) {
                $update = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'gender_id' => $this->input->post('gender_id'),
                    'phone' => $this->input->post('phone'),
                    'city_id' => $this->input->post('city_id'),
                    'cpf' => $this->input->post('cpf')
                );

                $update = $this->Client_model->update($this->input->get_post('id'), $update);
                if ($update) {
                    $this->session->set_flashdata("success", "Cliente atualizado com sucesso");
                } else {
                    $this->session->set_flashdata("fail", "Falha ao atualizar! Consulte administrador do sistema");
                }
                redirect('clientes_controller/visualizar_clientes');
            }
        }
        $data['state_selected'] = $this->States_model->get_by_city($data['user_profile']->city_id)->id;
        $data['genders'] = $this->User_model->get_all_genders();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = $this->Cities_model->get_by_state_id($data['state_selected']);
        $this->load->view("_inc/header");
        $this->load->view("_inc/menu");
        $this->load->view("clientes/editar_clientes", $data);
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

    public function email_check($str) {
        $this->load->model('User_model');
        if ($this->Client_model->email_exists($str)) {
            $this->form_validation->set_message('email_check', 'O email já foi cadastrado');

            return false;
        }

        return true;
    }

    public function cpf_check($str) {
        $this->load->model('User_model');
        if ($this->Client_model->cpf_exists($str)) {
            $this->form_validation->set_message('cpf_check', 'O CPF já foi cadastrado');

            return false;
        }

        return true;
    }

    public function gender() {
        if ($this->input->post('gender') == null) {
            $this->form_validation->set_message('gender', 'Selecione o sexo para continuar');

            return false;
        }

        return true;
    }

}
