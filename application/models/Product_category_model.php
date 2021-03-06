<?php 

/**
* 
*/
class Product_category_model extends MY_Model{
	
	public $table = 'product_category';


	public function update_sort($sort, $id){
        $this->db->set(array('sort' => $sort))
            ->where('id', $id)
            ->update('product_category');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
    public function get_by_parent_id_when_active($parent_id, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if(is_numeric($parent_id)){
            $this->db->where($this->table .'.parent_id', $parent_id);
        }
        $this->db->group_by('id');
        $this->db->order_by('sort', $order);
        return $result = $this->db->get()->result_array();
    }
    public function get_by_parent_id($parent_id, $order = 'desc',$activated = 1){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if(is_numeric($parent_id)){
            $this->db->where('parent_id', $parent_id);
        }
        if($activated == 0){
            $this->db->where('is_activated', 0);
        }
        $this->db->group_by('id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }
    public function get_by_type($type, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->where('type', $type);
        $this->db->group_by('id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }
    public function get_all($order="asc") {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->group_by("id");
        $this->db->order_by("sort", $order);
        return $this->db->get()->result_array();
    }
    public function get_all_lang($order="asc") {
        $this->db->select($this->table .'.*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->group_by("id");
        //$this->db->order_by("sort", $order);
        return $this->db->get()->result_array();
    }
    public function get_by_slug_lang($slug,$order="asc") {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->where('slug', $slug);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
    public function get_by_id_lang($id,$order="asc") {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->where($this->table .'.id', $id);
        $this->db->limit(1);
        
        return $this->db->get()->row_array();
    }
    
    public function get_parent_id($parent_id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->where('parent_id', $parent_id);
        $this->db->group_by("id");
        return $this->db->get()->result_array();
    }
}