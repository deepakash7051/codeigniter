<?php
class User_model extends CI_Model {
    public function get_username($user) {
        $query = $this->db->get_where('tbl_user', $user);
			return $query->num_rows();
    }
    public function new_user($data) {
        $this->db->insert('tbl_user', $data);
			return true;
    }
    public function login_user($data) {
        $query = $this->db->get_where('tbl_user', $data);
        if ($query->num_rows() > 0) {
            return true;
        }
    }
	public function login_user_detail($data) {
        $query = $this->db->get_where('tbl_user', $data);
            return $query->first_row();
    }
}