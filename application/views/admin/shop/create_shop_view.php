<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm Mới
            <small>
                Cửa Hàng
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
                                echo form_label('Loại cửa hàng', 'shop_type_id');
                                echo form_error('shop_type_id');
                                ?>
                                <select name="shop_type_id" class="form-control">
                                    <option value="">Chọn loại cửa hàng</option>
                                        <?php foreach ($shop_type as $key => $value): ?>
                                            <?php if ($value['type'] == 0): ?>
                                                <option value="<?php echo $value['id'] ?>" ><?php echo $value['title'] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Khu vực', 'region');
                                echo form_error('region');
                                ?>
                                <select name="region" class="form-control">
                                    <option value="">Chọn khu vực</option>
                                    <option value="1">Miền Bắc</option>
                                    <option value="2">Miền Trung</option>
                                    <option value="3">Miền Nam</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                    echo form_label('Địa Chỉ', 'address');
                                    echo form_error('address');
                                    echo form_input('address', set_value('address'), 'class="form-control"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                    echo form_label('Số Điện Thoại Liên Hệ', 'phone');
                                    echo form_error('phone');
                                    echo form_input('phone', set_value('phone'), 'class="form-control"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                    echo form_label('Email', 'email');
                                    echo form_error('email');
                                    echo form_input('email', set_value('email'), 'class="form-control"');
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