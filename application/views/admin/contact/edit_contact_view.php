<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Banner
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
                            <div class="row" style="padding: 20px;padding-top: 0px;padding-right: 30px;">
                                <div class="form-group">
                                    <?php
                                    echo form_label('Tên công ty', 'company');
                                    echo form_error('company');
                                    echo form_input('company', set_value('company', $contact->company), 'class="form-control company"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_label('Địa chỉ', 'address');
                                    echo form_error('address');
                                    echo form_input('address', set_value('address', $contact->address), 'class="form-control address"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_label('Số điện thoại', 'numberphone');
                                    echo form_error('numberphone');
                                    echo form_input('numberphone', set_value('numberphone', $contact->numberphone), 'class="form-control numberphone"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_label('Địa chỉ Email', 'email');
                                    echo form_error('email');
                                    echo form_input('email', set_value('email', $contact->email), 'class="form-control email"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_label('Url website', 'website');
                                    echo form_error('website');
                                    echo form_input('website', set_value('website', $contact->website), 'class="form-control website"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_label('Google map', 'map');
                                    echo form_error('map');
                                    echo form_textarea('map', set_value('map', html_entity_decode($contact->map)), 'class="form-control map"');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-12 " style="padding-right: 0px;padding-left: 0px;">
                <?php
                echo form_submit('submit', 'OK', 'class="btn btn-primary" style="float:right"');
                echo form_close();
                ?>
                <a class="btn btn-default" href="javascript:window.history.go(-1);" style="float: left;">Go back</a>
            </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        selector: ".map",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        forced_root_block : false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });
</script>