<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Bài Viết
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
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="image">Hình ảnh đang dùng</label>
                            <br>
                            <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['image']); ?>" width=250px>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình ảnh', 'image');
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
                                echo form_label('Danh mục', 'parent_id');
                                echo form_error('parent_id');
                                ?>
                                <select name="parent_id" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    <optgroup label="Dịch Vụ">
                                        <?php foreach ($category as $key => $value): ?>
                                            <?php if ($value['type'] == 0): ?>
                                                <option value="<?php echo $value['id'] ?>" <?php echo($value['id'] == $detail['id'])? 'selected' : ''?> ><?php echo $value['title'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                    <optgroup label="Tin Tức">
                                        <?php foreach ($category as $key => $value): ?>
                                            <?php if ($value['type'] == 1): ?>
                                                <option value="<?php echo $value['id'] ?>" <?php echo($value['id'] == $detail['id'])? 'selected' : ''?> ><?php echo $value['title'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </optgroup>
                                </select>
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