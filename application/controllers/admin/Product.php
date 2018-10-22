<?php 

/**
* 
*/
class Product extends Admin_Controller{
    private $request_language_template = array(
        'title', 'design', 'technology', 'untilities', 'version', 'metadescription', 'metakeywords', 'mass', 'size', 'distance', 'altitude','brightinterval', 'fuelrange', 'fronttiresize', 'forks', 'afterwards', 'engine', 'cylindercapacity','piston','compressionratio','maximumpower','torque' ,'capacity','motion','bootsystem'
    );
    // private $request_language_template_tour = array(
    //     'title', 'content'
    // );
    private $request_vehicles = array(
        'Chọn phương tiện','Không xác định','Máy bay','Tàu thủy','Tàu hỏa','Ô tô','Xe máy','Xe đạp','Đi bộ'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->load->model('localtion_model');
        $this->load->model('area_model');
        $this->load->model('tour_date_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        // $this->data['request_language_template_tour'] = $this->request_language_template_tour;
        $this->data['request_vehicles'] = $this->request_vehicles;
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
        $this->data['result'] = $this->product_model->get_all_with_pagination_search('desc','vi' , $per_page, $this->data['page'], $this->data['keyword']);
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
            $this->content_column('design');
            $this->content_column('technology');
            $this->content_column('untilities');
            $this->version_column();

            if($this->input->post('parent_id_shared') == '' || $this->input->post('title_vi') == '' || $this->input->post('title_en') == ''){
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR_VALIDATE);
            }

            $slug = $this->input->post('slug_shared');
            $unique_slug = $this->product_model->build_unique_slug($slug);
            if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug)) {
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
            }
            $design_img = array();
            $technology_img = array();
            $untilities_img = array();
            if($this->input->post('design_img') !== null){
                $design_img = $this->input->post('design_img');
            }
            if($this->input->post('technology_img') !== null){
                $technology_img = $this->input->post('technology_img');
            }
            if($this->input->post('untilities_img') !== null){
                $untilities_img = $this->input->post('untilities_img');
            }

            if(!empty($_FILES['image_shared']['name'][0])){
                $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
            }
            if(!empty($_FILES['banner_shared']['name'][0])){
                $this->check_imgs($_FILES['banner_shared']['name'], $_FILES['banner_shared']['size']);
            }
            if(!empty($_FILES['design_img']['name'][0])){
                $this->check_imgs($_FILES['design_img']['name'], $_FILES['design_img']['size']);
            }
            if(!empty($_FILES['technology_img']['name'][0])){
                $this->check_imgs($_FILES['technology_img']['name'], $_FILES['technology_img']['size']);
            }
            if(!empty($_FILES['untilities_img']['name'][0])){
                $this->check_imgs($_FILES['untilities_img']['name'], $_FILES['untilities_img']['size']);
            }
            $version_img = array();
            $version_icon = array();
            for ($i=0; $i < $this->input->post('number_version'); $i++) { 
                if(!empty($_FILES['version'.($i+1).'_img']['name'][0])){
                    $this->check_imgs($_FILES['version'.($i+1).'_img']['name'], $_FILES['version'.($i+1).'_img']['size']);
                }
                if(!empty($_FILES['version'.($i+1).'_icon']['name'][0])){
                    $this->check_imgs($_FILES['version'.($i+1).'_icon']['name'], $_FILES['version'.($i+1).'_icon']['size']);
                }
                $version_img[$i] = array();
                if($this->input->post('version'.($i+1).'_img') !== null){
                    $version_img[$i] = $this->input->post('version'.($i+1).'_img');
                }
                $version_icon[$i] = array();
                if($this->input->post('version'.($i+1).'_icon') !== null){
                    $version_icon[$i] = $this->input->post('version'.($i+1).'_icon');
                }
            }
            $image = array();
            if(!empty($_FILES['image_shared']['name'][0])){
                $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
            }
            $banner = array();
            if(!empty($_FILES['banner_shared']['name'][0])){
                $banner = $this->upload_file('./assets/upload/product/'.$unique_slug, 'banner_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
            }

            $image_design_full = $this->update_img('design_img', 'designtitle_vi', $unique_slug, $design_img);
            $image_technology_full = $this->update_img('technology_img','technologytitle_vi', $unique_slug , $technology_img);
            $image_untilities_full = $this->update_img('untilities_img','untilitiestitle_vi', $unique_slug , $untilities_img);
            $img_version_full = array();
            $icon_version_full = array();
            $color_code = array();
            for ($i=0; $i < $this->input->post('number_version'); $i++) { 
                $img_version_full[] = $this->update_img('version'.($i+1).'_img','version'.($i+1).'title_vi', $unique_slug , $version_img[$i]);
                $icon_version_full[] = $this->update_img('version'.($i+1).'_icon','version'.($i+1).'title_vi', $unique_slug , $version_icon[$i]);
                $color_code[] =  $this->input->post('version'.($i+1).'_code');
            }

            $shared_request = array(
                'slug' => $unique_slug,
                'product_category_id' => $this->input->post('parent_id_shared'),
                'image' => json_encode($image),
                'banner' => json_encode($banner),
                'design_img' => json_encode($image_design_full),
                'technology_img' => json_encode($image_technology_full),
                'untilities_img' => json_encode($image_untilities_full),
                'version_img' => json_encode($img_version_full),
                'version_icon' => json_encode($icon_version_full),
                'product_code' => json_encode($color_code),
                'title' => $this->input->post('title'), 
                'design' => $this->input->post('design'), 
                'technology' => $this->input->post('technology'), 
                'untilities' => $this->input->post('untilities'), 
                'version' => $this->input->post('version'), 
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
                'bootsystem' => $this->input->post('bootsystem')
            );
            $this->db->trans_begin();
            $insert = $this->product_model->common_insert(array_merge($shared_request,$this->author_data));
            if($insert){
                $requests = handle_multi_language_request('product_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                $this->product_model->insert_with_language($requests);
            }
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
            } else {
                $this->db->trans_commit();
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);
            }
        }
        $this->render('admin/product/create_product_view');
    }
    public function detail($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){

                $this->load->helper('form');
                $this->load->library('form_validation');
                $product = $this->product_model->find($id);

                $product['image'] = json_decode($product['image']);
                $product['banner'] = json_decode($product['banner']);
                $product['design_img'] = json_decode($product['design_img']);
                $product['technology_img'] = json_decode($product['technology_img']);
                $product['untilities_img'] = json_decode($product['untilities_img']);
                $product['version_img'] = json_decode($product['version_img'],true);
                $product['version_icon'] = json_decode($product['version_icon'],true);
                $product['product_code'] = json_decode($product['product_code']);
                $product_lang = $this->product_model->find_lang($id);
                foreach ($this->page_languages as $key => $value) {
                    if($product_lang[$key]['language'] == 'vi'){
                        $product_lang['vi'] = $product_lang[$key];
                    }else{
                        $product_lang['en'] = $product_lang[$key];
                    }
                }
                foreach ($this->page_languages as $key => $value) {
                    $product_lang[$value]['design'] = json_decode($product_lang[$value]['design'],true);
                    $product_lang[$value]['technology'] = json_decode($product_lang[$value]['technology'],true);
                    $product_lang[$value]['untilities'] = json_decode($product_lang[$value]['untilities'],true);
                    $product_lang[$value]['version'] = json_decode($product_lang[$value]['version'],true);
                }
                $parent_title = $this->build_parent_title($product['product_category_id']);
                $product['parent_title'] = $parent_title;
                $this->data['product'] = $product;
                $this->data['product_lang'] = $product_lang;
                $this->render('admin/product/detail_product_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    public function ajax_form($numberdate,$numbercurrent = 0){
        $reponse = '';
        for ($i=$numbercurrent; $i < $numberdate; $i++) {
            $reponse .='<div role="tabpanel" class="tab-pane active" id="'.$i.'"><div class="title-content-date showdate '.$i.'">';
            $reponse .= '<div class="btn btn-primary col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#showdatecontent_'.$i.'" aria-expanded="true" aria-controls="messageContent" style="padding:10px 0px;margin-bottom:3px;">';
            $reponse .= '<div class="col-xs-11">Nội dung Đầy đủ Ngày '.($i+1).'</div>';
            $reponse .= '</div>';
            $reponse .= '<div class="no_border"><div class="collapse in" id="showdatecontent_'.$i.'">';
            $reponse .= '<div class="col-xs-12 title-content-date date " style="margin-top:-5px;">';
            $reponse .= form_label('Hình ảnh ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
            $reponse .= form_upload('img_date_'.$i.'[]',"",'class="form-control" id="img_date_'.$i.'"');
            $reponse .= form_label('Chọn khu vực ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');

            $reponse .= '<select class="form-control select2 select2-hidden-accessible" name="parengoplace_'.$i.'"   multiple="" readonly data-idlocaltion="'.$i.'" style="width: 100%;" data-placeholder="Select a State" style="width: 100%;min-height:34px;min-width:300px;" tabindex="-1" aria-hidden="true"  id="paren-go-place_'.$i.'">';
            $reponse .= $this->area_selected();
            $reponse .= '</select>';
            $reponse .= form_label('Chọn những nơi đến ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
            $reponse .= '<select class="form-control select2 select2-hidden-accessible" name="goplace_'.$i.'" multiple="" data-placeholder="Select a State" style="width: 100%;min-height:34px;min-width:300px;" tabindex="-1" aria-hidden="true" id="go-place_'.$i.'">';
            $reponse .= '</select>';
            $reponse .= form_label('Phương tiện đi ngày '.($i+1), 'vehicles');
            $reponse .= form_error('vehicles');
            $reponse .= form_dropdown('vehicles_'.$i, $this->data['request_vehicles'],0, 'class="form-control" id="vehicles_'.$i.'"');
            $reponse .= '<div style="margin-top: 10px;"><ul class="nav nav-pills nav-justified language" role="tablist">';
            $number = 0;
            foreach ($this->data['page_languages'] as $key => $value) {
                $active = ($number == 0)?'active':'';
                $reponse .='<li role="presentation" class="'.$active.'"><a href="#'.$key.$i.'" aria-controls="'.$key.$i.'" role="tab" data-toggle="tab"><span class="badge">'.($number + 1).'</span>'.$value.'</a></li>';
                $number++;
            }
            $number = 0;
            $reponse .= '<ul></div><div class="tab-content">';
            foreach ($this->data['page_languages'] as $key => $value) {
                $active = ($number == 0)?'active':'';
                $reponse .= '<div role="tabpanel" class="tab-pane '.$active.'" id="'.$key.$i.'">';
                $reponse .= '<div class="col-xs-12" style="padding:0px">';
                $reponse .= form_label(($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1), 'title_date_'.$i.'_'. $key,'class="title_date"   id="label_title_date_'.$key.'_'.$i.'" ');
                $reponse .= form_error('title_date_'.$i.'_'. $key);
                $reponse .= form_input('title_date_'.$i.'_'. $key,"", 'class="form-control" id="title_date_'.$key.'_'.$i.'"');
                $reponse .= form_label(($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1),'content_date_'.$i.'_'. $key,'class="content_date"  id="label_content_date_'.$key.'_'.$i.'" ');
                $reponse .= form_error('content_date_'.$i.'_'. $key);
                $reponse .= form_textarea('content_date_'.$i.'_'. $key,"", 'class="tinymce-area form-control" id="content_date_'.$key.'_'.$i.'" rows="3"');
                $reponse .= '</div></div>';

                $number++;
            }
                $reponse .= '</div></div></div></div></div></div>';
        }
        return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);    
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
            $product['design_img'] = json_decode($product['design_img']);
            $product['technology_img'] = json_decode($product['technology_img']);
            $product['untilities_img'] = json_decode($product['untilities_img']);
            $product['version_img'] = json_decode($product['version_img'],true);
            $product['version_icon'] = json_decode($product['version_icon'],true);
            $product['product_code'] = json_decode($product['product_code']);
            $product_lang = $this->product_model->find_lang($id);
            foreach ($this->page_languages as $key => $value) {
                if($product_lang[$key]['language'] == 'vi'){
                    $product_lang['vi'] = $product_lang[$key];
                }else{
                    $product_lang['en'] = $product_lang[$key];
                }
            }
            foreach ($this->page_languages as $key => $value) {
                $product_lang[$value]['design'] = json_decode($product_lang[$value]['design'],true);
                $product_lang[$value]['technology'] = json_decode($product_lang[$value]['technology'],true);
                $product_lang[$value]['untilities'] = json_decode($product_lang[$value]['untilities'],true);
                $product_lang[$value]['version'] = json_decode($product_lang[$value]['version'],true);
            }
            $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
            $this->build_new_category($product_category,0,$this->data['product_category'],$product['product_category_id']);
            $this->data['product'] = $product;
            $this->data['product_lang'] = $product_lang;

            if($this->input->post()){
                if($this->check_all_file_img($_FILES) === false){
                    return false;
                }
                $this->content_column('design');
                $this->content_column('technology');
                $this->content_column('untilities');
                $this->version_column();

                if($this->input->post('parent_id_shared') == '' || $this->input->post('title_vi') == '' || $this->input->post('title_en') == ''){
                            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR_VALIDATE);
                }

                $unique_slug = $product['slug'];
                if($unique_slug !== $this->input->post('slug_shared')){
                    $unique_slug = $this->product_model->build_unique_slug($this->input->post('slug_shared'));
                    if(file_exists("assets/upload/product/".$product['slug'])) {
                        rename("assets/upload/product/".$product['slug'], "assets/upload/product/".$unique_slug);
                    }
                }

                $design_img = array();
                $technology_img = array();
                $untilities_img = array();
                if($this->input->post('design_img') !== null){
                    $design_img = $this->input->post('design_img');
                }
                if($this->input->post('technology_img') !== null){
                    $technology_img = $this->input->post('technology_img');
                }
                if($this->input->post('untilities_img') !== null){
                    $untilities_img = $this->input->post('untilities_img');
                }

                // if(!empty($_FILES['image_shared']['name'][0])){
                //     $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                // }
                // if(!empty($_FILES['banner_shared']['name'][0])){
                //     $this->check_imgs($_FILES['banner_shared']['name'], $_FILES['banner_shared']['size']);
                // }
                // if(!empty($_FILES['design_img']['name'][0])){
                //     $this->check_imgs($_FILES['design_img']['name'], $_FILES['design_img']['size']);
                // }
                // if(!empty($_FILES['technology_img']['name'][0])){
                //     $this->check_imgs($_FILES['technology_img']['name'], $_FILES['technology_img']['size']);
                // }
                // if(!empty($_FILES['untilities_img']['name'][0])){
                //     $this->check_imgs($_FILES['untilities_img']['name'], $_FILES['untilities_img']['size']);
                // }
                $version_img = array();
                $version_icon = array();
                for ($i=0; $i < $this->input->post('number_version'); $i++) { 
                    // if(!empty($_FILES['version'.($i+1).'_img']['name'][0])){
                    //     $this->check_imgs($_FILES['version'.($i+1).'_img']['name'], $_FILES['version'.($i+1).'_img']['size']);
                    // }
                    // if(!empty($_FILES['version'.($i+1).'_icon']['name'][0])){
                    //     $this->check_imgs($_FILES['version'.($i+1).'_icon']['name'], $_FILES['version'.($i+1).'_icon']['size']);
                    // }
                    $version_img[$i] = array();
                    if($this->input->post('version'.($i+1).'_img') !== null){
                        $version_img[$i] = $this->input->post('version'.($i+1).'_img');
                    }
                    $version_icon[$i] = array();
                    if($this->input->post('version'.($i+1).'_icon') !== null){
                        $version_icon[$i] = $this->input->post('version'.($i+1).'_icon');
                    }
                }
                $image = array();
                if(!empty($_FILES['image_shared']['name'][0])){
                    $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                }
                $banner = array();
                if(!empty($_FILES['banner_shared']['name'][0])){
                    $banner = $this->upload_file('./assets/upload/product/'.$unique_slug, 'banner_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                }

                $image_design_full = $this->update_data_img($this->update_img('design_img', 'designtitle_vi', $unique_slug, $design_img, $product['design_img']), $product['design_img'], 'titledesign_vi');
                $image_technology_full = $this->update_data_img($this->update_img('technology_img','technologytitle_vi', $unique_slug , $technology_img, $product['technology_img']), $product['technology_img'], 'titletechnology_vi');
                $image_untilities_full = $this->update_data_img($this->update_img('untilities_img','untilitiestitle_vi', $unique_slug , $untilities_img, $product['untilities_img']), $product['untilities_img'], 'titleuntilities_vi');
                $img_version_full = array();
                $icon_version_full = array();
                $color_code = array();
                for ($i=0; $i < $this->input->post('number_version'); $i++) { 
                    $img_version_full[] = $this->update_data_img($this->update_img('version'.($i+1).'_img','version'.($i+1).'title_vi', $unique_slug , $version_img[$i], $product['version_img'][$i]),$product['version_img'][$i],'version'.($i+1).'title_vi');
                    $icon_version_full[] = $this->update_data_img($this->update_img('version'.($i+1).'_icon','version'.($i+1).'title_vi', $unique_slug , $version_icon[$i], $product['version_icon'][$i]),$product['version_icon'][$i],'version'.($i+1).'title_vi');
                    $color_code[] =  $this->input->post('version'.($i+1).'_code');
                }

                $shared_request = array(
                    'product_category_id' => $this->input->post('parent_id_shared'),
                    'design_img' => json_encode($image_design_full),
                    'technology_img' => json_encode($image_technology_full),
                    'untilities_img' => json_encode($image_untilities_full),
                    'version_img' => json_encode($img_version_full),
                    'version_icon' => json_encode($icon_version_full),
                    'product_code' => json_encode($color_code),
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
                $this->db->trans_begin();
                $update = $this->product_model->common_update($id,array_merge($shared_request,$this->author_data));
                if($update){
                    $requests = handle_multi_language_request('product_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                    foreach ($requests as $key => $value) {
                        $this->product_model->update_with_language($id, $requests[$key]['language'],$value);
                    }
                }
                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                } else {
                    $this->db->trans_commit();
                    if(isset($dateimage_json) && !empty($this->data['detail']['dateimg'])) {
                        $this->remove_img_date($this->input->post('datetitle_vi'),$dateimg_array,$unique_slug,$img_array);
                    }
                    if(isset($localtionimage) && !empty($this->data['detail']['imglocaltion'])) {
                        $this->remove_img($unique_slug,$this->data['detail']['imglocaltion']);
                    }
                    if(isset($image) && !empty($this->data['detail']['image'])) {
                        $this->remove_img($unique_slug,$this->data['detail']['image']);
                    }
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                    
                }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/product/edit_product_view');
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
        if($parent_id != 0){
            $title = $sub['vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
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
            $new_map[] = $value[1];
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
            $result.='<option value="'.$value['id'].'"'.$select.'>'.$char.$value['vi'].'</option>';
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
        if (empty($data_img)) {
            if ($this->input->post($title) !== null) {
                if(!empty($_FILES[$file_name]['name'][0])){
                    $image_data = $this->upload_file('./assets/upload/product/'.$unique_slug, $file_name, 'assets/upload/product/'. $unique_slug .'/thumb');
                    for ($i=0; $i < count($this->input->post($title)); $i++) { 
                        if(array_key_exists($i,array_flip($img_array))){
                            $image_data_full[] = "";
                        }else{
                            $image_data_full[] = array_shift($image_data);
                        }
                    }
                }else{
                    for ($i=0; $i < count($this->input->post($title)); $i++) {
                        $image_data_full[] = "";
                    }
                }
            }
        }else{
            if(!empty($_FILES[$file_name]['name'][0])){
                $image_data = $this->upload_file('./assets/upload/product/'.$unique_slug, $file_name, 'assets/upload/product/'. $unique_slug .'/thumb');
                for ($i=0; $i < count($this->input->post($title)); $i++) { 
                    if(array_key_exists($i,array_flip($img_array))){
                        $image_data_full[] = (isset($data_img[$i])) ? $data_img[$i] : "";
                    }else{
                        $image_data_full[] = array_shift($image_data);
                    }
                }
            }
        }
        return $image_data_full;
    }


    function update_data_img($img, $data_img, $title){
        if(!empty($img)){
            return $img;
        }else{
            return array_slice($data_img, 0,count($this->input->post($title)));
        }
    }

    function content_column($name){
        if ($this->input->post($name.'title') !== null) {
                for ($i=0; $i < count($this->input->post($name.'title')); $i++) {
                    $_POST[$name][] = array(
                        'title' => $this->input->post($name.'title')[$i],
                        'content' => $this->input->post($name.'content')[$i],
                    );
                }
        }
    }

    function version_column($name = 'version'){
        if ($this->input->post($name.'title') !== null) {
            for ($i=0; $i < count($this->input->post($name.'title')); $i++) {
                $content = array();
                if ($this->input->post($name.($i+1).'title') !== null) {
                    for ($j=0; $j < count($this->input->post($name.($i+1).'title')); $j++) { 
                        $content[$j] = array('title' => $this->input->post($name.($i+1).'title')[$j]);
                    }
                }
                $_POST[$name][] = array(
                    'title' => $this->input->post($name.'title')[$i],
                    'content' => $content,
                );
            }
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