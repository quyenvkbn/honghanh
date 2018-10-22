
<div class="content-wrapper" id="create-product-view">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Địa điểm
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
                                <div class="col-xs-12">
                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                    <br>
                                    <img src="<?php echo base_url('assets/upload/localtion/'.$detail['slug'].'/'. $detail['image']); ?>" width=250px>
                                    <br>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh', 'image_localtion');
                                    echo form_error('image_localtion');
                                    echo form_upload('image_localtion', set_value('image_localtion'), 'class="form-control" id="image_localtion" multiple');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Slug', 'slug_localtion');
                                    echo form_error('slug_localtion');
                                    echo form_input('slug_localtion', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>
                                <div class="col-xs-12" style="margin-bottom: 5px;">
                                    <?php
                                    echo form_label('Tên khu vực đến', 'area_id');
                                    echo form_error('area_id');
                                    ?>
                                    <select name="area_id" class="form-control">
                                        <?php foreach ($area as $key => $value): ?>
                                            <option value="<?php echo $value['id']; ?>" <?php echo ($detail['area_id'] == $value['id'])?'selected':'';?>><?php echo $value['vi']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-xs-12">
                                    <div class="checkbox" style="padding-top: 10px;padding-bottom: 10px;">
                                        <label>
                                            <input type="checkbox" id="hot" name="is_hot" <?php echo ($detail['is_hot'] == 1)? 'checked' : '';?>> Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="margin-bottom: 5px;">
                                    <?php
                                    echo form_label('Tiêu đề', 'title');
                                    echo form_error('title');
                                    echo form_input('title', trim($detail['title']), 'class="form-control" id="title"');
                                    echo form_label('Mô tả', 'description');
                                    echo form_error('description');
                                    echo form_textarea('description', trim($detail['description']), 'class="form-control" rows="5" ');
                                    echo form_label('Nội dung', 'content');
                                    echo form_error('content');
                                    echo form_textarea('content', trim($detail['content']), 'class="tinymce-area form-control" rows="5" ');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</a>
                                <input type="submit" name="submit_shared" id="submit-shared" value="OK" class="btn btn-primary">
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
          return false;
       return true;
    }
</script><script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    })
  })
</script>