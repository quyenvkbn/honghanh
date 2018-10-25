<?php 

/**
* 
*/
class Motor extends Admin_Controller{
    private $author_data = array();
    private $remove_image_product_all = array();
    private $price_product_all = array();

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
        $this->load->model('product_category_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['template'] = build_template();
        $this->data['controller'] = $this->product_model->table;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->product_model->count_search($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->product_model->get_all_with_pagination_search('desc' , $per_page, $this->data['page'], $this->data['keyword']);
        foreach ($this->data['result'] as $key => $value) {
            $parent_title = $this->build_parent_title($value['product_category_id']);
            $this->data['result'][$key]['parent_title'] = $parent_title;
        }
        $this->render('admin/product/list_product_view');
    }

    public function create(){
        $this->load->helper('form');
        $product_category = $this->product_category_model->get_by_parent_id(null,'asc');
        $this->build_new_category($product_category,0,$this->data['product_category']);
        if($this->input->post()){
            if($this->check_all_file_img($_FILES) === false){
                return false;
            }
            if($this->input->post('parent_id_shared') == '' || $this->input->post('title') == ''){
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR_VALIDATE);
            }
            $slug = $this->input->post('slug_shared');
            $unique_slug = $this->product_model->build_unique_slug($slug);
            if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug)) {
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
            }
            $design_img = array();
            if($this->input->post('design_img') !== null){
                $design_img = $this->input->post('design_img');
            }
            $version_img = array();
            if($this->input->post('version_img') !== null){
                $version_img = $this->input->post('version_img');
            }

