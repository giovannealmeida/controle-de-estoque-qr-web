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
class User_controller extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->config->config['rest_enable_keys'] = FALSE;
        $this->methods['index_get']['limit'] = LIMIT_REQUESTS;
    }

    public function index_get() {
        $this->load->model('User_model');
        $id = $this->get('id');

        if ($id) {
            $result = $this->User_model->get_by_id($id);
        }else{
            $this->response(array('status' => FALSE, 'message' => 'params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }

        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

}
