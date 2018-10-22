<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<div class="overlay"></div>
    <img src="<?php echo base_url('/assets/upload/post_category/' . $category['image']) ?>" alt="cover">
</section>

<section class="content section container-fluid">
    <div class="container">
        <div class="row">
            <div class="left col-md-12">
				<div class="section-header">
					<div class="row">
						<div class="left col-xs-8">
							<h1 title="<?php echo $category['title']; ?>"><?php echo $category['title']; ?></h1>
							<p>
								<?php echo $category['content']; ?>
							</p>
						</div>
					</div>
				</div>

                <div class="row">
                    <?php
                    if($result){
                        foreach($result as $key => $val){
                    ?>

						<div class="item col-xs-12 col-sm-4">
							<div class="wrapper">
								<div class="mask">
									<a href="<?php echo base_url('bai-viet/' . $val['slug']) ?>">
										<img src="<?php echo site_url('assets/upload/post/' . $val['image']); ?>" alt="image">
									</a>
								</div>
								<div class="head">
									<h4 class="post-subtitle"><?php echo $val['parent_title']; ?></h4>
									<h2 class="post-title" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></h2>
								</div>
								<div class="body">
									<p class="post-description"><?php echo $val['description']; ?></p>
								</div>
								<div class="foot">
									<a href="<?php echo base_url('bai-viet/' . $val['slug']) ?>" class="btn btn-primary" role="button">
										Xem chi tiết
									</a>
								</div>
							</div>
						</div>
                    <?php
                        }
                    }
                    ?>
	                <div class="col-sm-6 col-sm-offset-3 col-xs-12 page">
	                    <?php echo (isset($page_links))? $page_links : '';?>
	                </div>
                </div>
            </div>
        </div>
    </div>
</section>