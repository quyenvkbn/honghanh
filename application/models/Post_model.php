<?php 

/**
* 
*/
class Post_model extends MY_Model{
	
	public $table = 'post';


    public function get_by_category_id($post_category_id = '',$activated=1) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('post_category_id', $post_category_id);
        if($activated == 0){
            $this->db->where('post.is_activated', 0);
        }
        $this->db->group_by("id");
        return $this->db->get()->result_array();
    }

    public function get_by_post_category_id($post_category_id = array(),$activated=1) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where_in('post_category_id', $post_category_id);
        if($activated == 0){
            $this->db->where('post.is_activated', 0);
        }
        $this->db->group_by("id");
        return $this->db->get()->result_array();
    }
    public function get_post_in_array_category_id($post_category_id = array(),$limit = NULL, $start = NULL,$order ="desc") {
        $this->db->select('post.*, post_category.title as parent_title,post_category.slug as parent_slug');
        $this->db->from($this->table);
        $this->db->join('post_category','post_category.id = post.post_category_id');
        $this->db->where('post.is_deleted', 0);
        $this->db->where('post.is_activated', 0);
        $this->db->where_in('post.post_category_id', $post_category_id);
        $this->db->group_by("post.id");
        $this->db->order_by("post.id",$order);
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
    public function get_by_slug($slug) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('slug', $slug);

        return $this->db->get()->row_array();
    }
    public function get_all_with_pagination($order = 'desc',$limit = NULL, $start = NULL, $category = array(),$activated=1) {
        $this->db->select('post.*, post_category.title as parent_title,post_category.slug as parent_slug');
        $this->db->from($this->table);
        $this->db->join('post_category','post_category.id = post.post_category_id');
        $this->db->where_in('post.post_category_id', $category);
        $this->db->where('post.is_deleted', 0);
        if($activated == 0){
            $this->db->where('post.is_activated', 0);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by('post.id');
        $this->db->order_by("post.id", $order);

        return $result = $this->db->get()->result_array();
    }
    public function fetch_row_by_slug($slug){
        $this->db->select('post.*, post_category.title as parent_title, post_category.slug as parent_slug');
        $this->db->from($this->table);
        $this->db->join('post_category', 'post_category.id = post.post_category_id');
        $this->db->where('post.is_deleted', 0);
        $this->db->where('post.is_activated', 0);
        $this->db->where('post.slug', $slug);

        return $this->db->get()->row_array();
    }

    public function get_by_post_category_id_and_not_id($post_category_id=array(),$id,$limit=0,$order='asc') {
        $this->db->select('post.*, post_category.title as parent_title, post_category.slug as parent_slug');
        $this->db->from($this->table);
        $this->db->join('post_category', 'post_category.id = post.post_category_id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->where_in('post.post_category_id', $post_category_id);
        $this->db->where("post.id !=",$id);
        $this->db->group_by('post.id');
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
}