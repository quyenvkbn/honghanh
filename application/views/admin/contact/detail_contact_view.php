<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            
            <small>
                Chi tiết Liên hệ
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <input type="hidden" id='about-content' value='<?php echo html_entity_decode($detail->map,ENT_NOQUOTES); ?>'>
        <!-- Small boxes (Stat box) -->
        <div class="row" style="padding: 20px;padding-top: 0px;">
            <div class="col-md-9">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="2">Thông tin cơ bản</th>
                                        </tr>
                                        <tr>
                                            <th>Công ty</th>
                                            <td><?php echo $detail->company ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <td><?php echo $detail->address ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td><?php echo $detail->numberphone ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ Email</th>
                                            <td><?php echo $detail->email ?></td>
                                        </tr>
                                        <tr>
                                            <th>Url website</th>
                                            <td><?php echo $detail->website ?></td>
                                        </tr>
                                        <tr>
                                            <th>Google map</th>
                                            <td id="map"></td>
                                        </tr>

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
                <div class="box box-warning" style="padding-left: 5px;">
                    <h2>
                        <small>
                            Chỉnh sửa liên hệ
                        </small>
                    </h2>
                    <div class="box-body" style="padding-left: 0px;">
                        <a href="<?php echo base_url('admin/contact/edit/'.$detail->id) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    document.querySelector('#map').innerHTML = document.querySelector('#about-content').value;
    document.querySelector('#map iframe').style.width = '100%';
    document.querySelector('#map iframe').style.height = '500px';
</script>