<?php 

/**
* 
*/
class Banner_model extends MY_Model{
    
    public $table = 'banner';
    public function get_by_parent_id($parent_id, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if(is_numeric($parent_id)){
            $this->db->where('id', $parent_id);
        }
        $this->db->group_by('id');
        $this->db->order_by("id", $order);

        return $result = $this->db->get()->row_array();
    }
    public function get_all_lang($order="desc") {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->group_by("id");
        $this->db->order_by("id", $order);
        return $this->db->get()->result_array();
    }
}