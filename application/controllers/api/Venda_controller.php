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
        $this->config->config['rest_enable_keys'] = TRUE;
        $this->methods['index_post']['limit'] = LIMIT_REQUESTS;
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
            $this->load->model('User_model');
            $insert['sale_id'] = $this->Sales_model->get_last_id() + 1;
            $insert['salesman_id'] = $this->post('user_id');
            $user_store = $this->User_model->get_salesman_by_id($insert['salesman_id']);
            $insert['salesman_name'] = $user_store->name;
            $insert['store_name'] = $user_store->store;
            $insert['client_id'] = $this->post('client_id');
            date_default_timezone_set('America/Sao_Paulo');
            $date = date('Y-m-d H:i');
            $insert['date'] = $date;
            $insert['type_sale_id'] = $this->post('type_sale_id');
            $products = json_decode($this->post('products'), TRUE);

            foreach ($products as $value) {
                $insert['product_id'] = $value['product_id'];
                $insert['product_name'] = $this->Stock_model->get_product_by_id($insert['product_id'])->product_name;
                $insert['amount'] = $value['amount'];
                $insert['value'] = $value['value'];
                if ($this->Stock_model->get_amount_product($insert['salesman_id'], $insert) >= $insert['amount']) {
                    $this->Sales_model->insert($insert);
                    $this->Stock_model->update_amount_product($insert['salesman_id'], $insert);
                } else {
                    $this->response(array('status' => false, 'message' => 'Not enough stock left'), REST_Controller::HTTP_OK);
                }
            }
            $this->response(array('status' => true, 'message' => 'sale completed successfully'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => false, 'message' => 'Params not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}
