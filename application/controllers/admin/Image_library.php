<?php 

/**
 * 
 */
class Image_library extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('image_library_model');
		$this->data['controller'] = 'image_library';
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
        $total_rows  = $this->image_library_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->image_library_model->count_search($keywords);
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

        $result = $this->image_library_model->get_all_with_pagination_search('desc', $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->image_library_model->get_all_with_pagination_search('desc', $per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;
		$this->render('admin/'.$this->data['controller'].'/list_image_library_view');
	}

	public function create()
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('image', 'Ảnh đại diện', 'callback_check_file');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/'.$this->data['controller'].'/create_image_library_view');
        } else {
        	if($this->input->post()){
                if(!empty($_FILES['image']['name'])){
                    $this->check_imgs($_FILES['image']['name'], $_FILES['image']['size']);
                }
            	$slug = $this->input->post('slug');
                $unique_slug = $this->image_library_model->build_unique_slug($slug);
                if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug)){
	                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
	            }
                $images = $this->upload_multiple_image('image', 'assets/upload/'. $this->data['controller'] .'/'.$unique_slug);
                $image_json = json_encode($images);
                $shared_request = array(
                    'slug' => $unique_slug,
                    'image' => $image_json,
                    'avatar' => $images[0],
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $insert = $this->image_library_model->common_insert($shared_request);
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'], 'refresh');
                }else {
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'. $this->data['controller'] .'/create_image_library_view');
                }
        	}
        }
	}


	public function detail($id)
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->image_library_model->get_by_id($id);
        $this->data['detail'] = $detail;
		$this->render('admin/'. $this->data['controller'] .'/detail_image_library_view');
	}

	public function edit($id)
	{
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');

        $detail = $this->image_library_model->get_by_id($id);
        $this->data['detail'] = $detail;

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/'. $this->data['controller'] .'/edit_image_library_view');
        } else {
            if($this->input->post()){
                if(!empty($_FILES['image']['name'])){
                    $this->check_imgs($_FILES['image']['name'], $_FILES['image']['size']);
                }
                $slug = $this->input->post('slug');
                $unique_slug = $this->image_library_model->build_unique_slug($slug, $id);
                if ($unique_slug != $detail['slug']) {
                	if(file_exists("assets/upload/product/".$detail['slug'])) {
                        rename("assets/upload/". $this->data['controller'] ."/".$detail['slug'], "assets/upload/". $this->data['controller'] ."/".$unique_slug);
                    }
                }
                $images = $this->upload_multiple_image('image', 'assets/upload/'. $this->data['controller'] .'/'.$unique_slug);
                $shared_request = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                if($images){
                	$image_old = json_decode($detail['image']);
                	$image_new = array_merge($image_old, $images);
                    $shared_request['image'] = json_encode($image_new);
                }
                $update = $this->image_library_model->common_update($id, $shared_request);
                if($update){
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }else {
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                    $this->render('admin/'. $this->data['controller'] .'/edit/'.$id);
                }
            }
        }
	}

	public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $detail = $this->image_library_model->get_by_id($id);
        $update = $this->image_library_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if(file_exists('assets/upload/'. $this->data['controller'] .'/' . $detail['slug'])){
                array_map('unlink', glob('./assets/upload/'. $this->data['controller'] .'/'.$detail['slug'].'/*.*'));
                rmdir('./assets/upload/'. $this->data['controller'] .'/'.$detail['slug']);
            }
            return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
    }

	public function remove_image()
	{
		$id = $this->input->post('id');
        $image = $this->input->post('image');
        $detail = $this->image_library_model->get_by_id($id);
        if ($image == $detail['avatar']) {
        	$reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
        	return $this->return_api(HTTP_SUCCESS, 'Avatar không được xóa', $reponse, false);
        }else{
        	$upload = [];
	        $upload = json_decode($detail['image']);
	        $key = array_search($image, $upload);
	        unset($upload[$key]);
	        $newUpload = [];
	        foreach ($upload as $key => $value) {
	            $newUpload[] = $value;
	        }
	        
	        $image_json = json_encode($newUpload);
	        $data = array('image' => $image_json);

	        $update = $this->image_library_model->common_update($id, $data);

	        if($update == 1){
	            $reponse = array(
	                'csrf_hash' => $this->security->get_csrf_hash()
	            );
	            if($image != '' && file_exists('assets/upload/'. $this->data['controller'] .'/'.$detail['slug'].'/'.$image)){
	                unlink('assets/upload/'. $this->data['controller'] .'/'.$detail['slug'].'/'.$image);
	            }
	            return $this->return_api(HTTP_SUCCESS, '', $reponse);
	        }
	        return $this->return_api(HTTP_BAD_REQUEST);
        }
        
	}

	public function active_image()
	{
		$id = $this->input->post('id');
        $image = $this->input->post('image');
        $data = array('avatar' => $image);
        $update = $this->image_library_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->return_api(HTTP_SUCCESS, '', $reponse);
        }
        return $this->return_api(HTTP_BAD_REQUEST);
	}

	protected function check_imgs($filename, $filesize){
        $images = array('jpg', 'jpeg', 'png', 'gif');
        foreach ($filename as $key => $value) {
            $map[] = explode('.',$value);
        }
        foreach ($map as $key => $value) {
            $new_map[] = $value[1];
        }
        if(array_diff($new_map, $images) != null){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
        $image_size = array('success');

        foreach ($filesize as $key => $value) {
            if ($value > 1228800) {
                $check_size[] = 'error';
            }else{
                $check_size[] = 'success';
            }
        }
        if (array_diff($check_size, $image_size) != null) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
    }

	public function check_file(){
	    $this->form_validation->set_message(__FUNCTION__, 'Vui lòng chọn ảnh.');
	    if (empty($_FILES['image']['name'][0])) {
	            return false;
	        }else{
	            return true;
	        }
	}
}