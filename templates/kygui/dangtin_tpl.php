<div class="container">
	<div class="title_index"><span>Đăng tin</span></div>
	<div class="form_kygui" >
		<form class="form-kygui validation-kygui-index" novalidate method="post" action="" enctype="multipart/form-data">
			<div class="row_search flex_row">
			    <div class="col_search">
	                <label class="d-block" for="id_list">Danh mục cấp 1:</label>
					<?=$func->get_ajax_category('product', 'list', 'san-pham')?>
			    </div>
			    <div class="col_search">
	                <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
					<?=$func->get_ajax_category('product', 'cat','san-pham')?>
			    </div>
			    <div class="col_search">
	                <label class="d-block" for="id_item">Danh mục cấp 3:</label>
					<?=$func->get_ajax_category('product', 'item','san-pham')?>
			    </div>
			    <div class="col_search">
			    	<label class="d-block" for="id_mod_dientich">Danh mục diện tích:</label>
			        <?= $func->get_ajax_mod('mod_dientich',($pro['mod_dientich']>0) ? $pro['mod_dientich'] : 0 ,'Diện tích') ?>
			    </div>
			    <div class="col_search">
			    	<label class="d-block" for="id_mod_huong">Danh mục hướng:</label>
			        <?= $func->get_ajax_mod('mod_huong',($pro['mod_huong']>0) ? $pro['mod_huong'] : 0 ,'Hướng') ?>
			    </div>
			    <div class="col_search">
			    	<label class="d-block" for="id_mod_gia">Danh mục giá:</label>
			        <?= $func->get_ajax_mod('mod_gia',($pro['mod_gia']>0) ? $pro['mod_gia'] : 0 ,'Giá') ?>
			    </div>
			
			    <div class="col_search">
			    	<label class="d-block" for="id_city">Tỉnh thành:</label>
			        <?=$func->get_ajax_place("city","Tỉnh/thành phố")?>
			    </div>
			    <div class="col_search">
			    	<label class="d-block" for="id_district">Quận huyện:</label>
			        <?=$func->get_ajax_place("district",'Quận/huyện')?>
			    </div>

			</div>
			<div class="row rowrp">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="input_kygui">
						<label class="d-block" for="ten-dt">Tên bài viết:</label>
						<input name="ten-dt" type="text" required id="ten-dt" placeholder="Tiêu đề" value="<?=($pro['tenvi']!="") ? $pro['tenvi'] : '' ?>" />
						<div class="invalid-feedback">Vui lòng nhập tên</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="input_kygui">
						<label class="d-block" for="gia-dt">Giá:</label>
						<input name="gia-dt" type="text" id="gia-dt" placeholder="Giá" value="<?=($pro['gia']!="") ? $pro['gia'] : '' ?>"  />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="input_kygui">
						<label class="d-block" for="dientich-dt">Diện tích:</label>
						<input name="dientich-dt" type="text" id="dientich-dt" placeholder="Diện tích" />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="input_kygui">
						<label class="d-block" for="tinhtrang-dt">Tình trạng:</label>
						<input name="tinhtrang-dt" type="text" id="tinhtrang-dt" placeholder="Tình trạng" />
					</div>
				</div>
			</div>

			<div class="textarea_kygui">
				<label class="d-block" for="mota-dt">Mô tả ngắn:</label>
				<textarea class="form-control" id="mota-dt" name="mota-dt" placeholder="Mô tả"/><?=($pro['motavi']!="") ? $pro['motavi'] : '' ?></textarea>
			</div>
			
			<div class="textarea_kygui">
				<label class="d-block" for="noidung-dt">Nội dung:</label>
				<textarea class="form-control" id="noidung-dt" name="noidung-dt" placeholder="<?=noidung?>" rows="10" /><?=($pro['noidungvi']!="") ? strip_tags(htmlspecialchars_decode($pro['noidungvi'])) : '' ?></textarea>
			</div>
			<br>
			<div class="card card-primary card-outline text-sm">

        		<div class="card-body">
        			<div class="form-group"> 
        				<p class="title-user">
	                        <span>Ảnh đại diện</span>
	                    </p>
	                    <?php if ($_GET['act']=='edit') { ?>
	                    	<p class="w-clear">
	                    		<img class="img-responsive" onerror="this.src='thumbs/280x210x2/assets/images/noimage.png'" src="watermark/product/280x210x1/<?=UPLOAD_PRODUCT_L.$pro['photo']?>">
	                    	</p>
	                    <?php } ?>
	                    <p>
    						<input type="file" class="" name="photo-dt" id="photo-dt" accept="image/png, image/gif, image/jpeg">
        				</p>
        				<label for="photo-dt" class="label-filer-gallery mb-3">Định dạng: (.jpg|.gif|.png|.jpeg). Kích thước:560px X 420px</label>
        			</div>
        			<div class="form-group"> 
        				<p class="title-user">
	                        <span>Ảnh chi tiết</span>
	                    </p>
        				<?php for ($i=0; $i < 5; $i++) {  ?>
        					<div class="w-clear">
        						<strong>Ảnh <?=$i+1?></strong>
        					</div>
        					<?php if ($_GET['act']=='edit') { ?>
        					<div class="w-clear">
	                    		<img class="img-responsive" onerror="this.src='thumbs/280x210x2/assets/images/noimage.png'" src="watermark/product/280x210x1/<?=UPLOAD_PRODUCT_L.$gallery[$i]['photo']?>">
        					</div>
        					<?php } ?>
        					<p>
        						<input type="file" class="" name="file<?=$i?>" id="file<?=$i?>" accept="image/png, image/gif, image/jpeg">
	        				</p>
        				<?php } ?>
        				<label class="label-filer-gallery mb-3">Định dạng: (.jpg|.gif|.png|.jpeg). Kích thước:560px X 420px</label>
        				
        			</div>
        			
        		</div>
        	</div>
			<p class="title-user">
                <span>Thông tin liên lạc</span>
            </p>
            <div class="input_kygui">
				<input name="ten-kygui" type="text" required id="ten-kygui" placeholder="Họ tên ..." value="<?=($_SESSION[$login_member]['ten']!="")?$_SESSION[$login_member]['ten']:""?>" />
				<div class="invalid-feedback"><?=vuilongnhaphoten?></div>
			</div>
			<div class="input_kygui">
				<input name="diachi-kygui" type="text" id="diachi-kygui" placeholder="Địa chỉ ..." value="<?=($_SESSION[$login_member]['diachi']!="")?$_SESSION[$login_member]['diachi']:""?>" />
				<div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
			</div>
			<div class="input_kygui">
				<input name="dienthoai-kygui" type="text" required id="dienthoai-kygui" placeholder="Số điện thoại ..." value="<?=($_SESSION[$login_member]['dienthoai']!="")?$_SESSION[$login_member]['dienthoai']:""?>" />
				<div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
			</div>
			<div class="input_kygui">
				<input name="email-kygui" type="text" id="email-kygui" placeholder="Email ..." value="<?=($_SESSION[$login_member]['email']!="")?$_SESSION[$login_member]['email']:""?>" />
				<div class="invalid-feedback"><?=vuilongnhapemail?></div>
			</div>

			<div class="kygui-button flex">
				<?php if ($_GET['act']=='edit') { ?>

					<a class="button btn btn-primary" href="account/quan-ly-tin-dang" onclick="return confirm('Bạn có muốn thoát khỏi bài này?');">Thoát</a> 
					<input type="submit"  id="submit-dangtin" name="submit-dangtin" disabled value="Cập nhật">

				<?php }else{ ?>
					<input type="submit"  id="submit-dangtin" name="submit-dangtin" disabled value="Gửi">
				<?php } ?>

				<input type="reset" class="btn btn-secondary" value="<?=nhaplai?>" />

				<input type="hidden" name="recaptcha_response_dangtin" id="recaptchaResponsekygui">
				<input type="hidden" name="type-dangtin" value="dangtin">
			</div>
		</form>
	</div>
</div>
