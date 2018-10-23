<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('post_model');
		$this->load->model('product_model');
    }

    public function index(){
    	$this->data['product'] = $this->product_model->find_rows(array('is_deleted' => 0));
    	$this->data['post'] = $this->post_model->find_rows(array('is_deleted' => 0));
        $this->render('admin/dashboard_view');
    }
}