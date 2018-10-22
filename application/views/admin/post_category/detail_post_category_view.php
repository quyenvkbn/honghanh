<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Danh Mục
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Danh Mục
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-6">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg" style="padding: 0px;background: gray;">
                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'. $detail['image'] ) ?>" alt="Image Detail" width=300px>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-info col-md-6">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="2">Thông tin cơ bản</th>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <td>
                                                <?php echo ($detail['is_activated'] == 0)? '<span class="label label-success">Đang sử dụng</span>' : '<span class="label label-warning">Không sử dụng</span>' ?>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Slug</th>
                                            <td><?php echo $detail['slug'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Danh Mục</th>
                                            <td><?php echo $detail['parent_title'] ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $detail['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Nội dung: </th>
                                                    <td><?php echo $detail['content'] ?></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa 
                            <?php 
                                switch ($controller) {
                                    case 'post_category':
                                        echo "";
                                        break;
                                    case 'post':
                                        echo "Bài Viết";
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                             ?>
                         này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>