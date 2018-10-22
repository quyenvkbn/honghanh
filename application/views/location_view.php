<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<div class="overlay"></div>
    <?php if (count($result) >0 ): ?>
        <img src="<?php echo base_url('/assets/upload/localtion/' . $result[0]['slug'] . '/' . $result[0]['image']) ?>" alt="cover">
    <?php else: ?>
        <img src="<?php echo base_url('/assets/image/horizontal.jpg') ?>" alt="cover">
    <?php endif ?>

</section>

<section class="content section container-fluid">
    <div class="container">
        <div class="row">
            <div class="left col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section-header">
                            <h1>Kho thư viện</h1>
                            <div class="line">
                                <div class="line-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="<?php echo base_url('location') ?>" method="get">
                            <div class="col-sm-5" style="padding-bottom: 10px;">
                                <select name="category" class="form-control">
                                    <option value="">Tìm kiếm theo khu vực</option>
                                    <?php foreach ($area as $key => $value): ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo ($category == $value['id'])?'selected':''; ?>><?php echo $value['vi']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="<?php echo $keyword ?>">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm" style="margin: 0px;">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if($result){
                        foreach($result as $key => $val){
                    ?>
						<div class="item col-xs-12 col-sm-6 col-md-4">
							<div class="wrapper">
								<div class="mask">
									<a href="<?php echo base_url('bai-viet/' . $val['slug']) ?>">
										<img src="<?php echo site_url('assets/upload/localtion/' . $val['slug'] . '/' . $val['image']); ?>" alt="image">
									</a>
								</div>
								<div class="head">
									<h4 class="post-subtitle"><?php echo $val['vi']; ?></h4>
									<h2 class="post-title" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></h2>
								</div>
								<div class="body">
									<p class="post-description"><?php echo $val['description']; ?></p>
								</div>
								<div class="foot">
									<a href="<?php echo base_url('thu-vien/' . $val['slug']) ?>" class="btn btn-primary" role="button">
										Xem chi tiết
									</a>
								</div>
							</div>
						</div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3 col-xs-12 page">
                <?php echo $page_links; ?>
            </div>
           <!--  <div class="right col-md-3 col-sm-4 col-xs-12">
                <div class="section-header">
                    <h1><?php echo $this->lang->line('blogs') ?></h1>
                    <div class="line">
                        <div class="line-primary"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
