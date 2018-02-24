<?php

class consult_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function getCityByState($state_id) {
        $this->load->model('Cities_model');
        $result = $this->Cities_model->get_by_state_id($state_id);
        echo json_encode($result);
    }

    public function getCityByName() {
        if ($this->input->post()) {
            $name = $this->input->post("q");
        }
        $this->db->select('c.id, s.initials, c.name');
        $this->db->like('c.name', $name);
        $this->db->join("tb_states s", "s.id = c.state_id");
        $result = $this->db->get("tb_city c")->result();
        $array = array();

        foreach ($result as $row) {
            $array[] = array("id" => $row->id, "initials" => $row->initials, "name" => $row->name);
        }

        print_r(json_encode($array));
    }

    public function getCityById($idCity) {
        $this->db->select('*');
        $this->db->from('tb_city');
        $this->db->where('id', $idCity);
        $query = $this->db->get();
        $array = array('lat' => $query->result()[0]->latitude, 'lng' => $query->result()[0]->longitude);

        print_r(json_encode($array));
    }

    public function getProductByStore($store_id, $product_id = null) {

        if ($product_id != null) {
            $this->db->where('sp.product_id', $product_id);
        }
        $this->db->select('p.id as id, p.product_name as name, sp.amount, sp.value, s.fantasy_name as store, s.cnpj as cnpj, p.code as code');
        $this->db->join('tb_stores s', 's.id = sp.store_id', 'inner');
        $this->db->join('tb_products p', 'p.id = sp.product_id', 'inner');
        $this->db->where('sp.store_id', $store_id);
        $query = $this->db->get('tb_store_product sp');
        print_r(json_encode($query->result()));
    }

    public function getStores() {
        $query = $this->db->get('tb_stores');
        print_r(json_encode($query->result()));
    }

}
