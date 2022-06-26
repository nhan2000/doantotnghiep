<div class="container">
	<div class="title-main"><span><?=$row_detail['ten'.$lang]?></span></div>
	<div class="row rowrp album-gallery">
		<?php if(count($hinhanhsp)>0) { for($i=0;$i<count($hinhanhsp);$i++) { ?>
			<div class="col-md-3 col-sm-4 col-xs-6">
				<div class="img_album">
					<a class="album text-decoration-none" rel="album-<?=$row_detail['id']?>" href="<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
						<p class="pic-album scale-img"><img onerror="this.src='<?=THUMBS?>/480x360x2/assets/images/noimage.png';" src="<?=THUMBS?>/480x360x1/<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>" alt="<?=$row_detail['ten'.$lang]?>"/></p>
					</a>
				</div>
			</div>
		<?php } } else { ?>
			<div class="alert alert-warning" role="alert">
				<strong><?=dangcapnhat?></strong>
			</div>
		<?php } ?>
	</div>
</div>