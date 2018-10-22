<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Localtion_model extends MY_Model {

    public $table = 'localtion';

    public function __construct() {
        parent::__construct();
    }
    public function get_all_localtion() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
    public function get_all_group_by() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->group_by('area');
        return $result = $this->db->get()->result_array();
    }
    public function get_by_area_id($area_id='') {
        $this->db->select($this->table . '.*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('area_id', $area_id);
        return $result = $this->db->get()->result_array();
    }
    public function get_by_slug_localtion($slug='') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('slug', $slug);
        return $result = $this->db->get()->row_array();
    }
    public function get_by_area($area='') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('area', $area);
        return $result = $this->db->get()->result_array();
    }
    public function get_librarylocaltion_by_id_array($librarylocaltion = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where_in('id', $librarylocaltion);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
    public function get_groupby_area_id_array($librarylocaltion = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where_in('id', $librarylocaltion);
        $this->db->where('is_deleted', 0);
        $this->db->group_by('area_id');
        return $result = $this->db->get()->result_array();
    }
    public function get_librarylocaltion_by_not_id_array($notlibrarylocaltion = array(),$area = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where_in('area_id', $area);
        $this->db->where_not_in('id', $notlibrarylocaltion);        
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
    public function get_by_id_array($id = array()) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where_in('id', $id);
        return $this->db->get()->row_array();
    }
    public function get_by_id_array_lang($id = array()) {
        $this->db->select($this->table .'.*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where_in('id', $id);
        return $this->db->get()->result_array();
    }
    public function fetch_row_by_slug($slug){
        $this->db->select($this->table . '.*, ' . 'area.vi as vi');
        $this->db->from($this->table);
        $this->db->join('area', 'area.id = '.$this->table .'.'. 'area_id','left');
        $this->db->where($this->table . '.is_deleted', 0);
        $this->db->where($this->table . '.slug', $slug);
        return $this->db->get()->row_array();
    }
    public function get_all_localtion_area($area,$id,$limit = ''){
        $this->db->select($this->table . '.*, ' . 'area.vi as vi');
        $this->db->from($this->table);
        $this->db->join('area', 'area.id = '.$this->table .'.'. 'area_id','left');
        $this->db->where($this->table . '.area_id', $area);
        $this->db->where($this->table . '.id !=', $id);
        $this->db->limit($limit);
        return $result = $this->db->get()->result_array();
    }
    public function get_all_with_pagination_searchs($order = 'asc',$limit = NULL, $start = NULL, $keywords = '',$area_id = '',$is_hot = '', $is_backend = '') {
        $this->db->select($this->table .'.*, area.vi as vi');
        $this->db->from($this->table);
        $this->db->join('area', 'area.id = '.$this->table .'.'. 'area_id','left');
        $this->db->like($this->table .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        if($area_id != ''){
            $this->db->where($this->table .'.area_id', $area_id);
        }
        if($is_hot != ''){
            $this->db->where($this->table .'.is_hot', $is_hot);
        }
        $this->db->limit($limit, $start);
        if(empty($is_backend)){
            $this->db->order_by($this->table .".is_hot desc, " . $this->table . ".title ". $order);
        }else{
            $this->db->order_by($this->table .".id", $order);
        }

        return $this->db->get()->result_array();
    }
    public function count_searchs($keyword = '',$area_id = '',$is_hot = ''){
        $this->db->select($this->table . '.*');
        $this->db->from($this->table);
        $this->db->join('area', 'area.id = '.$this->table .'.'. 'area_id','left');
        $this->db->like($this->table .'.title', $keyword);
        if($area_id != ''){
            $this->db->where($this->table .'.area_id', $area_id);
        }
        if($is_hot != ''){
            $this->db->where($this->table .'.is_hot', $is_hot);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        return $this->db->get()->num_rows();
    }
}
