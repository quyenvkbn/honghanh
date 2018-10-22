<!-- Homepage Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>homepage.css">
<script type="text/javascript">
	function to_slug(str,space="_"){
	    str = str.toLowerCase();

	    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	    str = str.replace(/(đ|ð)/g, 'd');

	    str = str.replace(/([^0-9a-z-\s])/g, '');

	    str = str.replace(/(\s+)/g, space);

	    str = str.replace(/^-+/g, '');

	    str = str.replace(/-+$/g, '');

	    // return
	    return str;
	}    
	var list = {};
	var apiData = {};
	var i = 0;
	function temperature(id,lang){
        $.ajax({
            url: 'http://api.openweathermap.org/data/2.5/forecast?id='+id+'&mode=json&lang='+lang+'&APPID=279b4be6d54c8bf6ea9b12275a567156&cnt=3',
            type: 'GET',
            async: false,
        })
        .done(function(data) {
    		var key = to_slug(data.city.name);
            list[id] = key;
            apiData[id] = data;
            i++;
        })
        .fail(function() {
            console.log("error");
        });
    }
    temperature('1581129','<?php echo $lang;?>');
    temperature('1816670','<?php echo $lang;?>');
    temperature('1796236','<?php echo $lang;?>');
    temperature('1668341','<?php echo $lang;?>');
    temperature('1850147','<?php echo $lang;?>');
    temperature('1835848','<?php echo $lang;?>');
    temperature('4321929','<?php echo $lang;?>');
    temperature('1609350','<?php echo $lang;?>');
    temperature('1651944','<?php echo $lang;?>');
    temperature('1735161','<?php echo $lang;?>');
    temperature('1821306','<?php echo $lang;?>');
    temperature('1642911','<?php echo $lang;?>');
    temperature('1880252','<?php echo $lang;?>');
    $.ajax({
        url: '<?php echo base_url(); ?>homepage/fetch_weather_language?data=' + JSON.stringify(list),
        type: 'GET',
        success: function(response){
            var array = $.map(response.reponse, function(value, index) {
                return [value];
            });
            var count = 0;
            $.each(apiData, function(index, data){
                $('#banner-weather .line .content-weather').append('<div class="col-md-12 '+index+'" style="padding:0px; margin-bottom:10px;border-bottom:1px solid #CCC;"><div class="row"><div class="img col-md-3 col-ms-12 col-sm-12 col-xs-6" ><img src="http://openweathermap.org/img/w/'+data.list[2].weather[0].icon+'.png'+'" width="80px" alt=""></div><div class=" col-md-9 col-ms-12 col-sm-12 col-xs-6" style="padding-left:30px;"><h3 style="font-size:1em; text-transform:capitalize;font-weight:600;margin-bottom:0px;margin-top:15px;">' + array[count] + '</h3><p class="description" style="text-transform:capitalize;margin-bottom:0px;"></p><p class="nhietdo" style="margin-bottom:0px;"></p></div></div></div>');
                $("#banner-weather .line ."+index+" p.description").text(data.list[2].weather[0].description);
                $("#banner-weather .line ."+index+" p.nhietdo").text(Math.floor(data.list[2].main.temp_min/10)+'°C - '+Math.ceil(data.list[2].main.temp_max/10)+'°C');
                count++;
            })
        }
    });
