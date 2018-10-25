<?php

/**
 * 
 */
class Accessary extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('accessary_model');
		$this->data['controller'] = 'accessary';
		$this->load->helper('common');
        $this->load->helper('file');
        $this->author_data = handle_author_common_data();
	}

	public function index()
	{
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->accessary_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->accessary_model->count_search($keywords);
        }
        $this->data['keywords'] = $keywords;
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/'. $this->data['controller'] .'/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result = $this->accessary_model->get_all_with_pagination_search('desc', $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->accessary_model->get_all_with_pagination_search('desc', $per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;
		$this->render('admin/'.$this->data['controller'].'/list_accessary_view');
	}

	public function create()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('image', 'Ảnh đại diện', 'callback_check_file');
        $this->form_validation->set_rules('file', 'Bảng giá', 'callback_check_file_pdf');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/'.$this->data['controller'].'/create_accessary_view');
        } else {
        	if($this->input->post()){
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
            	$slug = $this->input->post('slug');
                $unique_slug = $this->accessary_model->build_unique_slug($slug);
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/'. $this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');

                $file = $this->upload_pdf_file('file', $_FILES['file']['name'], 'assets/upload/'.$this->data['controller'].'/pdf');
                // echo $file;die;
                $shared_request = array(
                    'slug' => $unique_slug,
                    'image' => $image,
                    'file' => $file,
                    'title' => $this->input->post('title'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $insert = $this->accessary_model->common_insert($shared_request);
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'], 'refresh');
                }else {
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'. $this->data['controller'] .'/create_accessary_view');
                }
        	}
        }
	}


	public function edit($id)
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');

        $detail = $this->accessary_model->get_by_id($id);
        $this->data['detail'] = $detail;

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/'. $this->data['controller'] .'/edit_accessary_view');
        } else {
            if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug');
                    $unique_slug = $this->accessary_model->build_unique_slug($slug, $id);
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/'. $this->data['controller'] .'', 'assets/upload/'. $this->data['controller'] .'/thumb');
                    $file = $this->upload_pdf_file('file', $_FILES['file']['name'], 'assets/upload/'.$this->data['controller'].'/pdf');
                    $shared_request = array(
                        'slug' => $unique_slug,
	                    'title' => $this->input->post('title'),
	                    'created_at' => $this->author_data['created_at'],
	                    'created_by' => $this->author_data['created_by'],
	                    'updated_at' => $this->author_data['updated_at'],
	                    'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    if($file){
                        $shared_request['file'] = $file;
                    }
                    $update = $this->accessary_model->common_update($id, $shared_request);
                    if($update){
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if($image != '' && $image != $detail['image'] && file_exists('assets/upload/'. $this->data['controller'] .'/'.$detail['image'])){
                            unlink('assets/upload/'. $this->data['controller'] .'/'.$detail['image']);
                        }
                        if($file != '' && $file != $detail['file'] && file_exists('assets/upload/'. $this->data['controller'] .'/pdf/'.$detail['file'])){
                            unlink('assets/upload/'. $this->data['controller'] .'/pdf/'.$detail['file']);
                        }
                        redirect('admin/'. $this->data['controller'] .'', 'refresh');
                    }else {
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        $this->render('admin/'. $this->data['controller'] .'/edit/'.$id);
                    }
                }else{
                    $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/'. $this->data['controller'] .'');
                }
            }
        }
	}

	public function remove(){
        $id = $this->input->post('id');
        $detail = $this->accessary_model->get_by_id($id);
        $data = array('is_deleted' => 1);
        $update = $this->accessary_model->common_update($id, $data);
        if($update == 1){
        	if(file_exists('assets/upload/'. $this->data['controller'] .'/pdf/'.$detail['file'])){
                unlink('assets/upload/'. $this->data['controller'] .'/pdf/'.$detail['file']);
            }
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
    }


	public function check_img($filename, $filesize){
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            redirect('admin/'.$this->data['controller']);
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/'.$this->data['controller']);
        }
    }

    public function check_file(){
	    $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn ảnh.');
	    if (empty($_FILES['image']['name'])) {
	            return false;
	        }else{
	            return true;
	        }
	}

	public function check_file_pdf(){
	    $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn file.');
	    if (empty($_FILES['image']['name'])) {
	            return false;
	        }else{
	            return true;
	        }
	}
}