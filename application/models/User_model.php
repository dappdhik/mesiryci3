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
                return $user;
            }
        }

        return false;
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function register_user($username, $password)
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'username' => $username,
            'password' => $password_hash,
            'role'     => 'kasir' 
        ];

        $this->db->insert('users', $data);
    }
}
