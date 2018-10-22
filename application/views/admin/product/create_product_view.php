
<div class="content-wrapper" id="create-product-view">
    <div id="encypted_ppbtn_all"></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Tour
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
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông tin cơ bản</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <img src="" alt="">
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh', 'image_shared');
                                    echo form_error('image_shared');
                                    echo form_upload('image_shared', set_value('image_shared'), 'class="form-control" id="image_shared" ');
                                    ?>
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
                                    echo form_input('slug_shared', set_value('slug_shared'), 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <label>Date:</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon" title="Xóa giá trị ngày tháng">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" name="date" class="form-control pull-right" id="datepicker" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour', 'price');
                                    echo form_error('price');
                                    echo form_input('price', "", 'class="form-control" id="price" placeholder ="Đơn vị tiền: VNĐ" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho người lớn', 'priceadults');
                                    echo form_error('priceadults');
                                    echo form_input('priceadults', "", 'class="form-control" id="priceadults" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho trẻ em', 'pricechildren');
                                    echo form_error('pricechildren');
                                    echo form_input('pricechildren', "", 'class="form-control" id="pricechildren" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho em bé', 'priceinfants');
                                    echo form_error('priceinfants');
                                    echo form_input('priceinfants', "", 'class="form-control" id="priceinfants" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <div class="checkbox" style="padding-top: 10px;">
                                        <label style="margin-bottom: 10px;">
                                            <input type="checkbox" id="is_banner" name="is_banner"  data-url="<?php echo base_url('admin/product/check_banner');?>" data-id="null" > Chọn làm banner
                                            <span class="check_banner_error" style="font-weight: 700;"></span>
                                        </label></br>
                                        <label style="padding-right: 10px;">
                                            <input type="checkbox" id="promotion" name="promotion"> Khuyến mãi
                                        </label>
                                        <label style="padding-right: 10px;">
                                            <input type="checkbox" id="bestselling" name="bestselling"> Bán Chạy
                                        </label>
                                        <label>
                                            <input type="checkbox" id="hot" name="hot"> Hot
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12" id="box-promotion">
                                    <div class="col-xs-12" style="border:1px solid #d2d6de;">
                                    <?php
                                    echo form_label('Giảm giá', 'percen');
                                    echo form_error('percen');
                                    echo form_input('percen', "", 'class="form-control" id="percen" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                    <?php
                                    echo form_label('Giá tour sau khi giảm giá', 'pricepromotion');
                                    echo form_error('pricepromotion');
                                    echo form_input('pricepromotion', "", 'class="form-control" id="pricepromotion" placeholder ="Đơn vị tiền: VNĐ" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                    <div class="checkbox">
                                        <label style="padding-right: 10px;padding-bottom: 10px;">
                                            <input type="checkbox" id="showpromotion" name="showpromotion"> Hiển thị khuyến mãi
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Vị trí đến', 'localtion');
                                    echo form_error('localtion');
                                    echo form_input('localtion', "", 'class="form-control" id="localtion" placeholder ="VD:Hanoi, Halong Bay, Hue, Hoian, Saigon, Cu Chi"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php echo form_label('Danh mục cha', 'parent_id_shared'); ?>
                                    <select name="parent_id_shared" id="parent_id_shared" class="form-control" style="margin-top: 0px">
                                        <option selected="" value="">Chọn danh mục</option>
                                        <?php echo $product_category; ?>
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Tiêu đề', 'title');
                                    echo form_error('title');
                                    echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                                    echo form_label('Mô tả', 'description');
                                    echo form_error('description');
                                    echo form_textarea('description', set_value('description', '', false), 'class="form-control" rows="5" id="description" ');
                                    echo form_label('Nội dung', 'content');
                                    echo form_error('content');
                                    echo form_textarea('content', set_value('content', '', false), 'class="tinymce-area form-control" rows="5" ');
                                    echo form_label('Từ khóa meta', 'metakeywords');
                                    echo form_error('metakeywords');
                                    echo form_input('metakeywords', set_value('metakeywords', '', false), 'class="form-control" id="metakeywords" ');
                                    echo form_label('Mô tả meta', 'metadescription');
                                    echo form_error('metadescription');
                                    echo form_input('metadescription', set_value('metadescription', '', false), 'class="form-control" id="metadescription" ');
                                    echo form_label('Ghi chú', 'tripnodes');
                                    echo form_error('tripnodes');
                                    echo form_textarea('tripnodes', set_value('tripnodes', '', false), 'class="tinymce-area form-control" rows="5" ');
                                    echo form_label('Chi tiết giá', 'detailsprice');
                                    echo form_error('detailsprice');
                                    echo form_textarea('detailsprice', set_value('detailsprice', '', false), 'class="tinymce-area form-control" rows="5" ');
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
                                        <?php  
                                            echo form_input("number", set_value("number"), 'class="form-control" onkeypress=" return isNumberKey(event)" id="numberdate"');
                                        ?>
                                    </div>
                                    <div class="col-md-2" style="margin-top:5px;">
                                        <span class="btn btn-primary form-control append-date" id="button-numberdate">Xác nhận</span>
                                    </div>
                                </div>

                                <div class="col-md-12" id="content-full-date">
                                </div>
                                <div class="col-md-12 tab-content">
                                    <span class="append-date" id="append-date"><i class="fa-2x fa fa-plus-square"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</a>
                                <li role="presentation" id="content-home" class="active"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Tour</button></li>
                                <li role="presentation" id="add-date"><button href="#add-date" class="btn btn-primary" aria-controls="add-date" role="tab" data-toggle="tab">Tour date</button></li>
                                <input type="button" name="submit_shared" id="submit-shared" value="OK" class="btn btn-primary">
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <input type="text" name="datetitle[]" value=""/>
                        <input type="text" name="datecontent[]" value=""/>
                        <input type="file" name="dateimg[]" multiple="">
                        <input type="text" name="librarylocaltion[]">
                    </div>
                </div>
                <?php echo form_close(); ?>
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
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
  })
</script>