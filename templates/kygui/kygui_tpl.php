<div class="container">
	<div class="flex_row">
		<div class="col_left">
			<div class="search_bds_in">
				<div class="title_left"><span>Tìm kiếm</span></div>
				<div class="content_left">
					<div class="padding_search_in">
					<?php include TEMPLATE.LAYOUT."search_mod.php"; ?>
					</div>
				</div>
			</div>
			<?php include TEMPLATE.LAYOUT."menu_left.php"; ?>
		</div>
		<div class="col_right">
			<div class="title_index"><span>Ký gửi</span></div>
			<div class="row rowrp">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="content-main"><?=(isset($kygui['noidung'.$lang]) && $kygui['noidung'.$lang] != '') ? htmlspecialchars_decode($kygui['noidung'.$lang]) : ''?></div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form_kygui" >
						<form class="form-kygui validation-kygui-index" novalidate method="post" action="" enctype="multipart/form-data">
							<div class="input_kygui">
								<input name="ten-kygui" type="text" required id="ten-kygui" placeholder="Họ tên ..." />
								<div class="invalid-feedback"><?=vuilongnhaphoten?></div>
							</div>
							<div class="input_kygui">
								<input name="diachi-kygui" type="text" required id="diachi-kygui" placeholder="Địa chỉ ..." />
								<div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
							</div>
							<div class="input_kygui">
								<input name="dienthoai-kygui" type="text" required id="dienthoai-kygui" placeholder="Số điện thoại ..." />
								<div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
							</div>
							<div class="input_kygui">
								<input name="tieude-kygui" type="text" required id="tieude-kygui" placeholder="Tiêu đề ..." />
								<div class="invalid-feedback"><?=vuilongnhaptieude?></div>
							</div>
							<div class="input_kygui ">
								<input type="file" class="custom-file-input" name="file">
							</div>
							<div class="input_kygui">
								<textarea class="form-control" id="noidung-kygui" name="noidung-kygui" placeholder="<?=noidung?>" /></textarea>
							</div>
							<div class="kygui-button flex">
								<input type="submit"  id="submit-kygui" name="submit-kygui" disabled value="Gửi">
								<input type="reset" class="btn btn-secondary" value="<?=nhaplai?>" />
								<input type="hidden" name="recaptcha_response_kygui" id="recaptchaResponsekygui">
								<input type="hidden" name="type-kygui" value="kygui">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
