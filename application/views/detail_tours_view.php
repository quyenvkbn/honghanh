<!-- Tours Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>tours.css">

<section id="head-cover" class="container-fluid" style="background-image: url('<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['image']) ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="big-title">
			<h4 class="subtitle">
				<?php echo $detail['parent_title'] ?>
			</h4>
			<h1 class="title" title="<?php echo $detail['title'];?>">
                <?php echo $detail['title'] ?>
				<br>
                <?php if (!empty($detail['bestselling'])): ?>
					<span class="badge "><i class="fa fa-star" aria-hidden="true"></i> Tour bán chạy </span>
                <?php endif ?>
                <?php if (!empty($detail['hot'])): ?>
					<span class="badge "><i class="fa fa-location-arrow" aria-hidden="true"></i> Tour Hot </span>
                <?php endif ?>
                <?php if (!empty($detail['showpromotion']) && !empty($detail['pricepromotion']) && !empty($detail['percen'])): ?>
					<span class="badge "><i class="fa fa-tags" aria-hidden="true"></i> Tour Khuyến mại </span>
                <?php endif ?>
			</h1>
		</div>
	</div>
</section>

<section id="detail" class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="left col-sm-9 col-xs-12">
				<ol class="breadcrumb hidden-xs">
					<li><a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('home') ?></a></li>
                    <?php if (!empty($detail['sub'])): ?>
                        <?php for($i=0;$i<count($detail['sub']);$i++): ?>
							<li><a href="<?php echo base_url('/danh-muc/'.$detail['sub'][$i]['slug']) ?>"><?php echo $detail['sub'][$i]['title'] ?></a></li>
                        <?php endfor; ?>
					<?php else: ?>
							<li><a href="<?php echo base_url('/danh-muc/'.$detail['parent_slug']) ?>"><?php echo $detail['parent_title'] ?></a></li>
                    <?php endif ?>
					<li class="active"><?php echo $detail['title'];?></li>
				</ol>

				<div class="intro">
					<h4><?php echo $detail['description'] ?></h4>
				</div>

				<div class="row">
					<div class="left col-sm-6 col-xs-12">
						<h3>Ghi chú</h3>
						<p><?php echo $detail['content'] ?></p>
					</div>
					<div class="right col-sm-6 col-xs-12">
						<h3>Chi tiết tour</h3>
						<table class="table">
							<tr>
								<td>Số ngày</td>
								<td><?php echo count($detail['datetitle'])?> Ngày</td>
							</tr>
							<tr>
								<td>Ngày khởi hành</td>
								<td>
									<?php if (!empty($detail['date'])): ?>
										<?php echo $detail['date'] ?>
									<?php else: ?>
										<?php echo $this->lang->line('contact');?>
									<?php endif ?>
								</td>
							</tr>
							<tr>
								<td>Giá</td>
								<td>
									<h4>
										<?php if (!empty($value['price'])): ?>
											<?php if (!empty($detail['pricepromotion']) && !empty($detail['percen']) && !empty($detail['showpromotion'])): ?>
												<?php echo number_format($detail['pricepromotion']); ?> VNĐ
												<small class="price-original"><del><?php echo number_format($detail['price']);?> VNĐ</del></small>
											<?php else: ?>
												<?php echo number_format($detail['price']); ?> VNĐ
											<?php endif ?>
										<?php else: ?>
											<?php echo $this->lang->line('contact');?>
										<?php endif ?>
									</h4>
								</td>
							</tr>
							<tr>
								<td>Đánh giá</td>
								<td>
									<div id="rateit_star" data-productid="<?php echo $detail['id']; ?>" data-rateit-resetable="false" data-rateit-value="<?php echo $rating ?>"></div>
									<input type="hidden" name="re_rateit" id="re_rateit" value="">
									<p class="number"><?php echo $rating ?> / 5 điểm <?php echo '(' . $count_rating. ' phiếu' . ')' ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<div class="captcha-input input-group col-md-12">
										<input type="hidden" name="re_captcha" id="re_captcha" class="show-re-captcha" value="" >
										<input placeholder="Nhập mã" name="captcha" id="captcha" type="text" value="" class="form-control" aria-describedby="captcha" style=" border: 1;margin-right: 5%; color: black;height: 33px;">
										<span class="input-group-addon" id="basic-addon1"><a class="refresh" href="javascript:void(0)" title="Lấy mã mới"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
									</div>
									<div class="captcha-input col-md-7">

									</div>
									<div>
										<span class="message"></span>
									</div>
								</td>
								<td>
									<div class="captcha-image image col-md-12"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="input-group col-md-12">
										<input type="hidden" name="created_captcha" class="created_captcha" value="<?php echo base_url('created_captcha'); ?>">
										<input type="hidden" name="created_rating" class="created_rating" value="<?php echo base_url('created_rating'); ?>">
										<input type="hidden" name="product_id" class="product_id" value="<?php echo $detail['id']?>">
										<button class="btn btn-default btn-rating" <?php echo ($check_session == true)? 'disabled' : '' ?> >
	                                        Đánh giá
										</button>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<div class="row tabs">
					<div class="col-xs-12">
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active">
								<a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">
                                    Tổng quan
								</a>
							</li>
							<li role="presentation">
								<a href="#gallery-tab" aria-controls="gallery" role="tab" data-toggle="tab">
                                    Thư viện ảnh
								</a>
							</li>
							<li role="presentation">
								<a href="#price" aria-controls="price" role="tab" data-toggle="tab">
                                    Chi phí
								</a>
							</li>
							<li role="presentation">
								<a href="#trip-notes" aria-controls="trip-notes" role="tab" data-toggle="tab">
                                    Lưu ý
								</a>
							</li>
							<li role="presentation">
								<a href="#inquire" aria-controls="inquire" role="tab" data-toggle="tab">
                                    Đăng ký
								</a>
							</li>
							<li role="presentation">
								<a href="#customize" aria-controls="customize" role="tab" data-toggle="tab">
                                    Tùy chỉnh
								</a>
							</li>
                            <li role="presentation" id="commentTab">
                                <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">
                                    <?php echo $this->lang->line('comments') ?>
                                </a>
                            </li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="overview">
								<div class="row">
									<div class="schedule col-sm-8 col-xs-12">
										<div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
                                            <?php for($i = 0; $i < count($detail['dateimg']); $i++): ?>
												<div class="panel panel-primary">
													<div class="panel-heading" role="tab" id="day-<?php echo $i+1; ?>-heading">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#schedule" href="#day-<?php echo $i+1; ?>" aria-expanded="false" aria-controls="day-<?php echo $i+1; ?>">
																<?php echo $this->lang->line('day');?> <?php echo $i+1; ?>: <?php echo $detail['datetitle'][$i];?>

															</a>
															<i class="fa <?php echo $request_vehicles_icon[$detail['vehicles'][$i]]; ?> pull-right" aria-hidden="true"></i>
														</h4>
													</div>
													<div id="day-<?php echo $i+1; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="day-<?php echo $i+1; ?>-heading">
														<div class="panel-body">
															<div class="media">
																<div class="media-left">
																	<div class="mask">
																		<img class="media-object" src="<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['dateimg'][$i]); ?>" alt="daily schedule image">
																	</div>
																</div>
																<div class="media-body">
																	<h4 class="media-heading"><?php echo $detail['datetitle'][$i]; ?></h4>
																	<p>
                                                                        <?php echo $detail['datecontent'][$i]; ?>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
                                            <?php endfor; ?>
										</div>

									</div>
									<div class="map col-sm-4 col-xs-12">
										<img src="<?php echo base_url('/assets/upload/product/'.$detail['slug'].'/'.$detail['imglocaltion']);?>" alt="tour map">
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="gallery-tab">
								<div class="row">
									<div class="col-xs-12">
										<div class="panel-group" id="gallery-list" role="tablist" aria-multiselectable="true">
                                            <?php for($i = 0; $i < count($detail['librarylocaltion']); $i++): ?>
												<div class="panel panel-primary">
													<div class="panel-heading" role="tab" id="day-1-heading">
														<h4 class="panel-title">
															<a role="button" data-toggle="collapse" data-parent="#gallery-list" href="#gallery-<?php echo $i+1; ?>" aria-expanded="false" aria-controls="gallery-<?php echo $i+1; ?>">
																 <?php echo $this->lang->line('day');?> <?php echo $i+1; ?>: <?php echo $detail['datetitle'][$i];?>

															</a>
															<i class="fa <?php echo $request_vehicles_icon[$detail['vehicles'][$i]]; ?> pull-right" aria-hidden="true"></i>
														</h4>
													</div>
													<div id="gallery-<?php echo $i+1; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="gallery-<?php echo $i+1; ?>-heading">
														<div class="panel-body">
                                                            <?php if (!empty($detail['librarylocaltion'][$i])): ?>
                                                                <?php for($j = 0; $j < count($detail['librarylocaltion'][$i]); $j++): ?>
                                                                    <?php if (!empty($detail['librarylocaltion'][$i][$j])): ?>
																		<div class="media">
																			<div class="media-left">
																				<div class="mask">
																					<img class="media-object" src="<?php echo base_url('/assets/upload/localtion/'.$detail['librarylocaltion'][$i][$j]['slug'].'/'.$detail['librarylocaltion'][$i][$j]['image']); ?>" alt="daily schedule image">
																				</div>
																			</div>
																			<div class="media-body">
																				<h4 class="media-heading"><a href="<?php echo base_url('thu-vien/'.$detail['librarylocaltion'][$i][$j]['slug']);?>" target="_blank"><?php echo $detail['librarylocaltion'][$i][$j]['title'] ?></a></h4>
																				<p><?php echo $detail['librarylocaltion'][$i][$j]['description'] ?></p>
																			</div>
																		</div>
                                                                    <?php endif;?>
                                                                    <?php if ($j+1 < count($detail['librarylocaltion'][$i])): ?>
																		<div style="border:2px solid gray" class="col-md-12"> </div>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php else: ?>
																<div style="padding:20px;">
																	Không có nơi nào được chọn trong ngày
																</div>
                                                            <?php endif;?>
														</div>
													</div>
												</div>
                                            <?php endfor; ?>
										</div>
									</div>
								</div>

							</div>
							<div role="tabpanel" class="tab-pane" id="price">
								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th>Người lớn</th>
													<th>Trẻ từ 2 đến 11 tuổi</th>
													<th>Trẻ em dưới 2 tuổi</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td><?php echo $detail['priceadults'];?>% Giá</td>
													<td><?php echo $detail['pricechildren'];?>% Giá</td>
													<td><?php echo $detail['priceinfants'];?>% Giá</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
                                            <?php echo $detail['detailsprice'];?>
										</div>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="trip-notes">
								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">

                                        	<?php echo $detail['tripnodes'];?>
                                    	</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="product_id" id="product_id" value="<?php echo $detail['id']?>">
							<div role="tabpanel" class="tab-pane" id="inquire">
								<div class="row">
                                    <?php
                                    echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'form-booking'));
                                    ?>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Chức danh (*)', 'inquire_title');
                                        echo form_error('inquire_title');
                                        echo form_dropdown('inquire_title', $options =array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'), set_value('inquire_title'), 'class="form-control" id="inquire_title"')
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Tên (*)', 'inquire_first_name');
                                        echo form_error('inquire_first_name');
                                        echo form_input('inquire_first_name', set_value('inquire_first_name'), 'class="form-control" id="inquire_first_name"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Họ (*)', 'inquire_last_name');
                                        echo form_error('inquire_last_name');
                                        echo form_input('inquire_last_name', set_value('inquire_last_name'), 'class="form-control" id="inquire_last_name"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Địa chỉ Email (*)', 'inquire_email');
                                        echo form_error('inquire_email');
                                        echo form_input('inquire_email', set_value('inquire_email'), 'class="form-control" id="inquire_email"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Xác nhận địa chỉ Email (*)', 'inquire_email_confirm');
                                        echo form_error('inquire_email_confirm');
                                        echo form_input('inquire_email_confirm', set_value('inquire_email_confirm'), 'class="form-control" id="inquire_email_confirm"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Số điện thoại liên hệ (*)', 'inquire_phone_number');
                                        echo form_error('inquire_phone_number');
                                        echo form_input('inquire_phone_number', set_value('inquire_phone_number'), 'class="form-control" id="inquire_phone_number"');
                                        ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
                                        <?php
                                        echo form_label('Ngày khởi hành mong muốn (*)', 'datepicker');
                                        echo form_error('datepicker');
                                        echo form_input('datepicker', set_value('datepicker'), 'class="form-control datepicker" readonly');
                                        ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
                                        <?php
                                        echo form_label('Đất nước (*)', 'inquire_country');
                                        echo form_error('inquire_country');
                                        echo form_input('inquire_country', set_value('inquire_country'), 'class="form-control" id="inquire_country"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Người lớn (*)', 'inquire_number_adults');
                                        echo form_error('inquire_number_adults');
                                        echo '<input type="number" class="form-control" id="inquire_number_adults" name="inquire_number_adults" min="0" placeholder="0" >';
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Trẻ từ 2 đến 11 tuổi (*)', 'inquire_number_children_u11');
                                        echo form_error('inquire_number_children_u11');
                                        echo '<input type="number" class="form-control" id="inquire_number_children_u11" name="inquire_number_children_u11" min="0" placeholder="0" >';
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Trẻ em dưới 2 tuổi (*)', 'inquire_number_children_u2');
                                        echo form_error('inquire_number_children_u2');
                                        echo '<input type="number" class="form-control" id="inquire_number_children_u2" name="inquire_number_children_u2" min="0" placeholder="0" >';
                                        ?>
									</div>

									<div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Tin nhắn (*)', 'inquire_message');
                                        echo form_error('inquire_message');
                                        echo form_textarea('inquire_message', set_value('inquire_message'), 'class="form-control" id="inquire_message"')
                                        ?>
									</div>

									<div class="col-xs-12">
										<input id="bookingsubmit" class="btn btn-primary" type="button" value="Đặt Tour!">
									</div>

                                    <?php echo form_close(); ?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="customize">
								<div class="row">
                                    <?php
                                    echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'form-customize'));
                                    ?>
									<div class="col-xs-12">
										<table class="table">
											<thead>
											<tr>
												<th>Chương trình mặc định</th>
												<th>Chương trình thay đổi</th>
											</tr>
											</thead>

											<tbody>
                                            <?php for ($i = 0;$i< count($detail['dateimg']);$i++): ?>
												<tr>
													<td>
														Ngày <?php echo $i+1; ?>
													</td>
													<td>
                                                        <?php
                                                        echo form_error('inquire_message[]');
                                                        echo form_textarea(array('name' => 'tour_change[]','rows' => '4'), set_value('tour_change'), array('class' =>'form-control','id' => 'tour_change_'.$i,))
                                                        ?>
													</td>
												</tr>
                                            <?php endfor ?>
											</tbody>
										</table>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Chức danh (*)', 'inquire_title');
                                        echo form_error('inquire_title');
                                        echo form_dropdown('inquire_title', $options =array('Mr' => 'Mr', 'Mrs' => 'Mrs', 'Ms' => 'Ms', 'Dr' => 'Dr'), set_value('inquire_title'), 'class="form-control" id="customize_title"')
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Tên (*)', 'inquire_first_name');
                                        echo form_error('inquire_first_name');
                                        echo form_input('inquire_first_name', set_value('inquire_first_name'), 'class="form-control" id="inquire_first_name"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Họ (*)', 'inquire_last_name');
                                        echo form_error('inquire_last_name');
                                        echo form_input('inquire_last_name', set_value('inquire_last_name'), 'class="form-control" id="inquire_last_name"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Địa chỉ Email (*)', 'inquire_email');
                                        echo form_error('inquire_email');
                                        echo form_input('inquire_email', set_value('inquire_email'), 'class="form-control" id="inquire_email"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Xác nhận địa chỉ Email (*)', 'inquire_email_confirm');
                                        echo form_error('inquire_email_confirm');
                                        echo form_input('inquire_email_confirm', set_value('inquire_email_confirm'), 'class="form-control" id="inquire_email_confirm"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Số điện thoại liên hệ (*)', 'inquire_phone_number');
                                        echo form_error('inquire_phone_number');
                                        echo form_input('inquire_phone_number', set_value('inquire_phone_number'), 'class="form-control" id="inquire_phone_number"');
                                        ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
                                        <?php
                                        echo form_label('Ngày khởi hành mong muốn (*)', 'datepicker');
                                        echo form_error('datepicker');
                                        echo form_input('datepicker', set_value('datepicker'), 'class="form-control datepicker" readonly');
                                        ?>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
                                        <?php
                                        echo form_label('Đất nước (*)', 'inquire_country');
                                        echo form_error('inquire_country');
                                        echo form_input('inquire_country', set_value('inquire_country'), 'class="form-control" id="inquire_country"');
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Người lớn (*)', 'inquire_number_adults');
                                        echo form_error('inquire_number_adults');
                                        echo '<input type="number" class="form-control" id="inquire_number_adults" name="inquire_number_adults" min="0" placeholder="0" >';
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Trẻ từ 2 đến 11 tuổi (*)', 'inquire_number_children_u11');
                                        echo form_error('inquire_number_children_u11');
                                        echo '<input type="number" class="form-control" id="inquire_number_children_u11" name="inquire_number_children_u11" min="0" placeholder="0" >';
                                        ?>
									</div>
									<div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        echo form_label('Trẻ em dưới 2 tuổi (*)', 'inquire_number_children_u2');
                                        echo form_error('inquire_number_children_u2');
                                        echo '<input type="number" class="form-control" id="inquire_number_children_u2" name="inquire_number_children_u2" min="0" placeholder="0" >';
                                        ?>
									</div>

									<div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Tin nhắn (*)', 'inquire_message');
                                        echo form_error('inquire_message');
                                        echo form_textarea('inquire_message', set_value('inquire_message'), 'class="form-control" id="inquire_message"')
                                        ?>
									</div>
									<div class="col-xs-12">
										<input id="customizesubmit" class="btn btn-primary" type="button" value="Đặt Tour!">
									</div>
                                    <?php echo form_close(); ?>
								</div>
							</div>
                            <div role="tabpanel" class="tab-pane" id="comment">
                                <div class="row">
                                    <div class="schedule col-sm-12 col-xs-12">
                                        <div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
                                            <form action="" method="post" accept-charset="utf-8">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                        <label for="name"><?php echo $this->lang->line('first-and-last-name');?></label><input type="text" name="name" value="" class="form-control" id="name" placeholder="<?php echo $this->lang->line('first-and-last-name');?>">
                                                        <span class="name_error" style="color: red"></span>
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                        <label for="email">Email</label><input type="text" name="email" value="" class="form-control" id="email" placeholder="Email">
                                                        <span class="email_error" style="color: red"></span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                        <label for="content"><?php echo $this->lang->line('comments');?></label><textarea name="content" cols="40" rows="10" class="form-control" id="content"></textarea>
                                                        <span class="content_error" style="color: red"></span>
                                                    </div>
                                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $detail['id'];?>">
                                                        <input type="hidden" name="comment_type" id="comment_type" value="0">
                                                        <input type="submit" name="submit" value="<?php echo $this->lang->line('comments');?>" class="btn btn-primary hvr-icon-forward submit-comment" style="">
                                                    </div>
                                                </div>
                                            </form>

                                            <div id="comment">
                                                <?php if (isset($comment)): ?>
                                                    <div class="show-comment">
                                                        <?php foreach ($comment as $key => $value): ?>
                                                            <div class="media cmt">
                                                                <div class="media-left">
                                                                    <img class="media-object" src="<?php echo site_url('assets/img/comment_ava.png') ?>" alt="Comment Avatar" width="64">
                                                                </div>
                                                                <div class="media-body">
                                                                    <h3 class="media-heading" style="color: #f4aa1c"><?php echo $value['name'] ?>:</h3>
                                                                    <span><?php echo $value['content'] ?></span>
                                                                    <span style="float: right; font-size: 1em"><?php echo date_format(date_create($value['created_at']), 'd-m-Y') ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endforeach ?>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="media cmt">
                                                        <p class="cmt_error"><?php echo $this->lang->line('there-are-no-comments-for-this-tour-yet'); ?></p>
                                                    </div>
                                                <?php endif ?>
                                                <div id="comment_readmore" style="display: none;">
                                                    <input type="hidden" name="count-comment" id="count-comment" value="<?php echo $count_comment ?>">
                                                    <button class="btn btn-primary btn-sm center-block" type="submit"><?php echo $this->lang->line('see-more-comments');?></button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>

			</div>
			<div class="right col-sm-3 col-xs-12">
				<div class="section-header">
					<div class="row">
						<div class="left col-xs-12">
							<h1>Tour liên quan</h1>
						</div>
					</div>
				</div>
				<?php foreach ($product_array as $key => $value): ?>
					<div class="row">
						<div class="item col-xs-12">
							<div class="wrapper">
								<div class="mask">
									<a href="<?php echo base_url('tours/'.$value['slug']) ?>">
										<img src="<?php echo base_url('/assets/upload/product/'.$value['slug'].'/'.$value['image']) ?>" alt="image">
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
									<h4 class="post-subtitle"><?php echo $value['parent_title'];?></h4>
									<h2 class="post-title" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></h2>
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
									<p class="post-description"><?php echo $value['description'];?></p>
								</div>
								
								<div class="foot">
									<ul class="list-inline">
										<li>
											<a href="<?php echo base_url('tours/'.$value['slug']) ?>" class="btn btn-primary" role="button" style="margin: 0px;">
												Xem chi tiết
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>

<script>
  $(function () {
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
  })
</script>
<script src="<?php echo base_url('assets/js/rating.js') ?>"></script>
<script src="<?php echo base_url('assets/js/detail_product.js') ?>"></script>
