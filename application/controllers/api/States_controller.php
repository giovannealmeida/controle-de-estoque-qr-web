<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class States_controller extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->config->config['rest_enable_keys'] = TRUE;
        $this->methods['index_get']['limit'] = LIMIT_REQUESTS;
    }

    /*
     * Pega dados do estado pelo id ou nome ou país ou todos estados
     * A função recebe os seguintes parâmetros, via $this->post
     * 		id, id do estado que deseja obter os dados *
     *          name, nome do estado que deseja obter os dados *
     *          country_id, id do país que deseja obter os dados dos estados *
     * Retorna array
     */

    public function index_get() {
        $id = $this->get('id');
        $name = $this->get('name');
        $uf = $this->get('uf');
        $city_id = $this->get('city_id');
        $this->load->model("States_model", "states");

        if ($id !== NULL) {
            $result = $this->states->get_by_id($id);
        } elseif ($name !== NULL) {
            $result = $this->states->get_by_name($name);
        } else if ($uf !== NULL) {
            $result = $this->states->get_by_uf($uf);
        } else if ($city_id) {
            $result = $this->states->get_by_city($city_id);
        } else {
            $result = $this->states->get_all();
        }

        $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

}