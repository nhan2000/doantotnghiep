<header>
	<div class="topone">
		<div class="container">
			<div class="topone_flex flex ">
				<div class="topone_left">
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$optsetting['diachi'.$lang]?> </p>
				</div>
				<div class="topone_center">
					<p><i class="fa fa-envelope" aria-hidden="true"></i><?=$optsetting['email']?></p>
				</div>
				<div class="topone_right">
					<div class="mangxahoi_header flex">
						<?php for($i=0;$i<count($mangxahoi_header);$i++) { ?>
							<a href="<?=$mangxahoi_header[$i]['link']?>" target="_blank"><img src="<?=UPLOAD_PHOTO_L.$mangxahoi_header[$i]['photo']?>" alt="<?=$mangxahoi_header[$i]['ten'.$lang]?>"></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrap-top">
		<div class="container">
			<div class='wrap-top-row flex flex_wrap'>
				<div class="logo">
					<a class="logo-header" href=""><img class="img-responsive" onerror="this.src='<?=THUMBS?>/150x125x2/assets/images/noimage.png';" src="<?=UPLOAD_PHOTO_L.$logo['photo']?>"/></a>
				</div>
				<div class="banner">
					<a class="banner-header" href=""><img class="img-responsive" onerror="this.src='<?=THUMBS?>/500x125x2/assets/images/noimage.png';" src="<?=UPLOAD_PHOTO_L.$banner['photo']?>"/></a>
				</div>
				<div class="w-clear banner-right">
					<div class="hotline">
						<p><span> <?=$optsetting['hotline']?></span></p>
					</div>
					<div class="user-header">
						<a href="dang-tin"><i class="fas fa-file-signature"></i> <span>Đăng tin</span></a>
						<?php if(array_key_exists($login_member, $_SESSION) && $_SESSION[$login_member]['active'] == true) { ?>
							<a href="account/thong-tin">
								<i class="fas fa-user"></i>
								<span>Hi, <?=$_SESSION[$login_member]['username']?></span>
							</a>
							<?php /*
							<a href="account/dang-xuat">
								<i class="fas fa-sign-out-alt"></i>
								<span><?=dangxuat?></span>
							</a>
							*/ ?>
						<?php } else { ?>

							<a href="account/dang-nhap">
								<i class="fas fa-sign-in-alt"></i>
								<span><?=dangnhap?></span>
							</a>
							<a href="account/dang-ky">
								<i class="fas fa-user-plus"></i>
								<span><?=dangky?></span>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