            $image = array();
            if(!empty($_FILES['image_shared']['name'][0])){
                $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
            }
            $banner = array();
            if(!empty($_FILES['banner_shared']['name'][0])){
                $banner = $this->upload_file('./assets/upload/product/'.$unique_slug, 'banner_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
            }
            $image_design_full = $this->update_img('design_img', 'designtitle', $unique_slug, $design_img);
            $img_version_full = $this->update_img('version_img','titleversion', $unique_slug , $version_img);
            $this->version_column('version', $img_version_full);
            $this->content_column('design',$image_design_full);

            $shared_request = array(
                'slug' => $unique_slug,
                'product_category_id' => $this->input->post('parent_id_shared'),
                'image' => json_encode($image),
                'banner' => json_encode($banner),
                'title' => $this->input->post('title'), 
                'description' => $this->input->post('description'), 
                'design' => json_encode($this->input->post('design')), 
                'version' => json_encode($this->input->post('version')), 
                'metadescription' => $this->input->post('metadescription'), 
                'metakeywords' => $this->input->post('metakeywords'), 
                'mass' => $this->input->post('mass'), 
                'size' => $this->input->post('size'), 
                'distance' => $this->input->post('distance'), 
                'altitude' => $this->input->post('altitude'),
                'brightinterval' => $this->input->post('brightinterval'), 
                'fuelrange' => $this->input->post('fuelrange'), 
                'fronttiresize' => $this->input->post('fronttiresize'), 
                'forks' => $this->input->post('forks'), 
                'afterwards' => $this->input->post('afterwards'), 
                'engine' => $this->input->post('engine'), 
                'cylindercapacity' => $this->input->post('cylindercapacity'),
                'piston' => $this->input->post('piston'),
                'compressionratio' => $this->input->post('compressionratio'),
                'maximumpower' => $this->input->post('maximumpower'),
                'torque'  => $this->input->post('torque'),
                'capacity' => $this->input->post('capacity'),
                'motion' => $this->input->post('motion'),
                'bootsystem' => $this->input->post('bootsystem'),
                'design_img' => json_encode($image_design_full),
                'version_img' => json_encode($img_version_full),
                'price' => json_encode($this->price_product_all),
                'inclination' => $this->input->post('inclination'),
                'scanlength' => $this->input->post('scanlength'),
                'frontbrake' => $this->input->post('frontbrake'),
                'brakeafter' => $this->input->post('brakeafter'),
            );
            $insert = $this->product_model->common_insert(array_merge($shared_request,$this->author_data));
            if($insert){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);
            }else{
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
            }
        }
        $this->render('admin/motor/create_motor_view');
    }
    public function detail($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $product = $this->product_model->find($id);
                $product['image'] = json_decode($product['image']);
                $product['banner'] = json_decode($product['banner']);
                $product['design'] = json_decode($product['design'],true);
                $product['version'] = json_decode($product['version'],true);
                $parent_title = $this->build_parent_title($product['product_category_id']);
                $product['parent_title'] = $parent_title;
                $this->data['product'] = $product;
                $this->render('admin/motor/detail_motor_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR,$reponse);
            }
            $data = array('is_deleted' => 1);
            $update = $this->product_model->common_update($id, $data);
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    // function edit chưa xóa ảnh cần phải viết thêm
    public function edit($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $product = $this->product_model->find($id);
            
            $product['image'] = json_decode($product['image']);
            $product['banner'] = json_decode($product['banner']);
            $product['design'] = json_decode($product['design'],true);
            $product['version'] = json_decode($product['version'],true);
            $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
            $this->build_new_category($product_category,0,$this->data['product_category'],$product['product_category_id']);
            $this->data['product'] = $product;
            if($this->input->post()){
                if($this->check_all_file_img($_FILES) === false){
                    return false;
                }
                if($this->input->post('parent_id_shared') == '' || $this->input->post('title') == ''){
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR_VALIDATE);
                }
                $unique_slug = $product['slug'];
                if($unique_slug !== $this->input->post('slug_shared')){
                    $unique_slug = $this->product_model->build_unique_slug($this->input->post('slug_shared'));
                    if(file_exists("assets/upload/product/".$product['slug'])) {
                        rename("assets/upload/product/".$product['slug'], "assets/upload/product/".$unique_slug);
                    }
                }
                $product['design_img'] = array_values(array_diff(json_decode($product['design_img']), $this->input->post('remove_image')));
                $product['version_img'] = array_values(array_diff(json_decode($product['version_img']), $this->input->post('remove_image')));

                $design_img = array();
                if($this->input->post('design_img') !== null){
                    $design_img = $this->input->post('design_img');
                }

                $version_img = array();
                if($this->input->post('version_img') !== null){
                    $version_img = $this->input->post('version_img');
                }
                $image = array();
                if(!empty($_FILES['image_shared']['name'][0])){
                    $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                }
                $banner = array();
                if(!empty($_FILES['banner_shared']['name'][0])){
                    $banner = $this->upload_file('./assets/upload/product/'.$unique_slug, 'banner_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                }
                $image_design_full = $this->update_img('design_img', 'designtitle', $unique_slug, $design_img, $product['design_img']);
                $img_version_full = $this->update_img('version_img','titleversion', $unique_slug , $version_img, $product['version_img']);

                $this->version_column('version', $img_version_full);
                $this->content_column('design',$image_design_full);

                $shared_request = array(
                    'product_category_id' => $this->input->post('parent_id_shared'),
                    'title' => $this->input->post('title'), 
                    'description' => $this->input->post('description'), 
                    'design' => json_encode($this->input->post('design')), 
                    'version' => json_encode($this->input->post('version')), 
                    'metadescription' => $this->input->post('metadescription'), 
                    'metakeywords' => $this->input->post('metakeywords'), 
                    'mass' => $this->input->post('mass'), 
                    'size' => $this->input->post('size'), 
                    'distance' => $this->input->post('distance'), 
                    'altitude' => $this->input->post('altitude'),
                    'brightinterval' => $this->input->post('brightinterval'), 
                    'fuelrange' => $this->input->post('fuelrange'), 
                    'fronttiresize' => $this->input->post('fronttiresize'), 
                    'forks' => $this->input->post('forks'), 
                    'afterwards' => $this->input->post('afterwards'), 
                    'engine' => $this->input->post('engine'), 
                    'cylindercapacity' => $this->input->post('cylindercapacity'),
                    'piston' => $this->input->post('piston'),
                    'compressionratio' => $this->input->post('compressionratio'),
                    'maximumpower' => $this->input->post('maximumpower'),
                    'torque'  => $this->input->post('torque'),
                    'capacity' => $this->input->post('capacity'),
                    'motion' => $this->input->post('motion'),
                    'bootsystem' => $this->input->post('bootsystem'),
                    'design_img' => json_encode($image_design_full),
                    'version_img' => json_encode($img_version_full),
                    'price' => json_encode($this->price_product_all),
                    'inclination' => $this->input->post('inclination'),
                    'scanlength' => $this->input->post('scanlength'),
                    'frontbrake' => $this->input->post('frontbrake'),
                    'brakeafter' => $this->input->post('brakeafter'),
                );
                if($unique_slug != $product['slug']){
                    $shared_request['slug'] = $unique_slug;
                }
                if(isset($image)){
                    $shared_request['image'] = json_encode(array_merge($product['image'],$image));
                }
                if(isset($banner)){
                    $shared_request['banner'] = json_encode(array_merge($product['banner'],$banner));
                }
                $update = $this->product_model->common_update($id,array_merge($shared_request,$this->author_data));
                if($update){
                    $remove_image_product = array_merge($this->remove_image_product_all, $this->input->post('remove_image'));
                    if(!empty($remove_image_product)) {
                        foreach ($remove_image_product as $key => $value) {
                            if(!empty($value)){
                                $this->remove_img($unique_slug,$value);
                            }
                        }
                    }
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash(),
                        'design_img' => $image_design_full,
                        'version_img' => $img_version_full,
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                }else {
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                    
                }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/motor/edit_motor_view');
    }
    public function active(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $product = $this->product_model->find($id);
            $product_category = $this->product_category_model->find($product['product_category_id']);
            if($product_category['is_activated'] == 1){
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ERROR_ACTIVE_PRODUCT);
            }
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->product_model->common_update($id,array_merge(array('is_activated' => 0),$this->author_data));
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
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->product_model->common_update($id,array_merge(array('is_activated' => 1),$this->author_data));
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
    public function remove_image(){
        $id = $this->input->post('id');
        $image = $this->input->post('image');
        $detail = $this->product_model->get_by_id($id);
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

        $update = $this->product_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if($image != '' && file_exists('assets/upload/product/'.$detail['slug'].'/'.$image)){
                unlink('assets/upload/product/'.$detail['slug'].'/'.$image);
                $new_array = explode('.', $image);
                $typeimg = array_pop($new_array);
                $nameimg = str_replace(".".$typeimg, "", $image);
                if(file_exists('assets/upload/product/'.$detail['slug'].'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                    unlink('assets/upload/product/'.$detail['slug'].'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                }
            }
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }


    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->product_category_model->find($parent_id);
        return $sub['title'];
    }
    protected function check_img($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_FILE_EXTENSION_ERROR,$reponse);
        }
        if ($filesize > 1228800) {
            return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_PHOTOS_ERROR, 1200),$reponse);
        }
        return true;
    }
    protected function check_imgs($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        $images = array('jpg', 'jpeg', 'png', 'gif');
        foreach ($filename as $key => $value) {
            $map[] = explode('.',$value);
        }
        foreach ($map as $key => $value) {
            if(!empty($value[1])){
                $new_map[] = $value[1];
            }
        }
        if(array_diff($new_map, $images) != null){
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_FILE_EXTENSION_ERROR,$reponse);
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
            return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_PHOTOS_ERROR, 1200),$reponse);
        }
        return true;
    }
    function build_new_category($categorie, $parent_id = 0,&$result, $id = "",$char=""){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            $select = ($value['id'] == $id)? 'selected' : '';
            $result.='<option value="'.$value['id'].'"'.$select.'>'.$char.$value['title'].'</option>';
            $this->build_new_category($categorie, $value['id'],$result, $id, $char.'---|');
            }
        }
    }
    function remove_img_date($numberdate=array(),$dateimg_array=array(),$unique_slug = '',$dateimg= ''){
        for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) { 
            if(!array_key_exists($i,array_flip($dateimg)) && !empty($dateimg_array[$i])){
                if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$dateimg_array[$i])){
                    unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$dateimg_array[$i]);
                    $new_array = explode('.', $dateimg_array[$i]);
                    $typeimg = array_pop($new_array);
                    $nameimg = str_replace(".".$typeimg, "", $dateimg_array[$i]);
                    if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                        unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                    }
                }
            }
        }
    }
    function remove_img($unique_slug = '',$image= ''){
        if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$image)){
            unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$image);
            $new_array = explode('.', $image);
            $typeimg = array_pop($new_array);
            $nameimg = str_replace(".".$typeimg, "", $image);
            if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
            }
        }
    }

    function update_img($file_name, $title, $unique_slug, $img_array, $data_img = array()){
        $image_data_full = array();
        $check_count = ($this->input->post($title) !== null) ? count($this->input->post($title)) : 0;
        if ($check_count > 0) {
            if (empty($data_img)) {
                if(!empty($_FILES[$file_name]['name'][0])){
                    $image_data = $this->upload_file('./assets/upload/product/'.$unique_slug, $file_name, 'assets/upload/product/'. $unique_slug .'/thumb');
                    for ($i=0; $i < $check_count; $i++) { 
                        if(array_key_exists($i,array_flip($img_array))){
                            $image_data_full[] = "";
                        }else{
                            $image_data_full[] = array_shift($image_data);
                        }
                    }
                }else{
                    for ($i=0; $i < $check_count; $i++) {
                        $image_data_full[] = "";
                    }
                }
            }else{
                if(!empty($_FILES[$file_name]['name'][0])){
                    $image_data = $this->upload_file('./assets/upload/product/'.$unique_slug, $file_name, 'assets/upload/product/'. $unique_slug .'/thumb');
                    $number_image = (count($data_img) >= $check_count) ? count($data_img) : $check_count;
                    for ($i=0; $i < $number_image; $i++) {
                        if($i < $check_count) {
                            if(array_key_exists($i,array_flip($img_array))){
                                $image_data_full[] = $data_img[$i];
                            }else{
                                $image_data_full[] = array_shift($image_data);
                                if (!empty($data_img[$i])) {
                                    $this->remove_image_product_all[] = $data_img[$i];
                                }
                                
                            }
                        }
                    }
                }else{
                    for ($i=0; $i < $check_count; $i++) {
                        $image_data_full[] = isset($data_img[$i]) ? $data_img[$i] : "";
                    }
                }
            }
        }
        return $image_data_full;
    }

    function content_column($name, $image){
        if ($this->input->post($name.'title') !== null) {
                for ($i=0; $i < count($this->input->post($name.'title')); $i++) {
                    $_POST[$name][] = array(
                        'title' => $this->input->post($name.'title')[$i],
                        'content' => $this->input->post($name.'content')[$i],
                        'image' => $image[$i]
                    );
                }
        }else{
            $_POST[$name] = array();
        }
    }

    function version_column($name = 'version', $image=array()){
        if ($this->input->post('titleversion') !== null) {
            for ($i=0; $i < count($this->input->post('titleversion')); $i++) {    
                $_POST['version'][] = array(
                    'title' => $this->input->post('titleversion')[$i],
                    'code' => $this->input->post('codeversion')[$i],
                    'price' => $this->input->post('priceversion')[$i],
                    'image' => $image[$i],
                );
                $this->price_product_all[] = !empty($this->input->post('priceversion')[$i]) ? $this->input->post('priceversion')[$i] : "0";
            }
        }else{
            $_POST[$name] = array();
        }
    }

    protected function check_all_file_img($file) {
        foreach ($file as $key => $value) {
            if(is_array($value['name'])){
                if(!empty($value['name'][0])){
                    if($this->check_imgs($value['name'], $value['size']) !== true){
                        return false;
                    }
                }
            }else{
                if(!empty($value['name'])){
                    if($this->check_img($value['name'], $value['size']) !== true){
                        return false;
                    }
                }
            }
        }
        return true;
    }
}