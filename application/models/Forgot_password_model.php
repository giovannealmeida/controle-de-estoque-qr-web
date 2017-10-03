<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_hash($user_id)
    {
        if (!$user_id) {
            return null;
        }
        $this->load->model('Util_model');

        do {
            $hash = md5($this->Util_model->generateRandomString(60));
        } while ($this->hash_exists($hash));
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i:s');
        $this->db->insert('tb_forgotten_password_hash', array('user_id' => $user_id, 'hash' => $hash, 'time' => $date));
        if ($this->db->affected_rows() == 1) {
            return $hash;
        }

        return null;
    }

    public function hash_exists($hash)
    {
        $this->db->where("hash", $hash);
        $this->db->where("TIMESTAMPDIFF(MINUTE,time,NOW()) < 80", null);
        $result = $this->db->get('tb_forgotten_password_hash');
        if ($result->num_rows() == 1) {
            $user_id = $result->result()[0]->user_id;
            $user = $this->db->get_where("tb_users", array("id" => $user_id));
            if ($user->num_rows() == 1) {
                $user = $user->result()[0];
                return array("id" => $user->id, "name" => $user->name);
            }
        }

        return false;
    }
}
