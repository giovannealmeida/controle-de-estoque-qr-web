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


}