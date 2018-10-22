<?php 

/**
* 
*/
class Post extends Admin_Controller{
    private $author_data = array();
    private $controller = '';

	function __construct(){
		parent::__construct();
		$this->load->model('post_model');
        $this->load->model('post_category_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->controller = 'post';
        $this->data['controller'] = $this->controller;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->post_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->post_model->count_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/'. $this->controller .'/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result = $this->post_model->get_all_with_pagination_search('desc', $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->post_model->get_all_with_pagination_search('desc', $per_page, $this->data['page'], $keywords);
        }
        foreach ($result as $key => $value) {
            $parent_title = $this->build_parent_title($value['post_category_id']);
            $result[$key]['parent_title'] = $parent_title;
        }
        $this->data['result'] = $result;
        
        
        $this->render('admin/post/list_post_view');
    }

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $post_category = $this->post_category_model->get_by_parent_id(null,'asc');
        $this->data['post_category'] = $post_category;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('parent_id_shared', 'Danh mục', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/post/create_post_view');
        } else {
        	if($this->input->post()){
                if(!empty($_FILES['image_shared']['name'])){
                    $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
            	$slug = $this->input->post('slug_shared');
                $unique_slug = $this->post_model->build_unique_slug($slug);
                $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/'. $this->controller, 'assets/upload/'.$this->controller.'/thumb');

                $shared_request = array(
                    'slug' => $unique_slug,
                    'image' => $image,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'post_category_id' => $this->input->post('parent_id_shared'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $insert = $this->post_model->common_insert($shared_request);
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->controller, 'refresh');
                }else {
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/'. $this->controller .'/create_post_category_view');
                }
        	}
        }
        
	}

    public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('comment_model');
        $this->load->library('pagination');
        $per_page = 5;
        $total_rows  = $this->comment_model->count_search_without_by_product_id($id,1);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/detail/'. $id), $total_rows, $per_page, 5);
        $this->data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['comments'] = $this->comment_model->get_all_by_product_id($id , $per_page, $this->data['page'],1);

        $detail = $this->post_model->get_by_id($id);
        $parent_title = $this->build_parent_title($detail['post_category_id']);
        $detail['parent_title'] = $parent_title;

        $this->data['detail'] = $detail;
        
        

        $this->render('admin/post/detail_post_view');
    }

    public function edit($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->post_model->get_by_id($id);
        $category = $this->post_category_model->get_by_parent_id(null,'asc');
        
        $this->data['category'] = $category;
        
        $this->data['detail'] = $detail;
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/post/edit_post_view');
        } else {
            if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug_shared');
                    $unique_slug = $this->post_model->build_unique_slug($slug, $id);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/'. $this->controller .'', 'assets/upload/'. $this->controller .'/thumb');
                    $shared_request = array(
                        'slug' => $unique_slug,
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'post_category_id' => $this->input->post('parent_id_shared'),
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $update = $this->post_model->common_update($id, $shared_request);
                    if($update){
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if($image != '' && $image != $detail['image'] && file_exists('assets/upload/'. $this->controller .'/'.$detail['image'])){
                            unlink('assets/upload/'. $this->controller .'/'.$detail['image']);
                        }
                        redirect('admin/'. $this->controller .'', 'refresh');
                    }else {
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        $this->render('admin/'. $this->controller .'/edit/'.$id);
                    }
                }else{
                    $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/'. $this->controller .'');
                }
            }
        }
    }


    public function active(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $post = $this->post_model->find($id);
            $post_category = $this->post_category_model->find($post['post_category_id']);
            if($post_category['is_activated'] == 1){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404,'message' => MESSAGE_ERROR_ACTIVE_POST)));
            }
            if($this->post_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->post_model->common_update($id,array_merge(array('is_activated' => 0),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    public function deactive(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->post_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->post_model->common_update($id,array_merge(array('is_activated' => 1),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->post_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
    }


    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->post_category_model->get_by_id($parent_id);
        if($parent_id != 0){
            $title = $sub['title'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
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

}