<div class="padding_index padding">
	<div class="container">
		<div class="flex_row">
			<div class="col_left">
				<?php include TEMPLATE.LAYOUT."menu_left.php"; ?>
			</div>
			<div class="col_right">
				<?php if(count($product_list)) { foreach($product_list as $vlist) { ?>
					<div class="wrap-product-index">
						<h2 class="title_index"><span ><?=$vlist['ten'.$lang]?></span><a href="<?= $vlist['tenkhongdauvi'] ?>" title="Xem tất cả">Xem tất cả >></a></h2>
						<div class="paging-product-category paging-product-category-<?=$vlist['id']?>" data-list="<?=$vlist['id']?>"></div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</div>
</div>
<div class="media_index padding">
	<div class="container">
		<div class="flex_row row_media">
			<div class="media_left">
				<div class="dangkynhantin" >
					<h2 class="title_form">đăng ký nhận tin<span>Điền đầy đủ thông tin vào form bên dưới để đăng ký nhận tin mới nhất</span></h2>
					<form class="form-newsletter validation-newsletter-index" novalidate method="post" action="" enctype="multipart/form-data">
						<div class="newsletter-row">
							<div class="input_">
								<input name="ten-newsletter" type="text" required id="ten-newsletter" placeholder="Họ tên ..." />
								<div class="invalid-feedback"><?=vuilongnhaphoten?></div>
							</div>
							<div class="input_">
								<input name="dienthoai-newsletter" type="text" required id="dienthoai-newsletter" placeholder="Số điện thoại ..." />
								<div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
							</div>
							<div class="input_">
								<input name="diachi-newsletter" type="text" required id="diachi-newsletter" placeholder="Địa chỉ ..." />
								<div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
							</div>
							<div class="input_">
								<input name="email-newsletter" type="text" required id="email-newsletter" placeholder="Email ..." />
								<div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
							</div>
							<div class="input_">
								<textarea class="form-control" id="noidung-newsletter" name="noidung-newsletter" placeholder="<?=noidung?>" required /></textarea>
							</div>
						</div>  
						<div class="newsletter-button">
							<input type="submit"  id="submit-newsletter" name="submit-newsletter" disabled value="Gửi đăng ký">
							<input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
							<input type="hidden" name="type-newsletter" value="dangkynhantin">
						</div>
					</form>
				</div>
			</div>
			<div class="media_right">
				<div id="bandoiframe">
					<?=$addons->setAddons('footer-map', 'footer-map', 10);?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(isset($doitac) && count($doitac)>0){ ?>
	<div class="doitac_index padding">
		<div class="container">
			<h2 class="title-main">Đối tác khách hàng</h2>
			<div class="<?php if(count($doitac)>6){ echo'owl-doitac owl-carousel';}else{ echo'row_doitac flex_row';}?>">
				<?php foreach($doitac as $k=>$v){   ?>
					<div class="<?php if(count($doitac)<6){ echo'col-doitac';} ?>">
						<div class="doitac_box">
							<div class="doitac_img img_">
								<a target="_blank" href="<?= $v['link'] ?>" title="<?= $v['ten'.$lang] ?>" >
									<img class="img-responsive" onerror="this.src='<?=THUMBS?>/180x80x2/assets/images/noimage.png';" src="<?=THUMBS?>/180x80x2/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?= $v['ten'.$lang] ?>" />
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>