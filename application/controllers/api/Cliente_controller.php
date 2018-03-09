<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Cliente_controller extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->config->config['rest_enable_keys'] = FALSE;
        $this->methods['index_get']['limit'] = LIMIT_REQUESTS;
    }

    /*
     * Pega dados do proguto pelo código
     * A função recebe os seguintes parâmetros, via $this->get
     * 		code, code do produto que deseja obter os dados *
     * Retorna array
     */

    public function register_post() {
        $this->load->model("Client_model");
        $name = $this->post('name');
        $email = $this->post('email'); //Opcional
        $gender_id = $this->post('gender_id');
        $phone = $this->post('phone'); //Opcional
        $city_id = $this->post('city_id');
        $cpf = $this->post('cpf');

        if ($name && $gender_id && $city_id && $cpf) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'gender_id' => $gender_id,
                'phone' => $phone,
                'city_id' => $city_id,
                'cpf' => $cpf
            );

            $result = $this->Client_model->insert($data);
            if ($result) {
                $this->response(array('status' => true, 'message' => 'Customer successfully registered'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => false, 'message' => 'Could not register client'), REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function client_exists_get() {
        $this->load->model("Client_model");
        $cpf = $this->get('cpf');
        if ($cpf) {
            $result = $this->Client_model->client_exists($cpf);
            $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function client_get() {
        $this->load->model("Client_model");
        $cpf = $this->get('cpf');
        if ($cpf) {
            $result = $this->Client_model->get_by_cpf($cpf);
            print_r($result);
            die;
            if ($result == true) {
                $this->response(array('status' => true, 'message' => 'Customer already registered'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => false, 'message' => 'Customer not yet registered'), REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