</script>
<!-- Slider JS -->
<script src="<?php echo site_url('assets/js/admin/slider.js') ?>"></script>
<section id="slider" class="container-fluid">
	<div id="homepage-slider" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php if (!empty($banner)): ?>
				<?php foreach ($banner as $key => $value): ?>
					<li data-target="#homepage-slider" data-slide-to="<?php echo $key; ?>" class="<?php echo ($key == 0)?'active' : ''; ?>"></li>
				<?php endforeach ?>
			<?php endif ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php if (!empty($banner)): ?>
				<?php foreach ($banner as $key => $value): ?>
					<div class="item <?php echo ($key == 0)?'active' : ''; ?>">
						<div class="mask">
							<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']); ?>" alt="slide 2">
						</div>
						<div class="carousel-caption">
							<div class="big-title">
								<h4 class="subtitle">
                                    <?php echo $value['parent_title']; ?>
								</h4>
								<br>
                                <?php if (!empty($value['hot'])): ?>
									<span class="badge "><i class="fa fa-location-arrow" aria-hidden="true"></i><?php echo $this->lang->line('tour-hot-short') ?></span>
                                <?php endif ?>
                                <?php if (!empty($value['bestselling'])): ?>
									<span class="badge "><i class="fa fa-star" aria-hidden="true"></i><?php echo $this->lang->line('tour-best-sell-short') ?></span>
                                <?php endif ?>
                                <?php if (!empty($value['showpromotion']) && !empty($value['percen']) && !empty($value['pricepromotion'])): ?>
									<span class="badge "><i class="fa fa-tags" aria-hidden="true"></i><?php echo $this->lang->line('tour-discount-short') ?></span>
                                <?php endif ?>
								<h1 class="title" title="<?php echo $value['title']; ?>">
									<?php echo $value['title']; ?>
								</h1>
								<ul class="list-inline">
									<li>
										<a href="<?php echo base_url('tours/'.$value['slug']); ?>" class="btn btn-primary" role="button">
											Xem chi tiết
										</a>
									</li>
								</ul>
							</div>

						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
			...
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#homepage-slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#homepage-slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>
<section id="domestic" class="container-fluid section tour-intro">
	<div class="container">
		<div class="section-header">
			<div class="row">
				<div class="left col-xs-8">
					<h1><?php echo $domestic['title']; ?></h1>
				</div>
				<div class="right col-xs-4">
					<a href="<?php echo base_url('danh-muc/'.$domestic['slug']) ?>">Xem tất cả Tours <i class="fa fa-arrow-circle-o-right" aria-hidden="false"></i> </a>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="carousel carousel-showmanymoveone slider" id="domestic-slider">
						<div class="carousel-inner">
							<div class="item active">
								<div class="inner cover col-xs-12 col-sm-6 col-md-4">
									<div class="mask">
										<?php if (!empty(json_decode($domestic['image']))): ?>
											<img src="<?php echo base_url('assets/upload/product_category/'.$domestic['slug'].'/'.json_decode($domestic['image'])[0]); ?>" alt="domestic cover image">
										<?php endif ?>
										<div class="overlay">
											<h1 title="<?php echo $domestic['title']; ?>"><?php echo $domestic['title'];?></h1>
											<p><?php echo $domestic['content'];?></p>
											<a href="<?php echo base_url('danh-muc/'.$domestic['slug']) ?>" class="btn btn-primary" role="button">Xem tất cả Tours</a>
										</div>
									</div>
								</div>
							</div>

	                        <?php if (!empty($tour_domestic)): ?>
	                            <?php foreach ($tour_domestic as $key => $value): ?>
									<div class="item">
										<div class="inner col-xs-12 col-sm-6 col-md-4">
											<div class="wrapper">
												<div class="mask">
													<a href="<?php echo base_url('tours/' . $value['slug']) ?>">
	                                                    <?php if($value['image']){ ?>
															<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
	                                                    <?php }else{ ?>
															<img src="<?php echo base_url('/assets/img/vertical.jpg'); ?>" alt="image">
	                                                    <?php } ?>
													</a>

													<!--BADGE DISCOUNT -->
                                                    <?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
														<div class="badge badge-discount">
															<div class="content">KM<br>-<?php echo $value['percen']; ?>%</div>
														</div>
                                                    <?php endif ?>

													<!--BADGE SPECIAL -->
													<div class="badge badge-special">
                                                        <?php if (!empty($value['hot'])): ?>
															<div id="tour-hot" class="">
																<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
															</div>
                                                        <?php endif ?>
                                                        <?php if (!empty($value['bestselling'])): ?>
															<div id="best-sell" class="">
																<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
															</div>
                                                        <?php endif ?>
													</div>

												</div>
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['parent_title']; ?></h4>
													<h2 class="post-title" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></h2>
													<h3 class="price">
														<?php if (!empty($value['price'])): ?>
															<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																<?php echo number_format($value['pricepromotion']); ?> VNĐ
																<small class="price-original"><del><?php echo number_format($value['price']);?> VNĐ</del></small>
															<?php else: ?>
																<?php echo number_format($value['price']); ?> VNĐ
															<?php endif ?>
														<?php else: ?>
															<span style="font-weight: 505;"><?php echo $this->lang->line('price');?>:</span> <?php echo $this->lang->line('contact');?>
														<?php endif ?>
													</h3>

												</div>
												<div class="body">
													<p class="post-description"><?php echo $value['description']; ?></p>
												</div>
												<div class="foot">
													<ul class="list-inline">
														<li>
															<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button">
																Xem chi tiết
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
	                            <?php endforeach; ?>
	                        <?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 slider-control">
					<ul class="list-inline">
						<li>
							<a class="btn btn-default" href="#domestic-slider" data-slide="prev">
								<i class="fa fa-arrow-left" aria-hidden="false"></i>
							</a>
						</li>
						<li>
							<a class="btn btn-default" href="#domestic-slider" data-slide="next">
								<i class="fa fa-arrow-right" aria-hidden="false"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="international" class="container-fluid section tour-intro">
	<div class="container">
		<div class="section-header">
			<div class="row">
				<div class="left col-xs-8">
					<h1>Hành hương nước ngoài</h1>
				</div>
				<div class="right col-xs-4">
					<a href="<?php echo base_url("danh-muc/".$international['slug']) ?>">Xem tất cả Tours <i class="fa fa-arrow-circle-o-right" aria-hidden="false"></i> </a>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-xs-12">
					<div class="carousel carousel-showmanymoveone slider" id="international-slider">
						<div class="carousel-inner">
							<div class="item active">
								<div class="inner cover col-xs-12 col-sm-6 col-md-4">
									<div class="mask">

										<?php if (!empty(json_decode($international['image']))): ?>
											<img src="<?php echo base_url('assets/upload/product_category/'.$international['slug'].'/'.json_decode($international['image'])[0]); ?>" alt="international cover image">
										<?php endif ?>

										<div class="overlay">
											<h1 title="<?php echo $international['title']; ?>"><?php echo $international['title'];?></h1>
											<p><?php echo $international['content'];?></p>
											<a href="<?php echo base_url('danh-muc/'.$international['slug']) ?>" class="btn btn-primary" role="button">Xem tất cả Tours</a>
										</div>
									</div>
								</div>
							</div>

	                        <?php if (!empty($tour_international)): ?>
	                            <?php foreach ($tour_international as $key => $value): ?>
									<div class="item">
										<div class="inner col-xs-12 col-sm-6 col-md-4">
											<div class="wrapper">
												<div class="mask">
													<a href="<?php echo base_url('tours/' . $value['slug']) ?>">
	                                                    <?php if($value['image']){ ?>
															<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
	                                                    <?php }else{ ?>
															<img src="<?php echo base_url('/assets/img/vertical.jpg'); ?>" alt="image">
	                                                    <?php } ?>
													</a>

													<!--BADGE DISCOUNT -->
                                                    <?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
														<div class="badge badge-discount">
															<div class="content">KM<br>-<?php echo $value['percen']; ?>%</div>
														</div>
                                                    <?php endif ?>

													<!--BADGE SPECIAL -->
													<div class="badge badge-special">
                                                        <?php if (!empty($value['hot'])): ?>
															<div id="tour-hot" class="">
																<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
															</div>
                                                        <?php endif ?>
                                                        <?php if (!empty($value['bestselling'])): ?>
															<div id="best-sell" class="">
																<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
															</div>
                                                        <?php endif ?>
													</div>

												</div>
												<div class="head">
													<h4 class="post-subtitle"><?php echo $value['parent_title']; ?></h4>
													<h2 class="post-title" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></h2>
													<h3 class="price">
														<?php if (!empty($value['price'])): ?>
															<?php if (!empty($value['pricepromotion']) && !empty($value['percen']) && !empty($value['showpromotion'])): ?>
																<?php echo number_format($value['pricepromotion']); ?> VNĐ
																<small class="price-original"><del><?php echo number_format($value['price']);?> VNĐ</del></small>
															<?php else: ?>
																<?php echo number_format($value['price']); ?> VNĐ
															<?php endif ?>
														<?php else: ?>
															<span style="font-weight: 505;"><?php echo $this->lang->line('price');?>:</span> <?php echo $this->lang->line('contact');?>
														<?php endif ?>
													</h3>

												</div>
												<div class="body">
													<p class="post-description"><?php echo $value['description']; ?></p>
												</div>
												<div class="foot">
													<ul class="list-inline">
														<li>
															<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button">
																Xem chi tiết
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
	                            <?php endforeach; ?>
	                        <?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 slider-control">
					<ul class="list-inline" style="background-color: rgba(0,0,0,0);">
						<li>
							<a class="btn btn-default" href="#international-slider" data-slide="prev">
								<i class="fa fa-arrow-left" aria-hidden="false"></i>
							</a>
						</li>
						<li>
							<a class="btn btn-default" href="#international-slider" data-slide="next">
								<i class="fa fa-arrow-right" aria-hidden="false"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="news" class="section container">
	<div class="section-header">
		<div class="row">
			<div class="left col-xs-8">
				<h1>Tin tức</h1>
			</div>
			<div class="right col-xs-4">
				<a href="<?php echo base_url('chuyen-muc/tin-tuc') ?>">Xem tất cả tin tức <i class="fa fa-arrow-circle-o-right" aria-hidden="false"></i> </a>
			</div>
		</div>
	</div>
	<div class="row">
		<?php foreach ($post_news as $key => $value): ?>
			<div class="item col-sm-<?php echo ($key == 0)? '12': '4'; ?> col-xs-12" style="<?php echo ($key == 0)? 'padding-bottom: 25px;': ''; ?>">
				<div class="col-md-<?php echo ($key == 0)? '8': '12'; ?>" style="padding:0px;<?php echo ($key == 0)? 'padding-right: 10px;': ''; ?>">
					<div class="mask">
							<img src="<?php echo base_url('assets/upload/post/'.$value['image']); ?>" alt="blogs image">
					</div>
				</div>
				<div class="col-md-<?php echo ($key == 0)? '4': '12'; ?>" style="padding:0px;">
					<div class="head">
						<h4 class="post-subtitle"><?php echo $value['parent_title'];?></h4>
						<h2 class="post-title" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></h2>
					</div>
					<div class="body">
						<p class="post-description"><?php echo $value['description']; ?></p>
					</div>
					<div class="foot">
						<a href="<?php echo base_url('bai-viet/'.$value['slug']) ?>" class="btn btn-primary" role="button">
							Xem chi tiết
						</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</section>

