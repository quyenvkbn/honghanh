<?php
//if($this->ion_auth->logged_in()) {
//?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/img/logo.png') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><h4><b>Mato</b> creative</h4></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'about' || $this->uri->segment(2) == 'image_library')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Giới Thiệu</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="padding-left:10px;">
                        <li class="<?php echo ($this->uri->segment(2) == 'about')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/about') ?>"><i class="fa fa-list"></i> Danh Sách Bài Viêt</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'image_library')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/image_library') ?>"><i class="fa fa-list"></i> Thư Viện Ảnh</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'accessary')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/accessary') ?>">
                        <i class="fa fa-dashboard"></i> <span>Phụ Tùng</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'post_category' || $this->uri->segment(2) == 'post')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Bài Viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="padding-left:10px;">
                        <li class="<?php echo ($this->uri->segment(2) == 'post_category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/post_category') ?>"><i class="fa fa-filter"></i> Danh Mục Bài Viêt</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'post')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/post') ?>"><i class="fa fa-list"></i> Danh Sách Bài Viêt</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo ($this->uri->segment(2) == 'shop_type' || $this->uri->segment(2) == 'shop')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Hệ Thống Phân Phối</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="padding-left:10px;">
                        <li class="<?php echo ($this->uri->segment(2) == 'shop_type')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/shop_type') ?>"><i class="fa fa-filter"></i> Danh Sách Loại Cửa Hàng</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'shop')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/shop') ?>"><i class="fa fa-list"></i> Danh Sách Cửa Hàng</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo ($this->uri->segment(2) == 'image_library' || $this->uri->segment(2) == 'video_library')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Thư Viện</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ($this->uri->segment(2) == 'image_library')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/image_library') ?>"><i class="fa fa-filter"></i> Thư viện ảnh</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'video_library')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/video_library') ?>"><i class="fa fa-list"></i> Thư viện video</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo ($this->uri->segment(2) == 'product' || $this->uri->segment(2) == 'product_category')? 'active' : 'treeview' ?>">
                <li class="<?php echo ($this->uri->segment(2) == 'product_category')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/product_category') ?>"><i class="fa fa-filter"></i> Danh mục sản phẩm</a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'product' || $this->uri->segment(2) == 'motor')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Kiểu sản phẩm</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu" style="padding-left:10px;">
                        <li class="<?php echo ($this->uri->segment(2) == 'product')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/product') ?>"><i class="fa fa-filter"></i> Xe thông dụng</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'motor')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/motor') ?>"><i class="fa fa-list"></i> Xe Motor</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'contact')? 'active' : '' ?>">
                    <a href="<?php echo site_url('admin/contact/detail'); ?>" class="">
                         <i class="fa fa-newspaper-o"></i>
                        <span>Liên hệ</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php //} ?>



