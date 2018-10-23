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
                            echo form_label('Ảnh đại diện', 'image');
                            echo form_error('image');
                            echo form_upload('image', set_value('image'), 'class="form-control"');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Tiêu đề', 'title');
                                echo form_error('title');
                                echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug');
                                echo form_error('slug');
                                echo form_input('slug', set_value('slug'), 'class="form-control" id="slug" readonly');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Loại danh mục', 'type');
                                echo form_error('type');
                                echo form_dropdown('type', array(0 => 'Dịch Vụ', 1 => 'Tin Tức'), 0, 'class="form-control"');
                                                    
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Mô tả', 'content');
                                echo form_error('content');
                                echo form_textarea('content', set_value('content', '', false), 'class="tinymce-area form-control" rows="5"');
                                                    
                                ?>
                            </div>
                        </div>
                        <?php echo form_submit('submit', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