<section id="gallery" class="section container-fluid">
	<div class="container">
		<div class="section-header">
			<div class="row">
				<div class="left col-xs-8">
					<h1>Thư viện ảnh</h1>
				</div>
				<div class="right col-xs-4">
					<a href="<?php echo base_url('location') ?>">Xem tất cả <i class="fa fa-arrow-circle-o-right" aria-hidden="false"></i> </a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="grid">
				<div class="grid-sizer"></div>
                <?php foreach ($location_archive_library as $key => $value): ?>
                    <?php $class = '';
                    switch ($key){
                        case 0:
                            $class = 'grid-item-width-2 grid-item-height-2';
                            break;
                        case 1:
                            $class = '';
                            break;
                        case 2:
                            $class = '';
                            break;
                        case 3:
                            $class = 'grid-item-width-2';
                            break;
                        case 4:
                            $class = 'grid-item-height-2';
                            break;
                        case 5:
                            $class = 'grid-item-width-2 grid-item-height-2';
                            break;
                        case 6:
                            $class = 'grid-item-height-2';
                            break;
                    }?>
					<div class="grid-item <?php echo $class ?>">

						<a href="<?php echo base_url('thu-vien/'.$value['slug']) ?>">
							<div class="mask">
								<img src="<?php echo base_url('assets/upload/localtion/'.$value['slug'].'/'.$value['image']); ?>" alt="blogs image">
								<div class="overlay"></div>
								<div class="content">
									<h4 class="post-subtitle"><?php echo $value['vi'];?></h4>
									<h2 class="post-title" title="<?php echo $value['title'];?>">
										<?php echo $value['title'];?>
									</h2>
								</div>
							</div>
						</a>
					</div>
                    <?php echo (($key+1)%3 == 0)?'<div class="clear" style="clear: left;"></div>':''; ?>
                <?php endforeach ?>
			</div>

		</div>
	</div>
