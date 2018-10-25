<input type="hidden" name="page_languages" value='<?php echo json_encode($page_languages); ?>' placeholder="" class="form-control hidden" id="page_languages">
<style type="text/css">
    
    .remove.version.show{
        display: inline;
        color:#3366CC;
    }
    .remove.version{
        display: none;
    }
    div.btn >span.check-collapse:before {
        font-family: "Glyphicons Halflings";
        content: "\e114";
        float: left;
        margin-top: -1px;
        font-size: 1.3em;
        transition: .3s;
      }
    div.btn >span.check-collapse.collapsed:before {
        content: "\e080";
        font-size: 1.3em;
        margin-top: -1px;
        transition: .3s;
      }
</style>
<div class="content-wrapper" id="create-product-view">
    <div id="encypted_ppbtn_all"></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Sản phẩm
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('message_error'); ?>
                    </div>
                <?php endif ?>
                <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'register-form'));
                ?>
                <ul class="nav nav-tabs" role="tablist"></ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="information">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông tin cơ bản</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <div class="col-xs-12">
                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                    </br>
                                    <?php if (!empty($product['image'])): ?>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <?php foreach ($product['image'] as $key => $value): ?>
                                                <div class="col-xs-3">
                                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$product['slug'].'/'.$value) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" style="padding: 0px;" width=100% height=150px>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php else: ?>
                                        Chưa có hình ảnh nào
                                    <?php endif ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh', 'image_shared');
                                    echo form_error('image_shared');
                                    echo form_upload('image_shared[]', set_value('image_shared'), 'class="form-control" id="image_shared" multiple');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <label for="image_shared">Hình ảnh banner đang dùng</label>
                                    </br>
                                    <?php if (!empty($product['banner'])): ?>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <?php foreach ($product['banner'] as $key => $value): ?>
                                                <div class="col-xs-3">
                                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$product['slug'].'/'.$value) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" style="padding: 0px;" width=100% height=150px>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php else: ?>
                                        Chưa có hình ảnh nào
                                    <?php endif ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Banner sản phẩm', 'banner_shared');
                                    echo form_error('banner_shared');
                                    echo form_upload('banner_shared[]', set_value('banner_shared'), 'class="form-control" id="banner_shared" multiple');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Slug', 'slug_shared');
                                    echo form_error('slug_shared');
                                    echo form_input('slug_shared', $product['slug'], 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php echo form_label('Danh mục cha', 'parent_id_shared'); ?>
                                    <select name="parent_id_shared" id="parent_id_shared" class="form-control" style="margin-top: 0px">
                                        <option selected="" value="">Chọn danh mục</option>
                                        <?php echo $product_category; ?>
                                    </select>
                                </div>
                                <div>
                                    <div class="tab-content col-xs-12 date" style="padding: 0px;">
                                        <div role="tabpanel" class="tab-pane fade in active" >
                                            <div class=" col-xs-12">
                                                <?php
                                                
                                                    echo form_label('Tên sản phẩm', 'title');
                                                    echo form_error('title');
                                                    echo form_input('title', $product['title'], 'class="form-control" id="title"');
                                                ?>
                                            </div>
                                            <div class=" col-xs-12">
                                                <?php
                                                
                                                    echo form_label('Từ khóa meta', 'metakeywords');
                                                    echo form_error('metakeywords');
                                                    echo form_input('metakeywords', $product['metakeywords'], 'class="form-control" id="metakeywords"');
                                                ?>
                                            </div>
                                            <div class=" col-xs-12">
                                                <?php
                                                
                                                    echo form_label('Mô tả meta', 'metadescription');
                                                    echo form_error('metadescription');
                                                    echo form_input('metadescription', $product['metadescription'], 'class="form-control" id="metadescription"');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="specifications">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông Số kỹ thuật</h4>
                                </div>
                                <div>
                                    <div class="tab-content col-xs-12 date" style="padding: 0px;">
                                        <div role="tabpanel" class="tab-pane fade in active" id="specifications">
                                            <div class=" col-xs-12">
                                                <?php
                                                    echo form_label('Khối lượng bản thân', 'mass');
                                                    echo form_error('mass');
                                                    echo form_input('mass', $product['mass'], 'class="form-control" id="mass"');
                                                
                                                    echo form_label('Dài x Rộng x Cao', 'size');
                                                    echo form_error('size');
                                                    echo form_input('size', $product['size'], 'class="form-control" id="size"');
                                                
                                                    echo form_label('Khoảng cách trục bánh xe', 'distance');
                                                    echo form_error('distance');
                                                    echo form_input('distance', $product['distance'], 'class="form-control" id="distance"');
                                                
                                                    echo form_label('Độ cao yên', 'altitude');
                                                    echo form_error('altitude');
                                                    echo form_input('altitude', $product['altitude'], 'class="form-control" id="altitude"');
                                                
                                                    echo form_label('Khoảng sáng gầm xe', 'brightinterval');
                                                    echo form_error('brightinterval');
                                                    echo form_input('brightinterval', $product['brightinterval'], 'class="form-control" id="brightinterval"');
                                                
                                                    echo form_label('Dung tích bình xăng', 'fuelrange');
                                                    echo form_error('fuelrange');
                                                    echo form_input('fuelrange', $product['fuelrange'], 'class="form-control" id="fuelrange"');
                                                
                                                    echo form_label('Kích cỡ lốp trước/ sau', 'fronttiresize');
                                                    echo form_error('fronttiresize');
                                                    echo form_input('fronttiresize', $product['fronttiresize'], 'class="form-control" id="fronttiresize"');
                                                
                                                    echo form_label('Phuộc trước', 'forks');
                                                    echo form_error('forks');
                                                    echo form_input('forks', $product['forks'], 'class="form-control" id="forks"');
                                                
                                                    echo form_label('Phuộc sau', 'afterwards');
                                                    echo form_error('afterwards');
                                                    echo form_input('afterwards', $product['afterwards'], 'class="form-control" id="afterwards"');
                                                
                                                    echo form_label('Loại động cơ', 'engine');
                                                    echo form_error('engine');
                                                    echo form_input('engine', $product['engine'], 'class="form-control" id="engine"');
                                                
                                                    echo form_label('Dung tích xy-lanh', 'cylindercapacity');
                                                    echo form_error('cylindercapacity');
                                                    echo form_input('cylindercapacity', $product['cylindercapacity'], 'class="form-control" id="cylindercapacity"');
                                                
                                                    echo form_label('Đường kính x hành trình pít-tông', 'piston');
                                                    echo form_error('piston');
                                                    echo form_input('piston', $product['piston'], 'class="form-control" id="piston"');
                                                
                                                    echo form_label('Tỉ số nén', 'compressionratio');
                                                    echo form_error('compressionratio');
                                                    echo form_input('compressionratio', $product['compressionratio'], 'class="form-control" id="compressionratio"');
                                                
                                                    echo form_label('Công suất tối đa', 'maximumpower');
                                                    echo form_error('maximumpower');
                                                    echo form_input('maximumpower', $product['maximumpower'], 'class="form-control" id="maximumpower"');
                                                
                                                    echo form_label('Mô-men cực đại', 'torque');
                                                    echo form_error('torque');
                                                    echo form_input('torque', $product['torque'], 'class="form-control" id="torque"');
                                                
                                                    echo form_label('Dung tích nhớt máy', 'capacity');
                                                    echo form_error('capacity');
                                                    echo form_input('capacity', $product['capacity'], 'class="form-control" id="capacity"');
                                                
                                                    echo form_label('Loại truyền động', 'motion');
                                                    echo form_error('motion');
                                                    echo form_input('motion', $product['motion'], 'class="form-control" id="motion"');

                                                    echo form_label('Hệ thống khởi động', 'bootsystem');
                                                    echo form_error('bootsystem');
                                                    echo form_input('bootsystem', $product['bootsystem'], 'class="form-control" id="bootsystem"');


                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="highlights">        
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Đặc điểm nổi bật</h4>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active design"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Thiết kế</a></li>
                                        <li role="presentation" class="technology"><a href="#technology"  aria-controls="technology" role="tab" data-toggle="tab">Động cơ & Công nghệ</a></li>
                                        <li role="presentation" class="untilities"><a href="#untilities"  aria-controls="untilities" role="tab" data-toggle="tab">Tiện ích & An toàn</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="design">
                                        <label class="col-md-12" for="" style="margin-top: 15px;">
                                            Nhập số đặc điểm nổi bật về thiết kế
                                        </label>
                                        <div class="col-md-12" style="margin-top:5px;">
                                            <?php  
                                                echo form_input("number", count($product['design']), 'class="form-control number-highlights" onpaste="return false" onkeypress=" return isNumberKey(event)" readonly');
                                            ?>
                                        </div>
                                        <div class="col-xs-12" id="add-design" style="padding: 0px; margin-top: 10px;">
                                            <?php if (!empty($product['design'])): ?>
                                                <?php foreach ($product['design'] as $key => $value): ?>
                                                    <div class="col-xs-12" style="margin-bottom:4px;"> 
                                                        <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                                                            <span data-toggle="collapse" data-target="#demodesign<?php echo $key+1;?>" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                                                                <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;"><?php echo $key+1;?></span>
                                                                <b style="font-size: 1.1em;font-weight: 500;"></b> 
                                                            </span>
                                                            <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(<?php echo $key+1;?>,this)"></i>
                                                        </div>
                                                        <div id="demodesign<?php echo $key+1;?>" class="collapse in form-group">
                                                            <div class="col-xs-12" style="padding: 0px;">
                                                                <div class="col-xs-12">
                                                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                                                    </br>
                                                                    <?php if (!empty($value['image'])): ?>
                                                                        <div class="row" style="margin-bottom: 5px;">
                                                                            <div class="col-xs-4">
                                                                                <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$value['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" value="<?php echo $value['image']; ?>" style="width: 100%;">
                                                                            </div>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        Chưa có hình ảnh
                                                                        <img src="" value="" class="hidden" />
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="col-sm-12 col-xs-12">
                                                                    <label class="control-label" >Hình ảnh</label>
                                                                    <input type="file" name="image_design[]" value="" placeholder="" class="form-control image">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane fade active in" id="design<?php echo $key+1;?>">
                                                                            <div class="box box-default" style="border-top:none;">
                                                                                <div class="box-body" style="padding:0px;">
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Tiêu đề</label>
                                                                                        <input type="text" name="designtitle[]" value="<?php echo $value['title'] ?>" placeholder="" class="form-control title">
                                                                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
                                                                                    </div>
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Nội dung</label>
                                                                                        <textarea name="designcontent[]"  value="<?php echo $value['content'] ?>"  placeholder="" class="form-control content"><?php echo $value['content'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 tab-content">
                                            <span class="append-date" id="append-date" onclick="addOneHighlights(this)"><i class="fa-2x fa fa-plus-square"></i></span>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="technology">
                                        <label class="col-md-12" for="">
                                            Nhập số đặc điểm nổi bật về động cơ và công nghệ
                                        </label>
                                        <div class="col-md-12" style="margin-top:5px;">
                                            <?php  
                                                echo form_input("number", count($product['technology']), 'class="form-control number-highlights" onpaste="return false" onkeypress=" return isNumberKey(event)" readonly');
                                            ?>
                                        </div>
                                        <div class="col-xs-12" id="add-technology" style="padding: 0px; margin-top: 10px;">
                                            <?php if (!empty($product['technology'])): ?>
                                                <?php foreach ($product['technology'] as $key => $value): ?>
                                                    <div class="col-xs-12" style="margin-bottom:4px;"> 
                                                        <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                                                            <span data-toggle="collapse" data-target="#demotechnology<?php echo $key+1;?>" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                                                                <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;"><?php echo $key+1;?></span>
                                                                <b style="font-size: 1.1em;font-weight: 500;"></b> 
                                                            </span>
                                                            <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(<?php echo $key+1;?>,this)"></i>
                                                        </div>
                                                        <div id="demotechnology<?php echo $key+1;?>" class="collapse in form-group">
                                                            <div class="col-xs-12" style="padding: 0px;">
                                                                <div class="col-xs-12">
                                                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                                                    </br>
                                                                    <?php if (!empty($value['image'])): ?>
                                                                        <div class="row" style="margin-bottom: 5px;">
                                                                            <div class="col-xs-4">
                                                                                <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$value['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" value="<?php echo $value['image']; ?>" style="width: 100%;">
                                                                            </div>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        Chưa có hình ảnh
                                                                        <img src="" value="" class="hidden" />
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="col-sm-12 col-xs-12">
                                                                    <label class="control-label" >Hình ảnh</label>
                                                                    <input type="file" name="image_technology[]" value="" placeholder="" class="form-control image">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane fade active in" id="technology<?php echo $key+1;?>">
                                                                            <div class="box box-default" style="border-top:none;">
                                                                                <div class="box-body" style="padding:0px;">
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Tiêu đề</label>
                                                                                        <input type="text" name="technologytitle[]" value="<?php echo $value['title'] ?>" placeholder="" class="form-control title">
                                                                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
                                                                                    </div>
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Nội dung</label>
                                                                                        <textarea name="technologycontent[]"  value="<?php echo $value['content'] ?>"  placeholder="" class="form-control content"><?php echo $value['content'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 tab-content">
                                            <span class="append-date" id="append-date" onclick="addOneHighlights(this)"><i class="fa-2x fa fa-plus-square"></i></span>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="untilities">
                                        <label class="col-md-12" for="">
                                            Nhập số đặc điểm nổi bật về tiện ích và an toàn
                                        </label>
                                        <div class="col-md-12" style="margin-top:5px;">
                                            <?php  
                                                echo form_input("number", count($product['untilities']), 'class="form-control number-highlights" onpaste="return false" onkeypress=" return isNumberKey(event)" readonly');
                                            ?>
                                        </div>
                                        <div class="col-xs-12" id="add-untilities" style="padding: 0px; margin-top: 10px;">
                                            <?php if (!empty($product['untilities'])): ?>
                                                <?php foreach ($product['untilities'] as $key => $value): ?>
                                                    <div class="col-xs-12" style="margin-bottom:4px;"> 
                                                        <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                                                            <span data-toggle="collapse" data-target="#demountilities<?php echo $key+1;?>" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                                                                <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;"><?php echo $key+1;?></span>
                                                                <b style="font-size: 1.1em;font-weight: 500;"></b> 
                                                            </span>
                                                            <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(<?php echo $key+1;?>,this)"></i>
                                                        </div>
                                                        <div id="demountilities<?php echo $key+1;?>" class="collapse in form-group">
                                                            <div class="col-xs-12" style="padding: 0px;">
                                                                <div class="col-xs-12">
                                                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                                                    </br>
                                                                    <?php if (!empty($value['image'])): ?>
                                                                        <div class="row" style="margin-bottom: 5px;">
                                                                            <div class="col-xs-4">
                                                                                <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$value['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" value="<?php echo $value['image']; ?>" style="width: 100%;">
                                                                            </div>
                                                                        </div>
                                                                    <?php else: ?>
                                                                        Chưa có hình ảnh
                                                                        <img src="" value="" class="hidden" />
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="col-sm-12 col-xs-12">
                                                                    <label class="control-label" >Hình ảnh</label>
                                                                    <input type="file" name="image_untilities[]" value="" placeholder="" class="form-control image">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane fade active in" id="untilities<?php echo $key+1;?>">
                                                                            <div class="box box-default" style="border-top:none;">
                                                                                <div class="box-body" style="padding:0px;">
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Tiêu đề</label>
                                                                                        <input type="text" name="untilitiestitle[]" value="<?php echo $value['title'] ?>" placeholder="" class="form-control title">
                                                                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
                                                                                    </div>
                                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                                        <label class="control-label" for="">Nội dung</label>
                                                                                        <textarea name="untilitiescontent[]"  value="<?php echo $value['content'] ?>"  placeholder="" class="form-control content"><?php echo $value['content'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 tab-content">
                                            <span class="append-date" id="append-date" onclick="addOneHighlights(this)"><i class="fa-2x fa fa-plus-square"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="color-products">        
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Màu sắc</h4>
                                </div>
                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                    <label class="col-md-12" for="">
                                            Nhập số phiên bản cho sản phẩm
                                    </label>
                                    <div class="col-md-12" style="margin-top:5px;">
                                        <?php  
                                            echo form_input("numberversion", count($product['version']), 'class="form-control numberversion" onkeypress=" return isNumberKey(event)" id="numberversion" readonly');
                                        ?>
                                    </div>
                                </div>

                                <div id="content-full-version">
                                    <div class="col-xs-12" style="margin-top:10px;margin-bottom:10px;">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <?php foreach ($product['version'] as $key => $value): ?>
                                                <li role="presentation" class="<?php echo ($key == 0) ? 'active' : '' ?>">
                                                    <a href="#version<?php echo $key+1 ?>" aria-controls="version<?php echo $key+1 ?>" role="tab" data-toggle="tab" style="position:relative">
                                                        <span class="badge" <?php echo ($key == 0) ? 'style="background-color:#3366CC;"' : '' ?>><?php echo $key+1 ?></span>
                                                        <i style="position:absolute;top:0px; right:0px;cursor:pointer;" class="fa fa-close remove version <?php echo ($key == 0) ? 'show' : '' ?>" onclick="remove_version(<?php echo $key+1 ?>,this)"></i>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <?php foreach ($product['version'] as $key => $value): ?>
                                            <div role="tabpanel" class="tab-pane fade <?php echo ($key == 0) ? 'in active' : '' ?>" id="version<?php echo $key+1; ?>">
                                                <div class="col-ms-12" style="margin-top:15px;padding:0px;">
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade in active">
                                                            <div class="" style="border-top:none;">
                                                                <div class="box-body" style="padding:0px;">
                                                                    <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                                                        <div class="col-md-12" style="margin-top:5px;">
                                                                            <label class="control-label" for="">Nhập tên cho phiên bản</label>
                                                                            <input type="text" name="versiontitle[]" value="<?php echo $value['title']; ?>" class="form-control title" />
                                                                            <span class="help-block hidden">Bạn cần nhập trường này</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                                    <label class="col-md-12" for="">
                                                            Nhập số màu sắc của phiên bản
                                                    </label>
                                                    <div class="col-md-12" style="margin-top:5px;">
                                                        <input type="text" name="numbercolor" class="form-control numbercolor" value="<?php echo count($value['content']);?>" onkeypress=" return isNumberKey(event)" readonly="" />
                                                    </div>
                                                </div>
                                                <div class="content-full-color">
                                                    <?php if (!empty($value['content'])): ?>
                                                        <?php foreach ($value['content'] as $k => $val): ?>
                                                            <div class="col-xs-12" style="margin-bottom:4px;">
                                                                <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                                                                    <span data-toggle="collapse" data-target="#colorversion<?php echo $key+1 ?><?php echo $k+1;?>" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                                                                        <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;"><?php echo $k+1;?></span>
                                                                        <b style="font-size: 1.18em;font-weight: 500;"></b> 
                                                                    </span>
                                                                    <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color(<?php echo $k+1;?>,this)"></i>
                                                                </div>
                                                                <div id="colorversion<?php echo $key+1 ?><?php echo $k+1;?>" class="collapse in form-group">
                                                                    <div class="col-xs-12" style="padding:0px;">
                                                                        <div class="col-xs-12">
                                                                            <label for="image_shared">Hình ảnh màu sản phẩm đang dùng</label>
                                                                            </br>
                                                                            <?php if (!empty($val['image'])): ?>
                                                                                <div class="row" style="margin-bottom: 5px;">
                                                                                    <div class="col-xs-4">
                                                                                        <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$val['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" value="<?php echo $val['image'];?>" class="show_image" style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                Chưa có hình ảnh cho màu sản phẩm này
                                                                                <img src="" value="" class="show_image hidden" />
                                                                            <?php endif ?>
                                                                        </div>
                                                                        <div class="col-xs-12">
                                                                            <label class="control-label" for="inputError">Hình ảnh sản phẩm theo màu sắc</label>
                                                                            <input type="file" value="" placeholder="" class="form-control img_color">
                                                                        </div>
                                                                        <div class="col-xs-12">
                                                                            <label for="image_shared">Hình ảnh icon màu sản phẩm đang dùng</label>
                                                                            </br>
                                                                            <?php if (!empty($val['icon'])): ?>
                                                                                <div class="row" style="margin-bottom: 5px;">
                                                                                    <div class="col-xs-4">
                                                                                        <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$val['icon']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" value="<?php echo $val['icon'];?>" class="show_icon"  style="width: 100%;">
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                Chưa có icon cho màu sản phẩm này
                                                                                <img src="" value="" class="show_icon hidden" />
                                                                            <?php endif ?>
                                                                        </div>
                                                                        <div class="col-xs-12">
                                                                            <label class="control-label" for="inputError">Hình ảnh icon cho màu sản phẩm</label>
                                                                            <input type="file" name="icon_colorversion<?php echo $key+1 ?>[]" value="" placeholder="" class="form-control icon_color">
                                                                        </div>
                                                                        <div class="col-xs-12" style="margin-bottom:5px;">
                                                                            <label class="control-label" for="inputError">Mã sản phẩm</label>
                                                                            <input type="text" name="code_colorversion<?php echo $key+1 ?>[]" value="<?php echo $val['code'] ?>" placeholder="" class="form-control code_color">
                                                                        </div>
                                                                        <div class="tab-content">
                                                                            <div role="tabpanel" class="tab-pane fade active in">
                                                                                <div class="" style="border-top:none;">
                                                                                    <div class="box-body" style="padding:0px;">
                                                                                        <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                                                                            <div class="col-md-12" style="margin-top:5px;">
                                                                                                <label class="control-label" for="">Nhập tên màu sắc cho sản phẩm</label>
                                                                                                <input type="text" name="titleversion<?php echo $key+1 ?>[]" value="<?php echo $val['title'] ?>" class="form-control title" />
                                                                                                <span class="help-block hidden">Bạn cần nhập trường này</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12" style="margin-bottom:5px;">
                                                                            <label class="control-label" for="inputError">Giá sản phẩm</label>
                                                                            <input type="text" name="price_colorversion<?php echo $key+1 ?>[]" value="<?php echo $val['price'] ?>" placeholder="" class="form-control price_color">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    <?php endif ?> 
                                                </div>
                                                <div class="col-xs-12">
                                                    <i class="fa-2x fa fa-plus-square" id="addpend-one-color" onclick="addOneColor(this)" style="float: right;cursor: pointer;"></i>
                                                    <div class="col-xs-12 border" style="border-bottom: 1px solid green;margin-bottom:10px;margin-top:10px;"></div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <i class="fa-2x fa fa-plus-square" id="addpend-one-version" onclick="addOneVersion(this)" style="float: right;cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="col-xs-12">
                                <ul class="nav nav-tabs" role="tablist" id="nav-product"></ul>
                                <div id="nav-product1" class="hidden">
                                    <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" style="float: left;">Go back</a>
                                    <li role="presentation" class="specifications" style="float: right;"><button href="#specifications" class="btn btn-primary" aria-controls="specifications" role="tab" data-toggle="tab">Specifications</button></li>
                                </div>
                                <div id="nav-product2" class="hidden">
                                    <li role="presentation" id="" class="information" style="float: left;"><button href="#information" class="btn btn-primary" aria-controls="information" role="tab" data-toggle="tab">Information</button></li>
                                    <li role="presentation" id="" class="highlights" style="float: right;"><button href="#highlights" class="btn btn-primary" aria-controls="highlights" role="tab" data-toggle="tab">Highlights</button></li>
                                </div>
                                <div id="nav-product3" class="hidden">
                                    <li role="presentation" class="specifications" style="float: left;"><button href="#specifications" class="btn btn-primary" aria-controls="specifications" role="tab" data-toggle="tab">Specifications</button></li>
                                    <li role="presentation" class="color-products" style="float: right;"><button href="#color-products" class="btn btn-primary" aria-controls="color-products" role="tab" data-toggle="tab">Color product</button></li>
                                </div>
                                <div id="nav-product4" class="hidden">
                                    <li role="presentation" id="" class="highlights" style="float: left;"><button href="#highlights" class="btn btn-primary" aria-controls="highlights" role="tab" data-toggle="tab">Highlights</button></li>
                                    <li role="presentation" class="submit" style="float: right;"><button href="#submit" class="btn btn-primary" aria-controls="submit" role="tab" data-toggle="tab" onclick="submit_shared(this)">OK</button></li>
                                    <?php // echo form_submit('submit_shared', 'OK', 'class="btn btn-primary" style="float:right;"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
               <!--  <div class="hidden" id="generate_name">
                    <input type="file" name="design_img[]" value="" multiple="" />
                    <input type="file" name="technology_img[]" value="" multiple="" />
                    <input type="file" name="untilities_img[]" value="" multiple="" />

                </div> -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/');?>jquery.validate.js"></script>
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
          return false;
       return true;
    }
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',
      multidate:true
    })
  })
</script>z