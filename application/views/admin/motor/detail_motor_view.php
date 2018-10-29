<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailpostnandproduct.css">

<style type="text/css">
    #content-full-version > div > ul li.active {

    }
    .remove.version.show{
        display: inline;
        color:#3366CC;
    }
    .remove.version{
        display: none;
    }
    #color-tour .version span{
        background-color:#777;
    }
    #color-tour .version.active span{
        background-color:#3366CC;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                sản phẩm
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                sản phẩm
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
                            <li role="presentation"><a href="#img-tour" class="btn btn-primary" aria-controls="img-tour" role="tab" data-toggle="tab">Đặc tính nổi bật</a></li>
                            <li role="presentation"><a href="#color-tour" class="btn btn-primary" aria-controls="color-tour" role="tab" data-toggle="tab">Màu sắc sản phẩm</a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tour">
                            <div class="box-body">
                                <div class="row">
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

                                                <tr>
                                                    <th style="width: 140px">Tiêu đề: </th>
                                                    <td><?php echo $product['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 140px">Giới thiệu: </th>
                                                    <td><?php echo $product['description'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 140px">Từ khóa meta: </th>
                                                    <td><?php echo $product['metakeywords'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 140px">Mô tả meta: </th>
                                                    <td><?php echo $product['metadescription'] ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding: 0px;">
                                        <?php if (!empty($product['image'])): ?>
                                            <div class="detail-image col-xs-12" style="margin-bottom: 5px;">
                                                <label>Hình ảnh</label>
                                                <div class="row">
                                                    <?php foreach ($product['image'] as $key => $value): ?>
                                                        <div class="col-md-3 col-xs-6 row_<?php echo $key;?>" style="position: relative; margin-bottom: 10px;">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller .'/'.$product['slug'].'/'.$value); ?>" alt="anh-mo-ta" width=100% height=200px>
                                                            <i class="fa-2x fa fa-check <?php echo ($product['avatar'] == $value) ?'avata':''; ?>" style="cursor: pointer; position: absolute;color:<?php echo ($product['avatar'] == $value) ?'green':'black'; ?>; top:0px;right:45px;" onclick="active_image('<?php echo $controller;?>','<?php echo $product["id"]; ?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                                            <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 20px;" onclick="remove_image('<?php echo $controller;?>','<?php echo $product["id"]; ?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                        <?php if (!empty($product['banner'])): ?>
                                            <div class="product-image col-xs-12" style="margin-bottom: 5px;">
                                                <label>Hình ảnh banner</label>
                                                <div class="row">
                                                    <?php foreach ($product['banner'] as $key => $value): ?>
                                                        <div class="col-md-3 col-xs-6 row_<?php echo $key;?>banner" style="position: relative; margin-bottom: 10px;">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller .'/'.$product['slug'].'/'.$value); ?>" alt="anh-mo-ta" width=100% height=200px>
                                                            <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 20px;" onclick="remove_image('<?php echo $controller;?>','<?php echo $product["id"]; ?>','<?php echo $value; ?>','<?php echo $key ?>','banner')"></i>
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    

                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="date-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                        <tr>
                                                            <th style="width: 200px">Khối lượng bản thân: </th>
                                                            <td><?php echo $product['mass'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Dài x Rộng x Cao: </th>
                                                            <td><?php echo $product['size'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Khoảng cách trục bánh xe: </th>
                                                            <td><?php echo $product['distance'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Độ cao yên: </th>
                                                            <td><?php echo $product['altitude'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Khoảng sáng gầm xe: </th>
                                                            <td><?php echo $product['brightinterval'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Dung tích bình xăng: </th>
                                                            <td><?php echo $product['fuelrange'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Kích cỡ lốp trước/ sau: </th>
                                                            <td><?php echo $product['fronttiresize'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Phuộc trước: </th>
                                                            <td><?php echo $product['forks'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Phuộc sau: </th>
                                                            <td><?php echo $product['afterwards'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Loại động cơ: </th>
                                                            <td><?php echo $product['engine'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Phanh trước: </th>
                                                            <td><?php echo $product['frontbrake'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Phanh sau: </th>
                                                            <td><?php echo $product['brakeafter'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Dung tích xy-lanh: </th>
                                                            <td><?php echo $product['cylindercapacity'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Đường kính x hành trình pít-tông: </th>
                                                            <td><?php echo $product['piston'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Tỉ số nén: </th>
                                                            <td><?php echo $product['compressionratio'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Công suất tối đa: </th>
                                                            <td><?php echo $product['maximumpower'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Mô-men cực đại: </th>
                                                            <td><?php echo $product['torque'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Dung tích nhớt máy: </th>
                                                            <td><?php echo $product['capacity'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Loại truyền động: </th>
                                                            <td><?php echo $product['motion'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Hệ thống khởi động: </th>
                                                            <td><?php echo $product['bootsystem'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Góc nghiêng phuộc trước: </th>
                                                            <td><?php echo $product['inclination'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 200px">Chiều dài vết quét: </th>
                                                            <td><?php echo $product['scanlength'] ?></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="img-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div role="tabpanel" class="tab-pane fade in active" id="design">
                                        <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;"> 
                                            <?php if (!empty($product['design'])): ?>
                                                <?php foreach ($product['design'] as $key => $value): ?>
                                                    <div class="col-sm-12" style="margin:10px 0px;">
                                                        <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                            <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$value['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                        </div>
                                                        <div class="col-sm-7" style="padding: 0px;">
                                                            <div class="tab-content">
                                                                <div style="padding: 5px;">
                                                                    <label for="">Tiêu đề:</label>
                                                                    <p>
                                                                        <?php echo $value['title'] ?>
                                                                    </p>
                                                                    <label for="">Mô tả:</label>
                                                                    <p>
                                                                        <?php echo $value['content'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($key+1 < count($product['design'])): ?>
                                                        <div class="col-md-12">
                                                            <div style="border:2px solid gray;" class="col-md-12"> </div> 
                                                        </div>  
                                                    <?php endif ?>  
                                                <?php endforeach ?>
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
                        
                        <div role="tabpanel" class="tab-pane fade" id="color-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="tab-content">
                                            <div class="col-xs-12" style="margin-bottom:4px;margin-top:4px;padding: 5px;">
                                                <?php if (!empty($product['version'])): ?>
                                                    <?php foreach ($product['version'] as $k => $val): ?>
                                                        <div class="col-sm-12" style="margin:10px 0px;">
                                                            <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                                <img src="<?php echo base_url('assets/upload/product/'.$product['slug'].'/' .$val['image']) ?>" alt="anh-cua-<?php echo $product['slug'] ?>"  style="width: 100%;">
                                                            </div>
                                                            <div class="col-sm-7" style="padding: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped">
                                                                        <tbody>
                                                                                <tr>
                                                                                    <th style="width: 200px">Mã sản phẩm: </th>
                                                                                    <td><?php echo $val['code'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width: 200px">Tiêu đề: </th>
                                                                                    <td><?php echo $val['title'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width: 200px">Giá sản phẩm: </th>
                                                                                    <td><?php echo ($val['price'] == 0) ? 'Liên hệ' : $val['price']; ?></td>
                                                                                </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if ($k+1 < count($product['version'])): ?>
                                                            <div class="col-md-12">
                                                                <div style="border:2px solid gray;" class="col-md-12"> </div> 
                                                            </div>  
                                                        <?php endif ?>  
                                                    <?php endforeach; ?>     
                                                <?php else: ?>
                                                    <div style="padding:20px;">
                                                        Không có sản phẩm nào cho phiên bản này
                                                    </div>
                                                <?php endif ?>
                                            </div>
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
            <div id="encypted_ppbtn_all"></div>
            <div id="myModal" class="modal" style="overflow-y: auto;margin-bottom: 20px;">
                <img class="modal-content" id="img01">
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
<script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script>