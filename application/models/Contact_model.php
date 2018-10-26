<?php

class Contact_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }
    public function find($id) {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function count_all() {
        $query = $this->db->select('*')
            ->from('contact')
            ->get();

        return $query->num_rows();
    }

    public function save($data){
        $this->db->set($data)
            ->insert('contact');

        if($this->db->affected_rows() == 1){
            return $this->db->insert_id();
        }

        return false;
    }
    public function common_update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update('contact', $data);
    }
}