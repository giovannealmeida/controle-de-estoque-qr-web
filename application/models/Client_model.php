<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('tb_clients', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }

        return FALSE;
    }

}
