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
            <h2 class="title_index"><span >Chi tiết </span></h2>
            <div class="row rowrp">
                <div class="left-pro-detail col-md-6 col-sm-6 col-xs-12">
                    <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>"><img onerror="this.src='<?=WATERMARK?>/product/560x420x1/assets/images/noimage.png';" src="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>"></a>
                    <?php if($hinhanhsp) { if(count($hinhanhsp) > 0) { ?>
                        <div class="gallery-thumb-pro">
                            <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
                            <div class="owl-carousel owl-theme owl-thumb-pro">
                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten'.$lang]?>"><img onerror="this.src='<?=WATERMARK?>/product/560x420x1/assets/images/noimage.png';" src="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" alt="<?=$row_detail['ten'.$lang]?>"></a>
                                <?php foreach($hinhanhsp as $v) { ?>
                                    <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" title="<?=$row_detail['ten'.$lang]?>">
                                        <img onerror="this.src='<?=WATERMARK?>/product/560x420x1/assets/images/noimage.png';" src="<?=WATERMARK?>/product/560x420x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?=$row_detail['ten'.$lang]?>">
                                    </a>
                                <?php } ?>
                            </div>
                            <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
                        </div>
                    <?php } } ?>
                </div>
                <div class="right-pro-detail  col-md-6 col-sm-6 col-xs-12">
                    <p class="title-pro-detail"><?=$row_detail['ten'.$lang]?></p>
                    <?php $infomore_pr = (isset($row_detail['info_more']) && $row_detail['info_more'] != '') ? json_decode($row_detail['info_more'],true) : null; ?>
                    <ul class="attr-pro-detail">
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail"><?=danhgia?>:</label>
                            <div class="attr-content-pro-detail ">
                                <div class="ratting rattings <?=(in_array($row_detail['id'], $_SESSION['ratted']))?"ratted":""?>" data-reviewcount="<?=$row_detail['review_count']?>">
                                    <?php for ($i=0; $i < 5; $i++) { ?>
                                        <a data-sp="<?=$row_detail["id"]?>" data-ratting="<?=$i+1?>"  class="rating_icon <?php if($rating > $i || $row_detail['review_count']==0){ echo 'check';} ?>">
                                            <i class="fas fa-star "></i>
                                        </a>
                                    <?php } ?>
                                </div>
                                <span class="ghichu_ratting">
                                    (<span><?=($row_detail['review_count']==0)?'Chưa có':($row_detail['review_count'])?></span> lượt đánh giá)
                                </span>
                            </div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail"><?=masp?>:</label>
                            <div class="attr-content-pro-detail masp-attr-content-pro-detail"><?=(isset($row_detail['masp']) && $row_detail['masp'] != '') ? $row_detail['masp'] : ''?></div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail">Diện tích:</label>
                            <div class="attr-content-pro-detail"><?=(isset($infomore_pr['dientich']) && $infomore_pr['dientich'] != '') ? $infomore_pr['dientich'] : 0?></div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail">Hướng:</label>
                            <div class="attr-content-pro-detail"><?=(isset($row_detail['mod_huong']) && $row_detail['mod_huong'] != '') ? $func->get_name_huong($row_detail['mod_huong']) : 0?></div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail">Tình trạng:</label>
                            <div class="attr-content-pro-detail masp-attr-content-pro-detail"><?=(isset($infomore_pr['tinhtrang']) && $infomore_pr['tinhtrang'] != '') ? $infomore_pr['tinhtrang'] : 0?></div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail">Giá bán:</label>
                            <div class="attr-content-pro-detail"><?=(isset($infomore_pr['gia']) && $infomore_pr['gia'] != '') ? $infomore_pr['gia'] : 0?></div>
                        </li>
                        <li class="w-clear"> 
                            <label class="attr-label-pro-detail"><?=luotxem?>:</label>
                            <div class="attr-content-pro-detail"><?=$row_detail['luotxem']?></div>
                        </li>
                    </ul>
                    <div class="desc-pro-detail"><?=(isset($row_detail['mota'.$lang]) && $row_detail['mota'.$lang] != '') ? htmlspecialchars_decode($row_detail['mota'.$lang]) : ''?></div>
                    <div class="social-plugin social-plugin-pro-detail w-clear">
                        <div class="addthis_inline_share_toolbox_qj48"></div>
                        <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
                    </div>
                </div>
            </div>
            <div class="tags-pro-detail w-clear">
                <?php if(isset($pro_tags) && count($pro_tags) > 0) { foreach($pro_tags as $v) { ?>
                    <a class="transition text-decoration-none w-clear" href="<?=$v[$sluglang]?>" title="<?=$v['ten'.$lang]?>"><i class="fas fa-tags"></i><?=$v['ten'.$lang]?></a>
                <?php } } ?>
            </div>
            <div class="tabs-pro-detail">
                <ul class="ul-tabs-pro-detail w-clear">
                    <li class="active transition" data-tabs="info-pro-detail"><?=thongtinsanpham?></li>
                    <li class="transition" data-tabs="commentfb-pro-detail"><?=binhluan?></li>
                    <div class="clearfix"></div>
                </ul>
                <div class="content-tabs-pro-detail info-pro-detail active"><?=(isset($row_detail['noidung'.$lang]) && $row_detail['noidung'.$lang] != '') ? htmlspecialchars_decode($row_detail['noidung'.$lang]) : ''?></div>
                <div class="content-tabs-pro-detail commentfb-pro-detail"><div class="fb-comments" data-href="<?=$func->getCurrentPageURL()?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div></div>
            </div>
            <?php if(isset($product) && count($product) > 0) {  ?>
                <div class="title-main"><span><?=sanphamcungloai?></span></div>
                <div class="content-main w-clear">
                    <?php 
                    echo'<div class="row rowrp" >';
                    foreach($product as $k=>$v){ $func->showProduct($v,'col-xs-6 col-sm-4 col-md-4'); }
                    echo'</div>'; 
                    ?>
                    <div class="clearfix"></div>
                    <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>