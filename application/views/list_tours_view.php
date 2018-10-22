<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.css">

<section id="head-slider-section">
	<div class="container">
		<div class="big-title">
            <?php if (!empty($detail['sub'])): ?>
				<h4 class="subtitle">
                    <?php echo $detail['sub'][count($detail['sub'])-1]['title']; ?>
				</h4>
            <?php endif ?>
			<h1 class="title">
                <?php echo $detail['title'] ?>
			</h1>
		</div>
	</div>
	<div id="head-slider" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
            <?php if (!empty(json_decode($detail['image']))): ?>
                <?php foreach (json_decode($detail['image']) as $key => $value): ?>
					<div class="item <?php echo ($key == 0)?'active':'';?>">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/product_category/'.$detail['slug'].'/'.$value);?>" alt="...">
						</div>
					</div>
                <?php endforeach ?>
            <?php endif ?>
		</div>
		<a class="left carousel-control" href="#head-slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#head-slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section id="tours" class="container-fluid">
	<div class="container">
		<ol class="breadcrumb hidden-xs">
			<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
			<?php if (!empty($detail['sub'])): ?>
				<?php for($i=0;$i<count($detail['sub']);$i++): ?>
					<li><a href="<?php echo base_url('/danh-muc/'.$detail['sub'][$i]['slug']) ?>"><?php echo $detail['sub'][$i]['title'] ?></a></li>
				<?php endfor; ?>
			<?php endif ?>
			<li class="active"><?php echo $detail['title'];?></li>
		</ol>

		<div class="intro">
			<h4><?php echo $detail['content'] ?></h4>
		</div>

		<div id="list-tours" class="section">
			<div class="row">
				<?php if($product_array): ?>
	                <?php foreach($product_array as $key => $val): ?>
						<div class="item col-xs-12 col-sm-6 col-md-4">
							<div class="wrapper">
								<div class="mask">
									<a href="<?php echo base_url('tours/' . $val['slug']) ?>">
										<img src="<?php echo base_url('/assets/upload/product/' . $val['slug'].'/' . $val['image']) ?>" alt="image">
									</a>

									<!--BADGE DISCOUNT -->
                                    <?php if (!empty($val['pricepromotion']) && !empty($val['percen']) && !empty($val['showpromotion'])): ?>
										<div class="badge badge-discount">
											<div class="content">KM<br>-<?php echo $val['percen']; ?>%</div>
										</div>
                                    <?php endif ?>

									<!--BADGE SPECIAL -->
									<div class="badge badge-special">
                                        <?php if (!empty($val['hot'])): ?>
											<div id="tour-hot" class="">
												<img src="<?php echo site_url('assets/img/badge-tour-hot.png')?>" alt="badge tour hot">
											</div>
                                        <?php endif ?>
                                        <?php if (!empty($val['bestselling'])): ?>
											<div id="best-sell" class="">
												<img src="<?php echo site_url('assets/img/badge-best-sell.png')?>" alt="badge best sell">
											</div>
                                        <?php endif ?>
									</div>

								</div>
								<div class="head">
									<h4 class="post-subtitle"><?php echo $val['parent_title'] ?></h4>
									<h2 class="post-title" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></h2>
									<h3 class="price">
										<?php if (!empty($val['price'])): ?>
											<?php if (!empty($val['pricepromotion']) && !empty($val['percen']) && !empty($val['showpromotion'])): ?>
												<?php echo number_format($val['pricepromotion']); ?> VNĐ
												<small class="price-original"><del><?php echo number_format($val['price']);?> VNĐ</del></small>
											<?php else: ?>
												<?php echo number_format($val['price']); ?> VNĐ
											<?php endif ?>
										<?php else: ?>
											<span style="font-weight: 505;"><?php echo $this->lang->line('price');?>:</span> <?php echo $this->lang->line('contact');?>
										<?php endif ?>
									</h3>

								</div>
								<div class="body">
									<p class="post-description"><?php echo $val['description']; ?></p>
								</div>
								<div class="foot">
									<ul class="list-inline">
										<li>
											<a href="<?php echo base_url('tours/' . $val['slug']) ?>" class="btn btn-primary" role="button">
												Xem chi tiết
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
	                <?php endforeach; ?>
					<div class="col-md-6 col-md-offset-3 col-xs-12 page">
	                    <?php echo $page_links;?>
	                </div>
				<?php else: ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
