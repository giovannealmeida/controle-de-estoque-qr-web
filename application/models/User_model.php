<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $result = $this->db->get('tb_users');
        if ($result->num_rows() > 0) {
            return $result->result();
        }

        return null;
    }

    public function get_by_id($user_id) {
        $result = $this->db->get_where('tb_users', array('id' => $user_id));
        if ($result->num_rows() > 0) {
            return $result->result()[0];
        } else {
            return null;
        }
    }

    public function get_by_email($email) {
        $this->db->select('*');
        $result = $this->db->get_where('tb_users', array('email' => $email));
        if ($result->num_rows() > 0) {
            return $result->result()[0];
        }

        return null;
    }

    public function get_by_key($key) {
        $result = $this->db->get_where('tb_keys k', array('key' => $key));
        if ($result->num_rows() == 1) {
            return $this->get_by_id($result->result()[0]->user_id);
        }

        return null;
    }

    public function get_by_key_and_user_id($key, $user_id) {
        $result = $this->db->get_where('tb_keys k', array('key' => $key, "user_id" => $user_id));
        if ($result->num_rows() == 1) {
            return $this->get_by_id($result->result()[0]->user_id);
        }

        return FALSE;
    }

    public function get_access($email, $password) {
        $result = $this->db->get_where('tb_users', array('email' => $email));
        if ($result->num_rows() > 0) {
            $user = $result->result()[0];
            $key = $this->has_key($user->id)->key;
            if (password_verify($password, $user->password)) {          // Se a senha está correta
                return array('userData' => $user, 'key' => $key);
            }
        }

        return NULL;
    }

    public function get_access_by_key($user_id, $key) {
        $result = $this->db->get_where('tb_keys k', array('key' => $key, "user_id" => $user_id));
        if ($result->num_rows() == 1) {
            $user = $this->get_by_id($result->result()[0]->user_id);
            return array('userData' => $user, 'key' => $key);
        }

        return NULL;
    }

    public function refresh_key($id_user) {
        if ($this->has_key($id_user)) {
            $new_key = $this->generate_key();
            if ($this->update_key($id_user, $new_key)) {
                return $new_key;
            }
            return NULL;
        } else {
            $key = $this->create_key($id_user);
            return $key;
        }
    }

    public function create_key($id_user) {
        // Build a new key
        $key = $this->generate_key();

        // Insert the new key
        if ($this->insert_key($key, $id_user)) {
            return $key;
        } else {
            return false;
        }
    }

    public function update_key($id_user, $new_key) {
        $this->db->where("user_id", $id_user);
        $this->db->update("tb_keys", array("key" => $new_key));
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function generate_key() {
        do {
            // Generate a random salt
            $salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);

            // If an error occurred, then fall back to the previous method
            if ($salt === false) {
                $salt = hash('sha256', time() . mt_rand());
            }
            $length = 40;
            $new_key = substr($salt, 0, $length);
        } while ($this->key_exists($new_key));
        return $new_key;
    }

    public function key_exists($key) {
        return $this->db->get_where('tb_keys', array('key' => $key))->num_rows();
    }

    public function has_key($user_id) {
        $result = $this->db->get_where('tb_keys', array('user_id' => $user_id));
        if ($result->num_rows() == 1) {
            return $result->result()[0];
        }

        return null;
    }

    private function insert_key($key, $user_id) {
        $data['key'] = $key;
        $data['user_id'] = $user_id;
        $data['date_created'] = date('Y-m-d');

        return $this->db->insert('tb_keys', $data);
    }

    public function insert($data) {
        $this->db->insert('tb_users', $data);
        $user_id = $this->db->insert_id();
        if ($this->db->affected_rows() == 1) {
            $this->create_key($user_id);
            return $this->db->get_where('tb_users', array('id' => $user_id))->result()[0];
        }

        return null;
    }

    public function insert_city($data) {
        $this->db->insert('tb_user_city', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        }

        return false;
    }

    public function delete_city($user_id) {
        $result = $this->db->delete("tb_user_city", array("user_id" => $user_id));
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('tb_users', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function delete($user_id) {
        $result = $this->db->delete("tb_users", array("id" => $user_id));
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function email_exists($email) {
        $response_by_email = $this->db->get_where('tb_users', array('email' => $email));
        if ($response_by_email->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function cpf_exists($cpf) {
        $response_by_cpf = $this->db->get_where('tb_users', array('cpf' => $cpf));
        if ($response_by_cpf->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function identification_exists($identification) {
        $response_by_rg = $this->db->get_where('tb_users', array('rg' => $identification));
        $response_by_passaport = $this->db->get_where('tb_users', array('passport' => $identification));

        if ($response_by_rg->num_rows() == 0 && $response_by_passaport->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function forgot_password($hash) {
        $query = $this->db->query("SELECT user_id FROM tb_forgotten_password_hash WHERE TIMESTAMPDIFF(MINUTE,time,NOW()) < 80 AND hash = \"{$hash}\"");
        if ($query->num_rows() == 1) {
            return $query->result()[0]->user_id;
        }

        return false;
    }

    public function email_belongs_to_user_id($email, $user_id) {
        $response_by_user = $this->db->get_where('tb_users', array('email' => $email, "id" => $user_id));

        if ($response_by_user->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function cpf_belongs_to_user_id($cpf, $user_id) {
        $response_by_user = $this->db->get_where('tb_users', array('cpf' => $cpf, "id" => $user_id));

        if ($response_by_user->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Web
     */

    public function getUserLogin($email, $password) {
        $this->db->where("email", $email);
        $this->db->where("(level_id = 1 OR level_id = 2)");
        $response = $this->db->get('tb_users');
        if ($response->num_rows() == 1) {
            $user = $response->result()[0];
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return null;
    }

    public function getAdministradores($user_id) {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone, ci.name as city");
        $this->db->join("tb_user_city c", "u.id = c.user_id", "inner");
        $this->db->join("tb_cities ci", "c.city_id = ci.id", "inner");
        $this->db->where("level_id", 1);
        $this->db->where("u.id != {$user_id}");
        return $this->db->get("tb_users u")->result();
    }

    public function getCoordinator($user_id) {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone");
        $this->db->where("level_id", 2);
        $this->db->where("u.id != {$user_id}");
        return $this->db->get("tb_users u")->result();
    }

    public function getRoyal() {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone, ci.name as city");
        $this->db->join("tb_user_city c", "u.id = c.user_id", "inner");
        $this->db->join("tb_cities ci", "c.city_id = ci.id", "inner");
        $this->db->where("level_id", 3);
        return $this->db->get("tb_users u")->result();
    }

    public function getKing() {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone, ci.name as city");
        $this->db->join("tb_user_city c", "u.id = c.user_id", "inner");
        $this->db->join("tb_cities ci", "c.city_id = ci.id", "inner");
        $this->db->where("level_id", 4);
        return $this->db->get("tb_users u")->result();
    }

    public function getCitiesByUser() {
        $this->db->select("u.user_id, c.name as city");
        $this->db->join("tb_cities c", "u.city_id = c.id", "inner");
        $result = $this->db->get("tb_user_city u")->result();
        foreach ($result as $value) {
            $cities[$value->user_id][] = $value->city;
        }
        return $cities;
    }

    public function get_royal_by_city($cities) {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone, ci.name as city");
        $this->db->join("tb_user_city c", "u.id = c.user_id", "inner");
        $this->db->join("tb_cities ci", "c.city_id = ci.id", "inner");
        $this->db->where_in("ci.id", $cities);
        $this->db->where("level_id", 3);
        return $this->db->get("tb_users u")->result();
    }

    public function get_king_by_city($cities) {
        $this->db->select("u.id, u.avatar, u.name, u.email, u.cpf, u.phone, ci.name as city");
        $this->db->join("tb_user_city c", "u.id = c.user_id", "inner");
        $this->db->join("tb_cities ci", "c.city_id = ci.id", "inner");
        $this->db->where_in("ci.id", $cities);
        $this->db->where("level_id", 4);
        return $this->db->get("tb_users u")->result();
    }

}
