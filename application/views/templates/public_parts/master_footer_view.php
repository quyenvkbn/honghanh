</section>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="item col-sm-4 col-xs-12">
				<div class="left col-sm-12">
					<a href="<?php echo base_url('') ?>">
						<img src="<?php echo site_url('assets/img/')?>logo-w.png" alt="logo Diamond">
					</a>
					<h1>Diamond Tour</h1>
				</div>
			</div>
			<div class="item col-sm-4 col-xs-12">
				<div class="info">
					<label>
						<i class="fa fa-map-marker"></i> Địa chỉ
					</label>
					<h2>Dia chi trung tam</h2>
				</div>
				<div class="info">
					<label>
						<i class="fa fa-phone"></i> Điện thoại
					</label>
					<h2>0869 770 333</h2>
				</div>
				<div class="info">
					<label>
						<i class="fa fa-envelope-o"></i> Email
					</label>
					<h2>info@vajratravel.vn</h2>
				</div>
			</div>
			<div class="item col-sm-4 col-xs-12">
				<div class="info">
					<label>
						<i class="fa fa-globe"></i> Theo dõi chúng tôi tại
					</label>

					<ul class="list-inline">
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-facebook-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-pinterest-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-linkedin-square" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fa fa-2x fa-youtube-square" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<ul class="text-center list-inline">
				<li>
					<a href="<?php echo base_url('') ?>">Trang chủ</a>
				</li>
				<li >
					<a href="<?php echo base_url('danh-muc/hanh-huong-trong-nuoc') ?>">
						Hành hương trong nước
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('danh-muc/hanh-huong-nuoc-ngoai') ?>">
						Hành hương nước ngoài
					</a>
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

			<div class="copyright text-center">
				<b>&copy; 2018 Vajra Travel</b> | All Rights Reversed
			</div>
		</div>
	</div>
</footer>


<script type="text/javascript">
	$('.menu-tabs').hover(function(){
		$('li.menu-href').removeClass('active');
		$(this).find('li.menu-href').first().addClass('active');
	});
	$('li.menu-href').hover(function(){
		$('li.menu-href').removeClass('active');
		$(this).addClass('active');
	});
</script>

<script src="<?php echo site_url('assets/lib/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo site_url('assets/lib/bootstrap/js/daterangepicker.js') ?>"></script>
<script src="<?php echo site_url('assets/js/') ?>main.js"></script>
<script src="<?php echo site_url('assets/js/') ?>client.js"></script>

</body>
</html>
