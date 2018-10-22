<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (isset($detail['title']) || isset($category['title']))? (isset($detail['title']))? $detail['title'] : $category['title'] : 'Vajra' ?></title>
    <meta name="description" content="<?php echo (isset($detail['title']))? (isset($detail['metadescription']) && !empty($detail['metadescription']	))? $detail['metadescription']: $detail['title'] : 'Vajra' ?>">
    <meta name="keywords" content="<?php echo (isset($detail['title']))? (isset($detail['metakeywords']) && !empty($detail['metakeywords']	))? $detail['metakeywords']: $detail['title'] : 'Vajra' ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/') ?>client.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/rateit.css') ?>">

	<!-- Embed Open sans Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

	<!-- jQuery 3 -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/daterangepicker.css">

    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap-datepicker.min.css">
	<!-- Main Js -->
	<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.validate.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.easing.1.3.js"></script>

	<!-- Waypoint Js -->
	<script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.waypoints.min.js"></script>
	<script src="<?php echo site_url('assets/js/jquery.rateit.js') ?>"></script>

	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="<?php echo site_url('assets/img/favicon.png') ?>"/>


</head>

<body>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=139238366917004&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<input type="hidden" name="language" id="language" value="vi">
<section id="page">
	<header>
		<section id="top-nav" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="left col-sm-6 col-xs-12">
						<ul>
							<li>
								<a href="<?php echo base_url('about/')?>">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i> Về chúng tôi
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('contact/')?>">
									<i class="fa fa-phone" aria-hidden="true"></i> Liên hệ với chúng tôi
								</a>
							</li>
						</ul>
					</div>
					<div class="right col-sm-6 hidden-xs">
						<ul>
							<li>
								<a href="mailto: info@vajratravel.vn" target="_blank">
									<i class="fa fa-envelope-o" aria-hidden="true"></i> info@vajratravel.vn
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<nav id="main-nav" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="left col-sm-2 col-xs-6">
						<a href="<?php echo base_url('') ?>">
							<img src="<?php echo site_url('assets/img/')?>logo-W.png" alt="logo Diamond">
						</a>
					</div>
					<div class="right col-sm-10 hidden-xs">
						<ul>
							<li>
								<a href="<?php echo base_url('') ?>">Trang chủ</a>
							</li>

							<li class="menu-tabs">
								<a href="<?php echo base_url('danh-muc/hanh-huong-trong-nuoc') ?>">
									Hành hương trong nước<span class="caret"></span>
								</a>
								<ul class="menu-tabs-expand menu-expand">
                                    <?php foreach ($domestic_menu as $key => $value): ?>
										<li class="menu-href">
											<a href="<?php echo base_url('danh-muc/'.$value['slug']) ?>" style="color:black;">
                                                <?php echo $value['title'];?>
												<span class="glyphicon glyphicon glyphicon-menu-right pull-right"
													  aria-hidden="true"></span>
											</a>

											<ul>
                                                <?php foreach ($value['sub'] as $k => $val): ?>
													<li>
														<div class="mask">
															<img src="<?php echo base_url('assets/upload/product/'.$val['slug'].'/'.$val['image']);?>"
																 alt="image example">
															<div class="tour-badge">
                                                                <?php if (!empty($val['bestselling'])): ?>
																	<span class="badge "><i class="fa fa-star" aria-hidden="true"></i> <?php echo $this->lang->line('tour-best-sell-short') ?> </span>
                                                                <?php endif ?>
                                                                <?php if (!empty($val['hot'])): ?>
																	<span class="badge "><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $this->lang->line('tour-hot-short') ?> </span>
                                                                <?php endif ?>
                                                                <?php if (!empty($val['showpromotion']) && !empty($val['percen']) && !empty($val['pricepromotion'])): ?>
																	<span class="badge "><i class="fa fa-tags" aria-hidden="true"></i> <?php echo $this->lang->line('tour-discount-short') ?> </span>
                                                                <?php endif ?>
															</div>
														</div>
														<a href="<?php echo base_url('tours/'.$val['slug']); ?>"><?php echo $val['title']; ?></a>
													</li>
                                                <?php endforeach ?>
											</ul>
										</li>
                                    <?php endforeach ?>
								</ul>
							</li>
							<li class="menu-tabs">
								<a href="<?php echo base_url('danh-muc/hanh-huong-nuoc-ngoai') ?>">
									Hành hương nước ngoài <span class="caret"></span>
								</a>
								<ul class="menu-tabs-expand menu-expand">
                                    <?php foreach ($international_menu as $key => $value): ?>
										<li class="menu-href">
											<a href="<?php echo base_url('danh-muc/'.$value['slug']) ?>" style="color:black;">
                                                <?php echo $value['title'];?>
												<span class="glyphicon glyphicon glyphicon-menu-right pull-right"
													  aria-hidden="true"></span>
											</a>

											<ul>
                                                <?php foreach ($value['sub'] as $k => $val): ?>
													<li>
														<div class="mask">
															<img src="<?php echo base_url('assets/upload/product/'.$val['slug'].'/'.$val['image']);?>"
																 alt="image example">
															<div class="tour-badge">
                                                                <?php if (!empty($val['bestselling'])): ?>
																	<span class="badge "><i class="fa fa-star" aria-hidden="true"></i> <?php echo $this->lang->line('tour-best-sell-short') ?> </span>
                                                                <?php endif ?>
                                                                <?php if (!empty($val['hot'])): ?>
																	<span class="badge "><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $this->lang->line('tour-hot-short') ?> </span>
                                                                <?php endif ?>
                                                                <?php if (!empty($val['showpromotion']) && !empty($val['percen']) && !empty($val['pricepromotion'])): ?>
																	<span class="badge "><i class="fa fa-tags" aria-hidden="true"></i> <?php echo $this->lang->line('tour-discount-short') ?> </span>
                                                                <?php endif ?>
															</div>
														</div>
														<a href="<?php echo base_url('tours/'.$val['slug']); ?>"><?php echo $val['title']; ?></a>
													</li>
                                                <?php endforeach ?>
											</ul>
										</li>
                                    <?php endforeach ?>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('chuyen-muc/tin-tuc'); ?>">
									Tin tức
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('location'); ?>">
									Kho thư viện
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('chuyen-muc/goc-chia-se'); ?>">
									Góc chia sẻ
								</a>
							</li>

						</ul>
					</div>
					<div class="btn-expand visible-xs col-xs-6">
						<button class="btn btn-primary" id="btn-expand">
							<i class="fa fa-bars" aria-hidden="false"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="container-fluid visible-xs">
				<div id="nav-device">
					<div class="head">
						<a href="javascript:void(0);" class="pull-right" id="nav-close">
							<i class="fa fa-close fa-2x" aria-hidden="false"></i>
						</a>
					</div>
					<div class="body">
						<div class="panel-group" id="main-nav-side" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="homepage">
									<h4 class="panel-title">
										<a href="<?php echo site_url('') ?>" role="button">
											<i class="fa fa-home" aria-hidden="true"></i> Trang chủ
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="expand-domestic-heading">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#domestic" aria-expanded="true" aria-controls="expand-domestic-heading">
                                            Hành hương trong nước <span class="caret"></span>
										</a>
									</h4>
								</div>
								<div id="domestic" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-domestic-heading">
									<div class="panel-body">
										<ul>
                                            <?php
                                            if($domestic_menu){
                                                foreach($domestic_menu as $key => $val){
                                                    ?>
													<li>
														<a href="<?php echo base_url('danh-muc/'.$val['slug']) ?>" >
															<h3><?php echo $val['title']; ?></h3>
														</a>
													</li>
                                                    <?php
                                                }
                                            }
                                            ?>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="expand-international-heading">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#main-nav-side" href="#international" aria-expanded="false" aria-controls="expand-international-heading">
                                            Hành hương nước ngoài <span class="caret"></span>
										</a>
									</h4>
								</div>
								<div id="international" class="panel-collapse collapse" role="tabpanel" aria-labelledby="expand-international-heading">
									<div class="panel-body">
										<ul>
                                            <?php
                                            if($international_menu){
                                                foreach($international_menu as $key => $val){
                                                    ?>
													<li>
														<a href="<?php echo base_url('danh-muc/'.$val['slug']) ?>" >
															<h3><?php echo $val['title']; ?></h3>
														</a>
													</li>
                                                    <?php
                                                }
                                            }
                                            ?>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="news">
									<h4 class="panel-title">
										<a href="<?php echo site_url('chuyen-muc/tin-tuc/') ?>" role="button">
                                            Tin tức
										</a>
									</h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="gallery">
									<h4 class="panel-title">
										<a href="<?php echo site_url('location') ?>" role="button">
                                            Kho thư viện
										</a>
									</h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="shared">
									<h4 class="panel-title">
										<a href="<?php echo site_url('chuyen-muc/goc-chia-se/') ?>" role="button">
											Góc chia sẻ
										</a>
									</h4>
								</div>
							</div>
						</div>
					</div>

					<div class="foot">
						<ul>
							<li>
								<label>
									<i class="fa fa-phone" aria-hidden="true"></i> Đường dây nóng <br>
								</label>
								<h3>
									<a href="tel:0869 770 333">0869 770 333</a>
								</h3>
							</li>
							<li>
								<label>
									<i class="fa fa-envelope-o" aria-hidden="true"></i> Email <br>
								</label>
								<h3>
									<a href="mailto: info@vajratravel.vn">info@vajratravel.vn</a>
								</h3>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>



</section>



<script>
    $("a[class='change-language']").click(function(){
        $.ajax({
            method: "GET",
            url: "http://localhost/tourist1/homepage/change_language",
            data: {
                lang: $(this).data('language')
            },
            success: function(res){
                if(res.message == 'changed'){
                    window.location.reload();
                }
            },
            error: function(){

            }
        });
    });
</script>

<header class="header">
	<div class="container-fluid">
		<div class="container" id="main-nav">

		</div>
	</div>

</header>



