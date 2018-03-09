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
class Venda_controller extends REST_Controller {

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

    public function index_post() {
        if ($this->post('user_id') && $this->post('products')) {
            $this->load->model('Sales_model');
            $this->load->model('Stock_model');
            $insert['sale_id'] = $this->Sales_model->get_last_id() + 1;
            $insert['salesman_id'] = $this->post('user_id');
            $insert['client_id'] = $this->post('client_id');
            $products = $this->post('products');

            foreach ($products as $value) {
                $insert['product_id'] = $value['product_id'];
                $insert['amount'] = $value['amount'];
                $insert['value'] = $value['value'];
                if($this->Stock_model->get_amount_product($insert['salesman_id'], $insert) >= $insert['amount']) {
                    $this->Sales_model->insert($insert);
                    $this->Stock_model->update_amount_product($insert['salesman_id'], $insert);
                } else {
                    $this->response(array('status' => false, 'message' => 'Not enough stock left'), REST_Controller::HTTP_BAD_REQUEST);
                }
            }
            $this->response(array('status' => true, 'message' => 'sale completed successfully'), REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
