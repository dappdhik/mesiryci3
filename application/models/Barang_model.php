<?php
class Barang_model extends CI_Model{
    public function barangsemua(){
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->result();
    }
}
?>