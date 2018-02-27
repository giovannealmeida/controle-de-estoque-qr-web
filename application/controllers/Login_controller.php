<?php

class Login_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* $this->facebook = new Facebook\Facebook([
          'app_id' => '1330791536954247',
          'app_secret' => '71ba607dfdc732389a7cc46a6ee209d8',
          'default_graph_version' => 'v2.5',
          ]);
          $this->load->library('googleplus'); */
    }

    public function index() {
        $this->load->helper('form');
        $this->load->model('User_model', 'users');
        $data = array();

        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->load->model('Users_model', 'users');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Senha', 'required');
            $this->form_validation->set_message('required', 'O campo <strong>%s</strong> é obrigatório');
            if ($this->form_validation->run() == true) {
                if ($user = $this->users->getUserLogin($this->input->post("email"), $this->input->post("password"))) {
                    $this->session->set_userdata("logged_in", $user);
                    redirect("Inicio");
                } else {
                    $data["login_status"] = "error";
                }
            }
        }

        $data['scripts'] = array(
            'https://apis.google.com/js/api:client.js',
            base_url("assets/js/validator.js")
        );

        //$this->load->view('_inc/header', $data);
        $this->load->view('login');
        //$this->load->view('_inc/footer');
    }

    public function forgot_password($hash = null) {
        $this->load->helper('form');
        //$this->load->view('_inc/header');
        $this->load->model('User_model', 'users');
        $this->load->model('Email_model');
        $this->load->model("Forgot_password_model");

        if ($hash == null) {
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_message('required', 'Digite um endereço de email');
                $this->form_validation->set_message('valid_email', 'Insira um email válido');

                if ($this->form_validation->run()) {
                    $email = $this->input->post('email');
                    $user = $this->users->get_by_email($email);
                    if ($user && $user->level_id == 1) {
                        $hash = $this->Forgot_password_model->get_hash($user->id);
                        if ($hash) {
                            if ($this->Email_model->send_forgotten_password($email, $hash)) {
                                $data['message'] = "Enviamos as instruções de recuperação de senha para seu email com sucesso!<br/><br/>Espere 5 segundos para ser redirecionado para tela inicial ou <a href=\"" . base_url("login_controller") . "\"> clique aqui</a>";
                                $data["scripts"] = array(base_url('assets/js/timer_redirect.js'));
                            } else {
                                $data['message'] = 'Houve um problema com o envio do email, contate o administrador';
                            }
                        }
                    } else {
                        $url = base_url('login_controller/forgot_password');
                        $data['message'] = "Este email não está cadastrado no nosso sistema, <a href=\"{$url}\"> Clique aqui para tentar novamente</a> ";
                    }
                    redirect('login_controller');
                } else {
                    $this->load->view('forgot_password');
                }
            } else {
                $this->load->view('forgot_password');
            }
            $this->load->view('_inc/footer');
        } else {
            $id_user = $this->users->forgot_password($hash);

            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
                $this->form_validation->set_rules('password2', 'password2', 'required|matches[password]');
                $this->form_validation->set_message('required', 'Digite todos os campos');
                $this->form_validation->set_message('matches', 'A senhas devem ser iguais');
                $this->form_validation->set_message('min_length', 'A senhas deve ter no mínimo 6 caracteres');
                $this->form_validation->set_error_delimiters('<li>', '</li>');

                if ($this->form_validation->run()) {
                    if ($id_user) {
                        $this->db->trans_start();

                        $result = $this->users->update(
                                $id_user, array('password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT))
                        );

                        $this->db->trans_complete();

                        $this->db->where('hash', $hash);
                        $this->db->delete('tb_forgotten_password_hash');
                        $data['message'] = "Senha alterada com sucesso<br/><br/>Espere 5 segundos para ser redirecionado para tela inicial ou <a href=\"" . base_url("") . "\"> clique aqui</a>";
                        $data["scripts"] = array(base_url('assets/js/timer_redirect.js'));

                        $this->load->view('message_panel', $data);
                        $this->load->view('_inc/footer');
                    } else {
                        $data['message'] = "Este link expirou ou não existe<br/><br/>Espere 5 segundos para ser redirecionado para tela inicial ou <a href=\"" . base_url("") . "\"> clique aqui</a>";
                        $data["scripts"] = array(base_url('assets/js/timer_redirect.js'));

                        $this->load->view('message_panel', $data);
                        $this->load->view('_inc/footer');
                    }
                } else {
                    $this->load->view('forgot_password_change');
                    $this->load->view('_inc/footer');
                }
            } else {
                if ($id_user) {
                    $this->load->view('forgot_password_change');
                    $this->load->view('_inc/footer');
                } else {
                    $data['message'] = 'Este link expirou ou não existe';
                    $data["scripts"] = array(base_url('assets/js/timer_redirect.js'));

                    $this->load->view('message_panel', $data);
                    $this->load->view('_inc/footer');
                }
            }
        }
    }

    public function logout() {
        session_destroy();
        redirect('login_controller/index');
    }

}
