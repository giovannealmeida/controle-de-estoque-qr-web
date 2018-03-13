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
class Cities_controller extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->config->config['rest_enable_keys'] = TRUE;
        $this->methods['index_get']['limit'] = LIMIT_REQUESTS;
    }

    /*
     * Pega dados da cidade pelo id ou nome ou estado ou todas cidades
     * A função recebe os seguintes parâmetros, via $this->get
     * 		id, id da cidade que deseja obter os dados *
     *          name, nome da cidade que deseja obter os dados *
     *          state_id, id do estado que deseja obter os dados das cidades *
     * Retorna array
     */

    public function index_get() {
        $id = $this->get('id');
        $name = $this->get('name');
        $state_id = $this->get('state_id');
        $this->load->model("Cities_model", "cities");

        if ($id) {
            $result = $this->cities->get_by_id($id);
        } else if ($name) {
            $result = $this->cities->get_by_name($name);
        } else if ($state_id) {
            $result = $this->cities->get_by_state_id($state_id);
        } else {
            $result = $this->cities->get_all();
        }

        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

}
