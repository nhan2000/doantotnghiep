<footer>
    <div class="container">
        <div class="row_footer flex">
            <div class="footer1">
                <div class="ttft1">Thông tin liên hệ</div>
                <div class="tencty">
                    <?=$setting['ten'.$lang]?>
                </div>
                <div class="noidungfooter">
                    <p><?=$optsetting['diachi'.$lang]?></p>
                    <p><?=$optsetting['dienthoai']?></p>
                    <p><?=$optsetting['email']?></p>
                    <p><?=$optsetting['website']?></p>
                </div>
                <div class="mangxahoi_footer">
                    <?php for($i=0;$i<count($mangxahoi_footer);$i++) { ?>
                    <a href="<?=$mangxahoi_footer[$i]['link']?>" target="_blank"><img
                            src="<?=UPLOAD_PHOTO_L.$mangxahoi_footer[$i]['photo']?>"
                            alt="<?=$mangxahoi_footer[$i]['ten'.$lang]?>"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer2">
                <div class="ttft1">Chính sách</div>
                <div class="chinhsach">
                    <?php foreach($cs as $k=>$v){ ?>
                    <a href="<?=$v['tenkhongdau'.$lang]?>" title="<?=$v['ten'.$lang]?>">
                        <?=$v['ten'.$lang]?> </a>
                    <?php } ?>
                </div>
            </div>
            <div class="footer3">
                <div class="ttft1">fanpage</div>
                <?=$addons->setAddons('fanpage-facebook', 'fanpage-facebook', 10);?>
            </div>
        </div>
    </div>
</footer>
<div class="copppy">
    <div class="container">
        <div class="row rowrp">
            <div class="col-md-6 col-sm-6 col-xs-12 coppyright">
                2020 Copyright © <?=$optsetting['coppyright']?> . All rights reserved. Design by Nhan
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 thongke">
                <?=dangonline?>: <?=$online?><span>|</span>
                <?=homnay?>: <?=$counter['today']?><span>|</span>
                <?=trongthang?>: <?=$counter['month']?><span>|</span>
                <?=tongtruycap?>: <?=$counter['total']?>
            </div>
        </div>
    </div>
</div>