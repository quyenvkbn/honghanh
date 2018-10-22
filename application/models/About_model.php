<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2018
 * Time: 4:58 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class About_model extends MY_Model {

    public $table = 'about';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_id_in_about($lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }
}