<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Danh Mục
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
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Ảnh đại diện', 'image_shared');
                            echo form_error('image_shared');
                            echo form_upload('image_shared[]', set_value('image_shared'), 'class="form-control" multiple');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label('Danh Mục', 'parent_id_shared');
                                echo form_error('parent_id_shared');
                            ?>
                            <select name="parent_id_shared" class="form-control">
                                <?php echo $product_category; ?>
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Slug', 'slug_shared');
                            echo form_error('slug_shared');
                            echo form_input('slug_shared', set_value('slug_shared'), 'class="form-control" id="slug_shared" readonly');
                            echo form_label('Tiêu đề', 'title');
                            echo form_error('title');
                            echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                            echo form_label('Từ khóa meta', 'metakeywords');
                            echo form_error('metakeywords');
                            echo form_input('metakeywords', set_value('metakeywords', '', false), 'class="form-control"');
                            echo form_label('Mô tả meta', 'metadescription');
                            echo form_error('metadescription');
                            echo form_input('metadescription', set_value('metadescription', '', false), 'class="form-control"');
                            echo form_label('Nội dung', 'content');
                            echo form_error('content');
                            echo form_textarea('content', set_value('content', '', false), 'class="tinymce-area form-control" rows="5"');
                            ?>
                        </div>
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/script.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/common.js') ?>"></script>

