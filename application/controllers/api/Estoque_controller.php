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
class Estoque_controller extends REST_Controller {

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

    public function index_get() {
        $code = $this->get('code');
        $user_id = $this->get('user_id');
        $this->load->model("Stock_model");

        if ($code) {
            $result = $this->Stock_model->get_products($code, $user_id);
            if ($result->amount == 0) {
                $this->response(array('status' => false, 'data' => $result, 'message' => 'Produto fora de estoque'), REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => true, 'data' => $result), REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
