<?php

class Perfil_controller extends CI_Controller {

    private $user_info;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        } else {
            $this->load->helper('form');
            $this->load->model("Util_model", "util");
            $this->load->model("Cities_model", "city");
            $this->load->model("States_model", "state");
            $this->load->model("User_model", "users");
            $this->user_info["user_profile"] = $this->session->userdata('logged_in');
        }
    }

    public function conta() {
        $this->load->library('form_validation');
        $this->load->model('States_model');
        $this->load->model('Cities_model');
        $this->load->model('Team_model');
        $this->load->model('User_model');
        $data = $this->user_info;
        if ($this->input->post()) {
            if ($data['user_profile']->email == $this->input->post('email'))
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            else
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');

            if ($data['user_profile']->cpf == $this->input->post('cpf'))
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
                $update['name'] = $this->input->post('name');
                $update['cpf'] = $this->input->post('cpf');
                $update['email'] = $this->input->post('email');
                $update['city_id'] = $this->input->post('city_id');
                $update['birthday'] = $this->input->post('birthday');
                $update['gender_id'] = $this->input->post('gender_id');
                $update = $this->User_model->update($data['user_profile']->id, $update);
                if ($update != NULL) {
                    $this->session->set_flashdata('success', 'Cadastro atualizado com sucesso!');
                } else {
                    $this->session->set_flashdata('fail', 'Não foi possível atualizar os dados cadastrais');
                }
                $user = $this->users->get_by_id($data["user_profile"]->id);
                $this->session->set_userdata('logged_in', $user);
                redirect('Perfil_controller/conta');
            }
        }
        $data['state_selected'] = $this->States_model->get_by_city($data['user_profile']->city_id)->id;
        $data['genders'] = $this->User_model->get_all_genders();
        $data['states'] = $this->States_model->get_all();
        $data['cities'] = $this->Cities_model->get_by_state_id($data['state_selected']);
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("perfil/conta");
        $this->load->view("_inc/footer");
    }

    public function alterar_senha() {
        $data = $this->user_info;
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldPassword', 'Senha Atual', 'trim|required');
            $this->form_validation->set_rules('password', 'Nova Senha', 'trim|required|min_length[6]|max_length[22]');
            $this->form_validation->set_rules('ConfirmPassword', 'Confirmar Nova Senha', 'required|matches[password]|min_length[6]|max_length[22]');

            $this->form_validation->set_message('required', 'O campo %s é obrigatório');
            $this->form_validation->set_message('matches', 'As senhas não conferem');
            $this->form_validation->set_message('min_length', 'O campo %s deve conter de 6 a 22 caracteres');
            $this->form_validation->set_message('max_length', 'O campo %s deve conter de 6 a 22 caracteres');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() !== FALSE) {
                $user = $this->users->get_by_id($data["user_profile"]->id);
                if (password_verify($this->input->post('oldPassword'), $user->password)) {
                    $form['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                    $confirmationUpdate = $this->users->update($data["user_profile"]->id, $form);
                    if ($confirmationUpdate) {
                        $this->session->set_flashdata("success", "Senha alterada com sucesso");
                        $user = $this->users->get_by_id($data["user_profile"]->id);
                        $this->session->set_userdata('logged_in', $user);
                    } else {
                        $this->session->set_flashdata("fail", "Falha ao atualizar! Consulte administrador do sistema");
                    }
                } else {
                    $this->session->set_flashdata("fail", "Senha antiga incorreta");
                }
                redirect('Perfil_controller/alterar_senha');
            }
        }
        $this->load->view("_inc/header", $data);
        $this->load->view("_inc/menu");
        $this->load->view("perfil/alterar_senha");
        $this->load->view("_inc/footer");
    }

    public function excluir() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        } else {
            $delete = $this->users->delete($this->session->userdata('logged_in')->id);
            if ($delete) {
                session_destroy();
                redirect('login_controller');
            } else {
                show_404();
            }
            redirect('Home_controller/index');
        }
    }

    public function validate_name() {
        if ($this->input->post('fullname') != null) {
            if (!preg_match('/^[a-zA-ZáàâãéèêíìóòôõúüùûñÁÀÂÃÉÈÊÍÌÓÒÔÕÚÜÛÑ ]+$/', $this->input->post('fullname'))) {
                return false;
            }
        }

        return true;
    }

    public function validate_image() {
        if ($_FILES['upload_avatar']['tmp_name'] !== '') {
            if ($_FILES['upload_avatar']['type'] == 'image/jpeg' || $_FILES['upload_avatar']['type'] == 'image/png' || $_FILES['upload_avatar']['type'] == 'image/jpg') {
                if ($_FILES['upload_avatar']['type'] <= 2097152) {
                    return true;
                } else {
                    $this->form_validation->set_message('validate_image', 'A imagem deve ter tamanho máximo de 2 MB');
                    return false;
                }
            } else {
                $this->form_validation->set_message('validate_image', 'Verifique se o tipo da imagem é JPEG ou PNG');
                return false;
            }
        } else {
            return true;
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

    public function gender() {
        if ($this->input->post('gender') == null) {
            $this->form_validation->set_message('gender', 'Selecione o sexo para continuar');

            return false;
        }

        return true;
    }

}
