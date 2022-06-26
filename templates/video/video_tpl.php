<div class="container">
    <div class="title-main"><span><?=@$title_crumb?></span></div>
    <div class="content-main w-clear">
        <?php if(isset($video) && count($video) > 0) {
            echo'<div class="row rowrp" >';
            for($i=0;$i<count($video);$i++) { ?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a class="video text-decoration-none" data-fancybox="video" data-src="<?=$video[$i]['link_video']?>" title="<?=$video[$i]['ten'.$lang]?>">
                        <p class="pic-video scale-img"><img onerror="this.src='<?=THUMBS?>/480x360x2/assets/images/noimage.png';" src="https://img.youtube.com/vi/<?=$func->getYoutube($video[$i]['link_video'])?>/0.jpg" alt="<?=$video[$i]['ten'.$lang]?>"/></p>
                        <h3 class="name-video text-split"><?=$video[$i]['ten'.$lang]?></h3>
                    </a>
                </div>
            <?php } 
            echo'</div>'; ?>
            <div class="clear"></div>
            <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
        <?php  } else { ?>
            <div class="alert alert-warning" role="alert">
                <strong><?=dangcapnhat?></strong>
            </div>
        <?php } ?>
    </div>
</div>