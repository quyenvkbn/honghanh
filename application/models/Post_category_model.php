<?php 

/**
* 
*/
class Post_category_model extends MY_Model{
	
	public $table = 'post_category';

	public function get_by_parent_id($parent_id, $order = 'desc',$activated =1){
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if($activated == 0){
            $this->db->where('is_activated', 0);
        }
        if(is_numeric($parent_id)){
            $this->db->where('parent_id', $parent_id);
        }
        $this->db->group_by('id');
        $this->db->order_by("sort", $order);

        return $result = $this->db->get()->result_array();
	}

    public function get_by_parent_id_when_active($parent_id, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        if(is_numeric($parent_id)){
            $this->db->where('parent_id', $parent_id);
        }
        
        $this->db->group_by('id');
        $this->db->order_by("sort", $order);

        return $result = $this->db->get()->result_array();
    }

    public function get_by_slug($slug, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        if($slug != ''){
            $this->db->where('slug', $slug);
        }
        $this->db->group_by('id');
        $this->db->order_by("sort", $order);

        return $result = $this->db->get()->row_array();
    }

	public function update_sort($sort, $id){
        $this->db->set(array('sort' => $sort))
            ->where('id', $id)
            ->update('post_category');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
    public function get_by_parent_id_num_rows($parent_id){
        if(is_numeric($parent_id)){
            $this->db->where('id', $parent_id);
        }
        return $this->db->count_all_results($this->table);
    }
    public function fetch_menu_categories($parent, $lang = 'vi'){
        $where = "post_category.is_deleted = 0 AND post_category.parent_id = '" . $parent . "'";

        $this->db->select('*')
            ->from('post_category')
            ->where($where);

        return $this->db->get()->result_array();
    }
    public function fetch_post_category_menu($parent_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        if(is_numeric($parent_id)){
            $this->db->where('parent_id', $parent_id);
        }

        return $result = $this->db->get()->result_array();
    }

    public function fetch_row_by_slug($slug){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        if($slug != ''){
            $this->db->where('slug', $slug);
        }

        return $result = $this->db->get()->row_array();
    }
    public function get_all($order="asc") {
        $this->db->select($this->table .'.*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->group_by("id");
        //$this->db->order_by("sort", $order);
        return $this->db->get()->result_array();
    }
}