</section>

<section id="shared_corner" class="section container">
	<div class="row">
		<div class="left col-sm-9 col-xs-12 services-left" style="padding: 0px;margin: 0px;">
			<div class="item cover col-sm-12 col-xs-12">
				<div class="mask">
					<img src="<?php echo base_url('assets/upload/post_category/'.$shared_corner['image']); ?>" alt="blogs image"  style="height: 300px;">
					<h2><?php echo $shared_corner['title']; ?></h2>
				</div>
			</div>
			<?php foreach ($post_shared_corner as $key => $value): ?>
				<div class="item col-sm-4 col-xs-12">
					<a href="<?php echo base_url('bai-viet/'.$value['slug']) ?>">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/post/'.$value['image']); ?>" alt="blogs image">

							<div class="overlay"></div>
							<div class="content">
								<h4 class="post-subtitle"><?php echo date("d/m/Y",strtotime($value['created_at']));?></h4>
								<h2 class="post-title" title="<?php echo $value['title'];?>">
									<?php echo $value['title'];?>
								</h2>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
		<div class="right col-sm-3 col-xs-12 services-right">
			<div id="banner-weather">
				<h2 style="margin-top: 0px;">Thời tiết</h2>
				<div class="row services-right"  style="overflow-y: scroll">
					<div class="item col-xs-12">
						<div class="line" style="padding-left: 0px;padding-right: 0px;">
							<div class="line-primary"></div>
							<div class="content-weather"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>

<script src='https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js'></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>


<script>
	var height = $('.services-left').height();
	$('.row.services-right').height(($('.services-left').height()-$('#banner-weather h2').height()));
	$('.services-right .content-weather').css('height',($('.services-left').height()-$('.services-right h1').height()-20)+'px');
	$(document).ready(function(){
		$('.section .item .inner').addClass('');
	});
</script>
<script type="text/javascript">

    // init Isotope
    var $grid = $('.grid').isotope({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            // use element for option
            columnWidth: '.grid-sizer'
        }
    });

    // filter items on button click
    $('.work-control ul li').on( 'click', 'a', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });

</script>
