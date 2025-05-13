<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return true;
            }
        }
        
        return false;
    }

    public function register_user($username, $password)
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        
        $data = [
            'username' => $username,
            'password' => $password_hash
        ];

        $this->db->insert('users', $data);
    }
}
