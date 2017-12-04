<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_store($data) {
        $this->db->insert('tb_stores', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }
        return false;
    }

}
