<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public $table = '';
    public $table_lang = '';

    function __construct() {
        parent::__construct();
        $this->table_lang = $this->table . '_lang';
    }

    /**
     * @param $data
     * @return integer|bool
     */
    function common_insert($data) {
        $this->db->set($data)->insert($this->table);

        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * @param $data
     * @return mixed
     */
    function insert_with_language($data){
        return $this->db->insert_batch($this->table_lang, $data);
    }

    public function get_all_with_pagination_search($order = 'desc',$limit = NULL, $start = NULL, $keywords = '',$activated = 1,$bestselling = '',$hot = '',$promotion = '',$banner = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keywords);
        $this->db->where('is_deleted', 0);
        if($bestselling != ''){
            $this->db->where($this->table .'.bestselling', $bestselling);
        }
        if($hot != ''){
            $this->db->where($this->table .'.hot', $hot);
        }
        if($promotion != '' && $promotion == 1){
            $this->db->where($this->table .'.percen !=', 0);
            $this->db->where($this->table .'.pricepromotion !=', 0);
        }
        if($banner != ''){
            $this->db->where($this->table .'.is_banner', $banner);
        }
        if($activated == 0){
            $this->db->where('is_activated', $activated);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by('id');
        $this->db->order_by("id", $order);
        return $result = $this->db->get()->result_array();
    }

    public function count_search($keyword = '',$activated = 1,$bestselling = '',$hot = '',$promotion = '',$banner = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keyword);
        if($bestselling != ''){
            $this->db->where($this->table .'.bestselling', $bestselling);
        }
        if($hot != ''){
            $this->db->where($this->table .'.hot', $hot);
        }
        if($promotion != '' && $promotion == 1){
            $this->db->where($this->table .'.percen !=', 0);
            $this->db->where($this->table .'.pricepromotion !=', 0);
        }
        if($banner != ''){
            $this->db->where($this->table .'.is_banner', $banner);
        }
        $this->db->group_by('id');
        $this->db->where('is_deleted', 0);
        if($activated == 0){
            $this->db->where('is_activated', $activated);
        }
        return $result = $this->db->get()->num_rows();
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.id', $id);
        $this->db->limit(1);
        
        return $this->db->get()->row_array();
    }

    public function count_search_without_by_product_id($product_id,$type =0){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.type', $type);
        $this->db->where($this->table .'.product_id', $product_id);

        return $result = $this->db->get()->num_rows();
    }
    public function get_by_slug($slug) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.slug', $slug);
        $this->db->limit(1);
        
        return $this->db->get()->row_array();
    }

    public function common_update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    public function get_all($order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->group_by('id');
        $this->db->order_by('id', $order);
        return $result = $this->db->get()->result_array();
    }

    public function get_all_field($order = 'desc', $select = array('title', 'description', 'content'),$lang = '', $limit = NULL, $start = NULL){
        $this->db->select($this->table .'.*');
        if (in_array('title', $select)) {
           $this->db->select($this->table_lang .'.title');
        }
        if (in_array('description', $select)) {
           $this->db->select($this->table_lang .'.description');
        }
        if (in_array('content', $select)) {
           $this->db->select($this->table_lang .'.content');
        }
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".id", $order);

        return $result = $this->db->get()->result_array();
    }

    public function count_active(){
        $query = $this->db->from($this->table)->where('is_activated', 1)->get();
        return $query->num_rows();
    }

    function update_with_language($id, $language,  $data){
        $this->db->where($this->table .'_id', $id);
        $this->db->where('language', $language);
        return $this->db->update($this->table_lang, $data);
    }

    public function build_unique_slug($slug, $id = null){
        $count = 0;
        $temp_slug = $slug;
        while(true) {
            $this->db->select('id');
            $this->db->where('slug', $temp_slug);
            if($id != null){
                $this->db->where('id !=', $id);
            }
            $query = $this->db->get($this->table);
            if ($query->num_rows() == 0) break;
            $temp_slug = $slug . '-' . (++$count);
        }
        return $temp_slug;
    }
    public function get_all_with_pagination_and_sort_search($order = 'desc',$limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('title', $keywords);
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->group_by('id');
        $this->db->order_by("sort", $order);

        return $result = $this->db->get()->result_array();
    }
    
    public function find_rows($data=array()){
        $this->db->where($data);
        return $this->db->count_all_results($this->table);
    }
    public function find($id){
        $this->db->where(array('id' => $id,'is_deleted' => 0));
        return $this->db->get($this->table)->row_array();
    }
    public function find_array($where = array()){
        $this->db->where(array_merge(array('is_deleted' => 0),$where));
        return $this->db->get($this->table)->row_array();
    }
    /**
     * FETCH POSTS IN SPECIFY CATEGORY
     * @param 
     * @return mixed
     */
    public function get_all_item($category){
        $this->db->select('*')
            ->from($this->table)
            ->where($this->table . '.post_category_id', $category)
            ->where($this->table . '.is_deleted', 0);

        return $result = $this->db->get()->result_array();
    }
    public function multiple_update_by_ids($ids = array(), $data) {
        $this->db->where_in('id', $ids);

        return $this->db->update($this->table, $data);
    }

    public function multiple_update_by_category_ids($category_ids = array(), $data) {
        $this->db->where_in($this->table .'_category_id', $category_ids);

        return $this->db->update($this->table, $data);
    }

    
    public function count_is_banner($is_top){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_banner', $is_top);
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results();
    }
}