<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">
<div class="content-wrapper">
    <div id="encypted_ppbtn_all"></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Tour
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'register-form'));
                ?>
                <ul class="nav nav-tabs" role="tablist"></ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Basic Information</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <div class="col-xs-6">
                                    <label for="image_shared">Hình ảnh tour đang dùng</label>
                                    </br>
                                        <?php if(!empty($detail['image'])): ?>
                                            <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'] .'/'. $detail['image']); ?>" style="width: 100%;">
                                        <?php endif; ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Ảnh đại diện', 'image_shared');
                                    echo form_error('image_shared');
                                    echo form_upload('image_shared', set_value('image_shared'), 'class="form-control" id="image_shared"');
                                    ?>
                                    <br>
                                </div>
                                <div class="col-xs-6">
                                    <label for="image_shared">Hình ảnh localtion đang dùng</label>
                                    </br>
                                        <?php if(!empty($detail['imglocaltion'])): ?>
                                            <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'] .'/'. $detail['imglocaltion']); ?>" style="width: 100%;">
                                        <?php endif; ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh Map', 'image_localtion');
                                    echo form_error('image_localtion');
                                    echo form_upload('image_localtion', set_value('image_localtion'), 'class="form-control" id="image_localtion"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Slug', 'slug_shared');
                                    echo form_error('slug_shared');
                                    echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <label>Date:</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon" title="Xóa giá trị ngày tháng">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" name="date" value ="<?php echo trim($detail['date']); ?>" class="form-control pull-right" id="datepicker" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour  ( Đơn vị tiền: VNĐ )', 'price');
                                    echo form_error('price');
                                    echo form_input('price', trim($detail['price']), 'class="form-control" id="price" placeholder ="Đơn vị tiền: VNĐ" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho người lớn  ( Đơn vị : Phần trăm )', 'priceadults');
                                    echo form_error('priceadults');
                                    echo form_input('priceadults', trim($detail['priceadults']), 'class="form-control" id="priceadults" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho trẻ em  ( Đơn vị : Phần trăm )', 'pricechildren');
                                    echo form_error('pricechildren');
                                    echo form_input('pricechildren', trim($detail['pricechildren']), 'class="form-control" id="pricechildren" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho em bé  ( Đơn vị : Phần trăm )', 'priceinfants');
                                    echo form_error('priceinfants');
                                    echo form_input('priceinfants', trim($detail['priceinfants']), 'class="form-control" id="priceinfants" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <div class="checkbox" style="padding-top: 10px;">
                                        <label style="margin-bottom: 10px;">
                                            <input type="checkbox" id="is_banner" name="is_banner" <?php echo ($detail['is_banner'] == 1)?'checked':'';?>  data-url="<?php echo base_url('admin/product/check_banner');?>" data-id="<?php echo $detail['id'];?>" > Chọn làm banner
                                            <span class="check_banner_error" style="font-weight: 700;"></span>
                                        </label></br>
                                        <label style="padding-right: 10px;">
                                            <input type="checkbox" id="promotion" name="promotion" <?php echo (!empty(trim($detail['pricepromotion'])) || !empty(trim($detail['percen'])))?'checked':''; ?>> Khuyến mãi
                                        </label>
                                        <label style="padding-right: 10px;">
                                            <input type="checkbox" id="bestselling" name="bestselling" <?php echo ($detail['bestselling'] == 1)? 'checked' : '';?>> Bán Chạy
                                        </label>
                                        <label>
                                            <input type="checkbox" id="hot" name="hot" <?php echo ($detail['hot'] == 1)? 'checked' : '';?>> Hot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12" id="box-promotion">
                                    <div class="col-xs-12" style="border:1px solid #d2d6de;">
                                    <?php
                                    echo form_label('Giảm giá', 'percen');
                                    echo form_error('percen');
                                    echo form_input('percen', trim($detail['percen']), 'class="form-control" id="percen" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                    <?php
                                    echo form_label('Giá tour sau khi giảm giá', 'pricepromotion');
                                    echo form_error('pricepromotion');
                                    echo form_input('pricepromotion', trim($detail['pricepromotion']), 'class="form-control" id="pricepromotion" placeholder ="Đơn vị tiền: VNĐ" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                    <div class="checkbox">
                                        <label style="padding-right: 10px;padding-bottom: 10px;">
                                            <input type="checkbox" id="showpromotion" name="showpromotion" <?php echo (!empty(trim($detail['showpromotion'])))?'checked':''; ?>> Hiển thị khuyến mãi
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Vị trí đến', 'localtion');
                                    echo form_error('localtion');
                                    echo form_input('localtion', trim($detail['localtion']), 'class="form-control" id="localtion" placeholder ="VD:Hanoi, Halong Bay, Hue, Hoian, Saigon, Cu Chi"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php echo form_label('Danh mục cha', 'parent_id_shared'); ?>
                                    <select name="parent_id_shared" id="parent_id_shared" class="form-control" style="margin-top: 0px">
                                        <?php echo $product_category; ?>
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Tiêu đề', 'title');
                                    echo form_error('title');
                                    echo form_input('title', trim($detail['title']), 'class="form-control" id="title"');
                                    echo form_label('Mô tả', 'description');
                                    echo form_error('description');
                                    echo form_textarea('description', trim($detail['description']), 'class="form-control" rows="5" id="description" ');
                                    echo form_label('Nội dung', 'content');
                                    echo form_error('content');
                                    echo form_textarea('content', trim($detail['content']), 'class="tinymce-area form-control" rows="5" ');
                                    echo form_label('Từ khóa meta', 'metakeywords');
                                    echo form_error('metakeywords');
                                    echo form_input('metakeywords', trim($detail['metakeywords']), 'class="form-control" id="metakeywords" ');
                                    echo form_label('Mô tả meta', 'metadescription');
                                    echo form_error('metadescription');
                                    echo form_input('metadescription', trim($detail['metadescription']), 'class="form-control" id="metadescription" ');
                                    echo form_label('Ghi chú', 'tripnodes');
                                    echo form_error('tripnodes');
                                    echo form_textarea('tripnodes', trim($detail['tripnodes']), 'class="tinymce-area form-control" rows="5" ');
                                    echo form_label('Chi tiết giá', 'detailsprice');
                                    echo form_error('detailsprice');
                                    echo form_textarea('detailsprice', trim($detail['detailsprice']), 'class="tinymce-area form-control" rows="5" ');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="add-date">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông tin cơ bản</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                    <label class="col-md-12" for="">
                                            Nhập số ngày Tour
                                    </label>
                                    <div class="col-md-10" style="margin-top:5px;">
                                        <div class="col-xs-12" style="padding: 0px">
                                            <?php  
                                                echo form_input("number", (int)count($detail['datetitle']), 'class="form-control" onkeypress=" return isNumberKey(event)" id="numberdate"');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:5px;">
                                        <span class="btn btn-primary form-control append-date" id="button-numberdate">Xác nhận</span>
                                    </div>
                                </div>
                                <div class="col-md-12" id="content-full-date">
                                    <?php for ($i=0; $i < count($detail['datecontent']); $i++): ?>
                                        <div class="vi">
                                            <div role="tabpanel" class="tab-pane active" id="<?php echo $i; ?>">
                                                <div class="title-content-date showdate <?php echo $i; ?>">
                                                    <div class="btn btn-primary col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#showdatecontent_<?php echo $i; ?>" aria-expanded="true" aria-controls="messageContent" style="padding:10px 0px;margin-bottom:3px;">
                                                        <div class="col-xs-11">Nội dung Đầy đủ Ngày <?php echo $i+1; ?></div>
                                                        <?php echo ((count($detail['datecontent']) -1) > 0 && $i == (count($detail['datecontent']) -1))?"<span class='col-xs-1 remove' style='float:right;padding:0px;z-index:9999;' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>":""; ?>
                                                    </div>
                                                    <div class="no_border">
                                                        <div class="collapse in" id="showdatecontent_<?php echo $i; ?>">
                                                            <div class="col-xs-12 title-content-date date " style="margin-top:-5px;">

                                                                <div class="row">
                                                                    <div class="col-md-7" >
                                                                        <?php
                                                                            echo form_label('Hình ảnh ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
                                                                            echo form_upload('img_date_'.$i.'[]',"",'class="form-control" id="img_date_'.$i.'"');
                                                                            echo form_label('Chọn khu vực ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
                                                                        ?>
                                                                        <select class="form-control select2 select2-hidden-accessible" name="parengoplace_<?php echo $i; ?>"  multiple="" data-idlocaltion="<?php echo $i; ?>" style="width: 100%;" data-placeholder="Select a State" style="width: 100%;min-height:34px;min-width:300px;" tabindex="-1" aria-hidden="true"  id="paren-go-place_<?php echo $i; ?>">

                                                                        <!-- <select class="form-control" name="parengoplace_<?php echo $i; ?>" data-idlocaltion="<?php echo $i; ?>" style="width: 100%;"  id="paren-go-place_<?php echo $i; ?>">';
                                                                            <option>Chọn Khu vực</option> -->
                                                                                <?php foreach ($area_selected as $key => $value): ?>
                                                                                    <option <?php 
                                                                                        if(count($detail['selectarea'][$i]) > 0){
                                                                                            foreach($detail['selectarea'][$i] as $k => $val){
                                                                                                if($value['id'] == $val['area_id']){
                                                                                                    echo ' selected ';
                                                                                                }
                                                                                            }
                                                                                        }?> value="<?php echo $value['id']; ?>"><?php echo $value['vi']; ?>
                                                                                    </option>
                                                                                <?php endforeach ?>
                                                                        </select>
                                                                        <?php echo form_label('Chọn những nơi đến ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
                                                                        ?>
                                                                        <select class="form-control select2 select2-hidden-accessible" name="goplace_<?php echo $i; ?>" multiple="" data-placeholder="Select a State" style="width: 100%;min-height:34px;min-width:300px;" tabindex="-1" aria-hidden="true" id="go-place_<?php echo $i; ?>">
                                                                            <?php if (!empty($detail['librarylocaltion'])): ?>
                                                                                <?php for ($m=0;$m< count($detail['librarylocaltion'][$i]);$m++): ?>
                                                                                        <option selected value="<?php echo $detail['librarylocaltion'][$i][$m]['id']; ?>"><?php echo $detail['librarylocaltion'][$i][$m]['title']; ?></option>
                                                                                <?php endfor ?>
                                                                            <?php endif ?>
                                                                            <?php if (!empty($detail['notlibrarylocaltion'])): ?>
                                                                                <?php for ($m=0;$m< count($detail['notlibrarylocaltion'][$i]);$m++): ?>
                                                                                        <option value="<?php echo $detail['notlibrarylocaltion'][$i][$m]['id']; ?>"><?php echo $detail['notlibrarylocaltion'][$i][$m]['title']; ?></option>
                                                                                <?php endfor ?>
                                                                            <?php endif ?>
                                                                        </select>
                                                                        <?php 
                                                                            echo form_label('Phương tiện đi ngày '.($i+1), 'vehicles');
                                                                            echo form_error('vehicles');
                                                                            echo form_dropdown('vehicles_'.$i, $request_vehicles,$detail['vehicles'][$i], 'class="form-control" id="vehicles_'.$i.'"');
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-5" style="padding:0px;">
                                                                        <b>Hình ảnh ngày <?php echo $i+1;?> đang sử dụng</b>
                                                                        <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'] .'/'. json_decode($detail['dateimg'])[$i]); ?>" style="width: 95%; height: 220px;padding-top: 6px;">
                                                                    </div>
                                                                </div>
                                                            <?php
                                                                echo form_label('Tiêu đề ngày '.($i+1), 'title_date_'.$i,'class="title_date"   id="label_title_date_'.$i.'" ');
                                                                echo form_error('title_date_'.$i);
                                                                echo form_input('title_date_'.$i,$detail['datetitle'][$i], 'class="form-control" id="title_date_'.$i.'"');
                                                                echo form_label('Nội dung ngày '.($i+1),'content_date_'.$i,'class="content_date"  id="label_content_date_'.$i.'" ');
                                                                echo form_error('content_date_'.$i);
                                                                echo form_textarea('content_date_'.$i,$detail['datecontent'][$i], 'class="tinymce-area form-control" id="content_date_'.$i.'" rows="3"');

                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="col-md-12 tab-content">
                                    <span class="append-date" id="append-date"><i class="fa-2x fa fa-plus-square"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                <div class="box box-default">
                    <div class="box-body">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</a>
                                <li role="presentation" id="content-home"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Tour</button></li>
                                <li role="presentation" id="add-date"><button href="#add-date" class="btn btn-primary" aria-controls="add-date" role="tab" data-toggle="tab">Tour date</button></li>
                                <input type="button" name="submit_shared" id="submit-shared" value="OK" class="btn btn-primary">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hidden">
                    <input type="text" name="titledate[]" value=""/>
                    <input type="text" name="contentdate[]" value=""/>
                    <input type="text" name="numberdatehidden" value="<?php echo count($detail['datecontent']);?>"/>
                    <input type="file" name="dateimg[]" multiple="">
                    <input type="text" name="librarylocaltion[]">
                </div>
                <?php echo form_close(); ?>
            </div>
        </section>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/js/');?>jquery.validate.js"></script>
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
    $(".collapse").css("height","0px");
    numberdate = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
    if(numberdate>=2){
        $($(".title-content-date.date.vi .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
        $($(".title-content-date.date.en .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
    }
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if(charCode == 59 || charCode == 46)
        return true;
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
       return true;
    }
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
  })
</script>

