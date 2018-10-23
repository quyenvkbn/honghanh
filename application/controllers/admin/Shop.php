<?php 

/**
 * 
 */
class Shop extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('shop_model');
		$this->load->model('shop_type_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['controller'] = 'shop';
		$this->author_data = handle_author_common_data();
	}

	public function index(){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->shop_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->shop_model->count_search($keywords);
        }

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

        $result = $this->shop_model->get_all_with_pagination_search('desc', $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->shop_model->get_all_with_pagination_search('desc', $per_page, $this->data['page'], $keywords);
        }
        foreach ($result as $key => $value) {
            $shop_type_title = $this->build_shop_type_title($value['shop_type_id']);
            $result[$key]['shop_type_title'] = $shop_type_title;
        }
        $this->data['result'] = $result;
        
        
        $this->render('admin/'.$this->data['controller'].'/list_shop_view');
    }

	public function create()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $shop_type = $this->shop_type_model->get_all();
        $this->data['shop_type'] = $shop_type;

        
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('shop_type_id', 'Loại cửa hàng', 'required');
        $this->form_validation->set_rules('address', 'Địa Chỉ', 'required');
        $this->form_validation->set_rules('image', 'Ảnh đại diện', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/'.$this->data['controller'].'/create_shop_view');
        } else {
        	if($this->input->post()){
                if(!empty($_FILES['image']['name'])){
                    $this->check_img($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/'. $this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');

                $shared_request = array(
                    'image' => $image,
                    'title' => $this->input->post('title'),
                    'shop_type_id' => $this->input->post('shop_type_id'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $insert = $this->shop_model->common_insert($shared_request);
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'], 'refresh');
                }else {
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'.$this->data['controller'].'/create_shop_view');
                }
        	}
        }
	}

	public function edit($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->shop_model->get_by_id($id);
        $shop_type = $this->shop_type_model->get_all();
        $this->data['shop_type'] = $shop_type;
        
        $this->data['detail'] = $detail;
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('shop_type_id', 'Loại cửa hàng', 'required');
        $this->form_validation->set_rules('address', 'Địa Chỉ', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/'.$this->data['controller'].'/edit_shop_view');
        } else {
            if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/'. $this->data['controller'] .'', 'assets/upload/'. $this->data['controller'] .'/thumb');
                    $shared_request = array(
                        'title' => $this->input->post('title'),
	                    'shop_type_id' => $this->input->post('shop_type_id'),
	                    'address' => $this->input->post('address'),
	                    'phone' => $this->input->post('phone'),
	                    'email' => $this->input->post('email'),
	                    'created_at' => $this->author_data['created_at'],
	                    'created_by' => $this->author_data['created_by'],
	                    'updated_at' => $this->author_data['updated_at'],
	                    'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $update = $this->shop_model->common_update($id, $shared_request);
                    if($update){
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if($image != '' && $image != $detail['image'] && file_exists('assets/upload/'. $this->data['controller'] .'/'.$detail['image'])){
                            unlink('assets/upload/'. $this->data['controller'] .'/'.$detail['image']);
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
        $data = array('is_deleted' => 1);
        $update = $this->shop_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
    }

	protected function check_img($filename, $filesize){
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

	protected function build_shop_type_title($shop_type_id){
        $sub = $this->shop_type_model->get_by_id($shop_type_id);
        $title = $sub['title'];
        return $title;
    }
}