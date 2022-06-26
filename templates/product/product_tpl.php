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
            <div class="title_index"><span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span></div>
            <div class="content-main ">
                <?php if(isset($product) && count($product) > 0) { 
                    echo'<div class="row rowrp" >';
                    foreach($product as $k=>$v){ $func->showProduct($v,'col-xs-6 col-sm-4 col-md-4'); }
                    echo'</div>';?>
                    <div class="clear"></div>
                    <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
                <?php } else { ?>
                    <div class="alert alert-warning" role="alert">
                        <strong><?=($com=='tim-kiem')?khongtimthayketqua:dangcapnhat?></strong>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>