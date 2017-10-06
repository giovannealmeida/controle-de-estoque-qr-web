<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Login_controller extends REST_Controller {

    public function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->config->config['rest_enable_keys'] = FALSE;
        $this->methods['index_post']['limit'] = LIMIT_REQUESTS;
        $this->methods['register_post']['limit'] = LIMIT_REQUESTS;
        $this->methods['forgot_password_send_hash_post']['limit'] = LIMIT_REQUESTS;
        $this->methods['valid_forgot_password_hash_get']['limit'] = LIMIT_REQUESTS;
        $this->methods['change_password_post']['limit'] = LIMIT_REQUESTS;
    }

    /*
     * Login no sistem
     * A função recebe os seguintes parâmetros, via $this->post
     * 		email, email do usuário *
     * 		password, senha do usuário *
     * Retorna Status
     * 
     */

    public function index_post() {
        if ($this->post('email') && $this->post('password')) {
            if (!$this->session->userdata("logged")) {
                $this->load->model("User_model", "user");

                if ($data = $this->user->get_access($this->post('email'), $this->post('password'))) {
                    $this->session->set_userdata('logged', $data);

                    $this->response(array('status' => TRUE, 'data' => $data), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array('status' => false, 'message' => 'Cant Create Session or Key'), REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(array('status' => TRUE, 'data' => $this->session->userdata("logged")), REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    /*
     * Cadastro no sistema
     * A função recebe os seguintes parâmetros, via $this->post
     *          name, nome do usuário que será cadastrado *
     * 		email, email do usuário que será cadastrado *
     * 		password, senha do abalhador que será cadastrado *
     * 		birthday, data de nascimento do usuário que será cadastrado *
     * 		gender_id, id do gênero do usuário *
     *          phone, Número do telefone ou celular  do usuário que será cadastrado *
     *          street, endereço do usuário que será cadastrado *
     * 		city_id, id da cidade do usuário que será cadastrado *
     *          rg, RG do usuário que será cadastrado
     * 		passport, Passaport do usuário que será cadastrado
     *          shipping_agent, Orgão expedidor do RG do usuário que será cadastrado
     *          nationality, Nacionalidade do usuário que será cadastrado
     *          zip_code, CEP da cidade do usuário que será cadastrado
     *          profession, Profissão do usuário que será cadastrado
     *          neighborhood, Bairro do usuário que será cadastrado
     *          cpf, CPF do usuário que será cadastrado
     * 		avatar, foto  do usuário que será cadastrado
     * Retorna Status
     */

    public function register_post() {
        $this->load->model("Util_model", "util");
        $this->load->model("User_model", "users");
        $name = $this->post('name');
        $email = $this->post('email');
        $password = $this->post('password');
        $birthday = $this->post('birthday');
        $gender_id = $this->post('gender_id');
        $phone = $this->post('phone');
        //$city_id = $this->post('city_id');
        $cpf = $this->post('cpf');

        if ($name && $email && $password && $birthday && $gender_id && $phone && $cpf) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'birthday' => date('Y-m-d', strtotime($birthday)),
                'gender_id' => $gender_id,
                'phone' => $phone,
                'cpf' => $cpf,
                'level_id' => 1
            );

            if ($this->post('avatar') != NULL) {
                $this->load->model("Util_model", "util");
                $image = $this->post('avatar');
                $dir = $this->util->getDir('.png');
                $path = 'assets/avatar/' . substr($dir, 0, 12);
                if (!mkdir($path, 0777, true)) {
                    die('Failed to create folders...');
                }
                $data['avatar'] = $path . substr($dir, 12);
                file_put_contents($data['avatar'], base64_decode($image));
            }

            $this->load->model("User_model", "user");
            $result = $this->user->insert($data, $password);
            if ($result) {
                /*$cidade_insert['user_id'] = $result->id;
                $cidade_insert['city_id'] = $this->input->post('city_id');
                $this->users->insert_city($cidade_insert);*/
                $this->session->set_userdata('logged', $result);
                $this->response(array('status' => TRUE, 'data' => $this->session->userdata("logged")), REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $this->response(array('status' => false, 'message' => 'Cant Create Session or Key'), REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    /*
     * Envia hash para email do usuário para redefinir a senha
     * A função recebe os seguintes parâmetros, via $this->post
     * 		email, email do usuário *
     * Retorna Status
     */

    public function forgot_password_send_hash_post() {
        $email = $this->post("email");
        if (!$email) {
            $this->response('Params not found', REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->load->model("User_model");
        $user = $this->User_model->get_by_email($email);
        if (!$user) {
            $this->response('user not found', REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->load->model("Forgot_password_model");
        $hash = $this->Forgot_password_model->get_hash($user->id);
        if (!$hash) {
            $this->response('Hash not created', REST_Controller::HTTP_OK);
        }
        $this->load->model("Email_model");
        if ($this->Email_model->send_forgotten_password($email, $hash, $user->id)) {
            $this->response(array("status" => TRUE, "message" => "Email Send"), REST_Controller::HTTP_OK);
        }

        $this->response(array("status" => FALSE, "message" => "Email not send"), REST_Controller::HTTP_OK);
    }

    /*
     * Valida hash para permitir criação de nova senha
     * A função recebe os seguintes parâmetros, via $this->get
     * 		hash, hash recebia pelo usuário via email *
     * Retorna Status
     */

    public function valid_forgot_password_hash_get() {
        $hash = $this->get("hash");
        if (!$hash) {
            $this->response('Params not found', REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->load->model("Forgot_password_model");
        if ($result = $this->Forgot_password_model->hash_exists($hash)) {
            $this->response($result, REST_Controller::HTTP_OK);
        } else {
            $this->response('Hash not exists', REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    /*
     * Cria nova senha para o usuário
     * A função recebe os seguintes parâmetros, via $this->post
     * 		hash, hash recebida pelo usuário via email *
     *          pass1, Nova senha *
     *          pass1, Confirmação da nova senha *
     * Retorna Status
     */

    public function change_password_post() {
        $hash = $this->post("hash");
        $pass1 = $this->post("pass1");
        $pass2 = $this->post("pass2");

        if (!$hash || !$pass1 || !$pass2) {
            $this->response('Params not found', REST_Controller::HTTP_BAD_REQUEST);
        }
        $this->load->model("Forgot_password_model");

        if ($result = $this->Forgot_password_model->hash_exists($hash)) {
            if ($pass1 == $pass2) {
                $new_password = password_hash($pass1, PASSWORD_BCRYPT);
                $this->load->model("User_model");
                $this->User_model->update($result["id"], array("password" => $new_password));
                if ($this->db->affected_rows() == 1) {
                    $this->response(TRUE, REST_Controller::HTTP_OK);
                    $this->db->where("hash", $hash);
                    $this->db->delete("tb_forgotten_password_hash");
                }
                $this->response("Something went wrong", REST_Controller::HTTP_BAD_REQUEST);
            } else {
                $this->response("passwords not match", REST_Controller::HTTP_OK);
            }
        } else {
            $this->response('Hash not exists', REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    /*
     * Verifica se o email existe e se pertence ao usuário
     * A função recebe os seguintes parâmetros, via $this->get
     * 		user_id, id do usuário
     *          email, email do usuário
     * Retorna Status
     */

    public function email_check_get() {
        $this->load->model('User_model', 'user');
        $user_id = $this->get('user_id');
        $email = $this->get('email');
        if ($user_id && $email) {
            $result_belongs = $this->user->email_belongs_to_user_id($email, $user_id);
            $this->response(array('status' => $result_belongs), REST_Controller::HTTP_OK);
        } elseif ($email) {
            $result = $this->user->email_exists($email);
            $this->response(array('status' => $result), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => FALSE, 'message' => 'params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    /*
     * Verifica se o cpf existe e se pertence ao usuário
     * A função recebe os seguintes parâmetros, via $this->get
     * 		user_id, id do usuário
     *          cpf, cpf do usuário
     * Retorna Status
     */

    public function cpf_check_get() {
        $this->load->model('User_model', 'user');
        $user_id = $this->get('user_id');
        $cpf = $this->get('cpf');
        if ($user_id && $cpf) {
            $result_belongs = $this->user->cpf_belongs_to_user_id($cpf, $user_id);
            $this->response(array('status' => $result_belongs), REST_Controller::HTTP_OK);
        } elseif ($cpf) {
            $result = $this->user->cpf_exists($cpf);
            $this->response(array('status' => $result), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => FALSE, 'message' => 'params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function cpf_sum_get() {
        $input = $this->get('cpf');
        if ($input) {
            $second = str_replace('-', '', str_replace('.', '', $input));
            $cpf = str_pad(preg_replace('[^0-9]', '', $second), 11, '0', STR_PAD_LEFT);
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
                $this->response(array('status' => FALSE, 'message' => 'CPF is not valid'), REST_Controller::HTTP_OK);
            } else {
                for ($t = 9; $t < 11; $t++) {
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $cpf{$c} * (($t + 1) - $c);
                    }

                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf{$c} != $d) {
                        $this->response(array('status' => FALSE, 'message' => 'CPF is not valid'), REST_Controller::HTTP_OK);
                    }
                }
                $this->response(array('status' => TRUE, 'message' => 'CPF is valid'), REST_Controller::HTTP_OK);
            }
            $this->response(array('status' => FALSE, 'message' => 'CPF is not valid'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => FALSE, 'message' => 'params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function logout_get() {
        session_destroy();
        $this->response(array('status' => TRUE), REST_Controller::HTTP_OK);
    }


}
