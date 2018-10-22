<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Tour
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Tour
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <input type="hidden" name="product-id" value="<?php echo $product['id'] ?>" id="product-id" />
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs" role="tablist" id="nav-product">
                            <li role="presentation" class="active"><a href="#tour" class="btn btn-primary" aria-controls="tour" role="tab" data-toggle="tab">Thông tin cơ bản</a></li>
                            <li role="presentation"><a href="#date-tour" class="btn btn-primary" aria-controls="date-tour" role="tab" data-toggle="tab">Thông số kỹ thuật</a></li>
                            <li role="presentation"><a href="#img-tour" class="btn btn-primary" aria-controls="img-tour" role="tab" data-toggle="tab">Đặc điểm nổi bật</a></li>
                            <li role="presentation"><a href="#color-tour" class="btn btn-primary" aria-controls="color-tour" role="tab" data-toggle="tab">Màu sắc sản phẩm</a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tour">
                            <div class="box-body">
                                <div class="row">
                                    <?php if (!empty($product['image'])): ?>
                                        <div class="detail-image col-sm-6" style="margin-bottom: 5px;">
                                            <label>Hình ảnh đại diện</label>
                                            <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="mask-sm">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$product['slug'].'/'.$product['image'][0]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" style="padding: 0px;">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($product['banner'])): ?>
                                        <div class="product-image col-sm-6" style="margin-bottom: 5px;">
                                            <label>Hình ảnh banner</label>
                                            <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="mask-sm">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$product['slug'].'/'.$product['banner'][0]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>" style="padding: 0px;">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="product-info col-sm-12">
                                        <div class="table-responsive">
                                            <label>Thông tin</label>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Slug</th>
                                                    <td><?php echo $product['slug'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Danh Mục</th>
                                                    <td><?php echo $product['parent_title'] ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $key => $value): ?>
                                                <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                                    <a href="#<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab">
                                                        <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $key => $value): ?>
                                                <div role="tabpanel" class="tab-pane fade<?php echo ($i == 0)? ' in active' : '' ?>" id="<?php echo $key ?>">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                    <tr>
                                                                        <th style="width: 140px">Tiêu đề: </th>
                                                                        <td><?php echo $product_lang[$key]['title'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 140px">Từ khóa meta: </th>
                                                                        <td><?php echo $product_lang[$key]['metakeywords'] ?></td>
                                                                    </tr>
                                                                
                                                                    <tr>
                                                                        <th style="width: 140px">Mô tả meta: </th>
                                                                        <td><?php echo $product_lang[$key]['metadescription'] ?></td>
                                                                    </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="date-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $key => $value): ?>
                                                <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                                    <a href="#<?php echo $key ?>1" aria-controls="<?php echo $key ?>1" role="tab" data-toggle="tab">
                                                        <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $key => $value): ?>
                                                <div role="tabpanel" class="tab-pane fade <?php echo ($i == 0)? 'in active' : '' ?>" id="<?php echo $key ?>1">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                    <tr>
                                                                        <th style="width: 200px">Khối lượng bản thân: </th>
                                                                        <td><?php echo $product_lang[$key]['mass'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Dài x Rộng x Cao: </th>
                                                                        <td><?php echo $product_lang[$key]['size'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Khoảng cách trục bánh xe: </th>
                                                                        <td><?php echo $product_lang[$key]['distance'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Độ cao yên: </th>
                                                                        <td><?php echo $product_lang[$key]['altitude'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Khoảng sáng gầm xe: </th>
                                                                        <td><?php echo $product_lang[$key]['brightinterval'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Dung tích bình xăng: </th>
                                                                        <td><?php echo $product_lang[$key]['fuelrange'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Kích cỡ lốp trước/ sau: </th>
                                                                        <td><?php echo $product_lang[$key]['fronttiresize'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Phuộc trước: </th>
                                                                        <td><?php echo $product_lang[$key]['forks'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Phuộc sau: </th>
                                                                        <td><?php echo $product_lang[$key]['afterwards'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Loại động cơ: </th>
                                                                        <td><?php echo $product_lang[$key]['engine'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Dung tích xy-lanh: </th>
                                                                        <td><?php echo $product_lang[$key]['cylindercapacity'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Đường kính x hành trình pít-tông: </th>
                                                                        <td><?php echo $product_lang[$key]['piston'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Tỉ số nén: </th>
                                                                        <td><?php echo $product_lang[$key]['compressionratio'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Công suất tối đa: </th>
                                                                        <td><?php echo $product_lang[$key]['maximumpower'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Mô-men cực đại: </th>
                                                                        <td><?php echo $product_lang[$key]['torque'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Dung tích nhớt máy: </th>
                                                                        <td><?php echo $product_lang[$key]['capacity'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Loại truyền động: </th>
                                                                        <td><?php echo $product_lang[$key]['motion'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 200px">Hệ thống khởi động: </th>
                                                                        <td><?php echo $product_lang[$key]['bootsystem'] ?></td>
                                                                    </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="img-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active design"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">Thiết kế</a></li>
                                            <li role="presentation" class="technology"><a href="#technology"  aria-controls="technology" role="tab" data-toggle="tab">Động cơ & Công nghệ</a></li>
                                            <li role="presentation" class="untilities"><a href="#untilities"  aria-controls="untilities" role="tab" data-toggle="tab">Tiện ích & An toàn</a></li>
                                        </ul>
                                    </div><div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="design">
                                        <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;"> 
                                            <?php if (!empty($product_lang['vi']['design'])): ?>
                                                <?php for ($h = 0; $h < count($product_lang['vi']['design']); $h++): ?>
                                                    <div class="col-sm-12" style="margin:10px 0px;">
                                                        <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                            <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$product['design_img'][$h]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-7" style="padding: 0px;">
                                                                <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                    <?php $number = 0; ?>
                                                                    <?php foreach ($page_languages as $key => $val) : ?>
                                                                        <?php $active = ($number == 0)?'active':''; ?>
                                                                        <li role="presentation" class="<?php echo $active; ?>">
                                                                            <a href="#date-design<?php echo $key.$h;?>" aria-controls="<?php echo $key.$h;?>" role="tab" data-toggle="tab">
                                                                                <span class="badge"><?php echo $number + 1; ?></span><?php echo $val; ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php $number++; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php $number = 0; ?>
                                                                </ul>
                                                            <div class="tab-content">
                                                                <?php $number = 0; ?>
                                                                <?php foreach ($page_languages as $key => $val): ?>
                                                                    <div role="tabpanel" class="tab-pane fade <?php echo ($number == 0)? ' in active' : '' ?>" id="date-design<?php echo $key.$h; ?>">
                                                                        <div style="padding: 5px;">
                                                                            <label for="">Tiêu đề:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['design'][$h]['title'] ?>
                                                                            </p>
                                                                            <label for="">Mô tả:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['design'][$h]['content'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php $number++; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($h+1 < count($product_lang['vi']['design'])): ?>
                                                        <div class="col-md-12">
                                                            <div style="border:2px solid gray;" class="col-md-12"> </div> 
                                                        </div>  
                                                    <?php endif ?>  
                                                <?php endfor; ?>     
                                            <?php else: ?>
                                                <div style="padding:20px;">
                                                    Không có đặc điểm nổi bật về thiết kế
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="technology">
                                        <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;"> 
                                            <?php if (!empty($product_lang['vi']['technology'])): ?>
                                                <?php for ($h = 0; $h < count($product_lang['vi']['technology']); $h++): ?>
                                                    <div class="col-sm-12" style="margin:10px 0px;">
                                                        <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                            <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$product['technology_img'][$h]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-7" style="padding: 0px;">
                                                                <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                    <?php $number = 0; ?>
                                                                    <?php foreach ($page_languages as $key => $val) : ?>
                                                                        <?php $active = ($number == 0)?'active':''; ?>
                                                                        <li role="presentation" class="<?php echo $active; ?>">
                                                                            <a href="#date-technology<?php echo $key.$h;?>" aria-controls="<?php echo $key.$h;?>" role="tab" data-toggle="tab">
                                                                                <span class="badge"><?php echo $number + 1; ?></span><?php echo $val; ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php $number++; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php $number = 0; ?>
                                                                </ul>
                                                            <div class="tab-content">
                                                                <?php $number = 0; ?>
                                                                <?php foreach ($page_languages as $key => $val): ?>
                                                                    <div role="tabpanel" class="tab-pane fade <?php echo ($number == 0)? ' in active' : '' ?>" id="date-technology<?php echo $key.$h; ?>">
                                                                        <div style="padding: 5px;">
                                                                            <label for="">Tiêu đề:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['technology'][$h]['title'] ?>
                                                                            </p>
                                                                            <label for="">Mô tả:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['technology'][$h]['content'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php $number++; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($h+1 < count($product_lang['vi']['technology'])): ?>
                                                        <div class="col-md-12"><div style="border:2px solid gray" class="col-md-12"> </div> </div>
                                                    <?php endif ?>  
                                                <?php endfor; ?>     
                                            <?php else: ?>
                                                <div style="padding:20px;">
                                                    Không có đặc điểm nổi bật về động cơ và công nghệ
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="untilities">
                                        <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;"> 
                                            <?php if (!empty($product_lang['vi']['untilities'])): ?>
                                                <?php for ($h = 0; $h < count($product_lang['vi']['untilities']); $h++): ?>
                                                    <div class="col-sm-12" style="margin:10px 0px;">
                                                        <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                            <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$product['untilities_img'][$h]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-7" style="padding: 0px;">
                                                                <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                    <?php $number = 0; ?>
                                                                    <?php foreach ($page_languages as $key => $val) : ?>
                                                                        <?php $active = ($number == 0)?'active':''; ?>
                                                                        <li role="presentation" class="<?php echo $active; ?>">
                                                                            <a href="#date-untilities<?php echo $key.$h;?>" aria-controls="<?php echo $key.$h;?>" role="tab" data-toggle="tab">
                                                                                <span class="badge"><?php echo $number + 1; ?></span><?php echo $val; ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php $number++; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php $number = 0; ?>
                                                                </ul>
                                                            <div class="tab-content">
                                                                <?php $number = 0; ?>
                                                                <?php foreach ($page_languages as $key => $val): ?>
                                                                    <div role="tabpanel" class="tab-pane fade <?php echo ($number == 0)? ' in active' : '' ?>" id="date-untilities<?php echo $key.$h; ?>">
                                                                        <div style="padding: 5px;">
                                                                            <label for="">Tiêu đề:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['untilities'][$h]['title'] ?>
                                                                            </p>
                                                                            <label for="">Mô tả:</label>
                                                                            <p>
                                                                                <?php echo $product_lang[$key]['untilities'][$h]['content'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <?php $number++; ?>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($h+1 < count($product_lang['vi']['untilities'])): ?>
                                                        <div class="col-md-12">
                                                            <div style="border:2px solid gray;" class="col-md-12"> </div> 
                                                        </div>  
                                                    <?php endif ?>  
                                                <?php endfor; ?>     
                                            <?php else: ?>
                                                <div style="padding:20px;">
                                                    Không có đặc điểm nổi bật về thiết kế
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane fade" id="color-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="col-xs-12" style="margin-top:10px;margin-bottom:10px;">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <?php for ($i = 0; $i < count($product_lang['vi']['version']); $i++): ?>
                                                    <li role="presentation" class="<?php echo ($i == 0) ? 'active' : '' ?>">
                                                        <a href="#version<?php echo $i ?>" aria-controls="version<?php echo $i ?>" role="tab" data-toggle="tab" style="position:relative">
                                                            <span class="badge" <?php echo ($i == 0) ? 'style="background-color:#3366CC;"' : '' ?>>Phiên bản số <?php echo $i+1; ?></span>
                                                        </a>
                                                    </li>
                                                <?php endfor ?>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <?php for ($i = 0; $i < count($product_lang['vi']['version']); $i++): ?>
                                                <div role="tabpanel" class="tab-pane fade <?php echo ($i == 0) ? 'in active' : '' ?>" id="version<?php echo $i; ?>">
                                                    <div class="col-xs-12">
                                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                                            <?php $l = 0; ?>
                                                            <?php foreach ($page_languages as $key => $value): ?>
                                                                <li role="presentation" class="<?php echo ($l == 0)? 'active' : '' ?>">
                                                                    <a href="#versiontitle<?php echo $key.$i ?>1" aria-controls="versiontitle<?php echo $key.$i ?>1" role="tab" data-toggle="tab">
                                                                        <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                                                    </a>
                                                                </li>
                                                                <?php $l++; ?>
                                                            <?php endforeach ?>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <?php $l = 0; ?>
                                                            <?php foreach ($page_languages as $key => $value): ?>
                                                                <div role="tabpanel" class="tab-pane fade <?php echo ($l == 0)? 'in active' : '' ?>" id="versiontitle<?php echo $key.$i ?>1">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped">
                                                                            <tbody>
                                                                                    <tr>
                                                                                        <th style="width: 200px">Tên của phiên bản: </th>
                                                                                        <td><?php echo $product_lang[$key]['mass'] ?></td>
                                                                                    </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php $l++; ?>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;">
                                                        <?php if (!empty($product_lang['vi']['version'][$i]['content'])): ?>
                                                            <?php for ($h = 0; $h < count($product_lang['vi']['version'][$i]['content']); $h++): ?>
                                                                <div class="col-sm-12" style="margin:10px 0px;">
                                                                    <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                                        <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$product['version_img'][$i][$h]) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                                    </div>
                                                                    <div class="col-sm-7" style="padding: 0px;">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-striped">
                                                                                    <tbody>
                                                                                            <tr>
                                                                                                <th style="width: 200px">Mã sản phẩm: </th>
                                                                                                <td><?php echo $product['product_code'][$i][$h] ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th style="width: 200px">Icon sản phẩm: </th>
                                                                                                <td><img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$product['version_icon'][$i][$h]) ?>" width=70 height=20></td>
                                                                                            </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                            <?php $number = 0; ?>
                                                                            <?php foreach ($page_languages as $key => $val) : ?>
                                                                                <?php $active = ($number == 0)?'active':''; ?>
                                                                                <li role="presentation" class="<?php echo $active; ?>">
                                                                                    <a href="#version<?php echo $key.$i.$h;?>" aria-controls="<?php echo $key.$i.$h;?>" role="tab" data-toggle="tab">
                                                                                        <span class="badge"><?php echo $number + 1; ?></span><?php echo $val; ?>
                                                                                    </a>
                                                                                </li>
                                                                                <?php $number++; ?>
                                                                            <?php endforeach; ?>
                                                                            <?php $number = 0; ?>
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            <?php $number = 0; ?>
                                                                            <?php foreach ($page_languages as $key => $val): ?>
                                                                                <div role="tabpanel" class="tab-pane fade <?php echo ($number == 0)? ' in active' : '' ?>" id="version<?php echo $key.$i.$h; ?>">
                                                                                    <div style="padding: 5px;">
                                                                                        <label for="">Tiêu đề:</label>
                                                                                        <p>
                                                                                            <?php echo $product_lang[$key]['untilities'][$h]['title'] ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <?php $number++; ?>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php if ($h+1 < count($product_lang['vi']['untilities'])): ?>
                                                                    <div class="col-md-12">
                                                                        <div style="border:2px solid gray;" class="col-md-12"> </div> 
                                                                    </div>  
                                                                <?php endif ?>  
                                                            <?php endfor; ?>     
                                                        <?php else: ?>
                                                            <div style="padding:20px;">
                                                                Không có sản phẩm nào cho phiên bản này
                                                            </div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            <?php endfor ?>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-body">
                        <button style="float: left;" class="btn btn-warning" onclick="history.back(-1);" role="button">Go back</button>
                        <a style="float: right;" href="<?php echo base_url('admin/'.$controller.'/edit/'.$product['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    $('#btn-active-comment').click(function(){
        if(window.location.search != '?active=true'){
            window.location.replace(window.location.href+"?active=true");
        }
    });
</script>