<style type="text/css">
    img {
        border-radius: 2px;
        cursor: pointer;
        transition: 0.3s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
    img:hover {opacity: 0.7;}
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */

        transition: 0.3s;
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập Nhật
            <small>
                Thư Viện Ảnh
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
                            <label for="image">Hình ảnh đang dùng</label>
                            <br>
                            <div class="detail-image col-xs-12">
                                <!-- <input type="hidden" name="csrf_honghanh_token" value="<?php echo $this->security->get_csrf_hash(); ?>"> -->
                                <?php if (!empty($detail['image'])): ?>
                                    <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                        <div class="col-md-2 col-xs-6 row_<?php echo $key;?>" style="position: relative;padding-right:20px;padding-left: 0px; margin-bottom: 10px;">
                                            <img src="<?php echo base_url('assets/upload/'.$controller .'/'.$detail['slug'].'/'.$value); ?>" alt="anh-mo-ta" width=100% height=350px>
                                            <i class="fa-2x fa fa-check <?php echo ($detail['avatar'] == $value) ?'avata':''; ?>" style="cursor: pointer; position: absolute;color:<?php echo ($detail['avatar'] == $value) ?'green':'black'; ?>; top:0px;right:50px;" onclick="active_image('<?php echo $controller;?>','<?php echo $detail["id"]; ?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                            <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 25px;" onclick="remove_image('<?php echo $controller;?>','<?php echo $detail["id"]; ?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                        </div>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    Chưa có ảnh
                                <?php endif ?>
                            </div>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình Ảnh', 'image');
                            echo form_error('image');
                            echo form_upload('image[]', set_value('image'), 'class="form-control" multiple');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                    echo form_label('Tiêu đề', 'title');
                                    echo form_error('title');
                                    echo form_input('title', $detail['title'], 'class="form-control" id="title"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug');
                                echo form_error('slug');
                                echo form_input('slug', $detail['slug'], 'class="form-control" id="slug" readonly');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                    echo form_label('Mô tả', 'description');
                                    echo form_error('description');
                                    echo form_textarea('description', $detail['description'], 'class="form-control" rows="5"');
                                    echo form_label('Nội dung', 'content');
                                    echo form_error('content');
                                    echo form_textarea('content', $detail['content'], 'class="tinymce-area form-control" rows="5"');
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