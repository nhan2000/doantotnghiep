<?php if(count($splistindex)) { ?>
   <?php for($i=0;$i<count($splistindex); $i++) {
    $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_cat where id_list = ? and hienthi > 0 order by stt,id desc",array($splistindex[$i]['id'])); ?>
    <div class="content_left">
        <div class="title_left">
            <a class="transition" title="<?=$splistindex[$i]['ten'.$lang]?>" href="<?=$splistindex[$i][$sluglang]?>"><?=$splistindex[$i]['ten'.$lang]?></a>
        </div>
        <?php if(count($spcatmenu)>0) { ?>
            <ul class="ul_list"> 
                <?php for($j=0;$j<count($spcatmenu);$j++) {
                    $spitemmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_item where id_cat = ? and hienthi > 0 order by stt,id desc",array($spcatmenu[$j]['id'])); ?>
                    <li class="li_cat">
                        <a class="transition" title="<?=$spcatmenu[$j]['ten'.$lang]?>" href="<?=$spcatmenu[$j][$sluglang]?>"><?=$spcatmenu[$j]['ten'.$lang]?></a>
                        <?php if(count($spitemmenu)) { ?>
                            <ul class="ul_cat">
                                <?php for($u=0;$u<count($spitemmenu);$u++) {  ?>
                                    <li>
                                        <a class="transition" title="<?=$spitemmenu[$u]['ten'.$lang]?>" href="<?=$spitemmenu[$u][$sluglang]?>"><?=$spitemmenu[$u]['ten'.$lang]?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
<?php } ?>
<?php } ?>


<div class="content_left">
    <div class="title_left">
        <span>Hỗ trợ trực tuyến</span>
    </div>
    <div class="content_left padding_left">
        <img class="img-responsive" onerror="this.src='assets/images/img_tuvan.png';" src="<?=UPLOAD_PHOTO_L.$banner_hotro['photo']?>"/>
        <div class="hotline_left">
            <p>
                Hotline <span><?=$optsetting['hotline']?></span>
            </p>
        </div>
        <div class="ht">
            <div class="title_ct">Hỗ trợ online </div>
            <?php foreach ($ht as $k => $v) {
             $info_ht = (isset($v['info_more']) && $v['info_more'] != '') ? json_decode($v['info_more'],true) : null;
             echo'<div class="ht_item flex"><p>'.$v['ten'.$lang].'</p> <span>'.$info_ht['dienthoai'].'</span> <div class="link_ht flex"><a href="'.$info_ht['link_viber'].'" target="_blank"><img alt="Viber" src="assets/images/vb.png" ></a><a href="'.$info_ht['link_zalo'].'" target="_blank"><img alt="Viber" src="assets/images/zl.png" ></a></div></div>';
         } ?>
     </div>
     <div class="info_contact">
        <div class="title_ct">Thông tin liên hệ</div>
        <?php if($optsetting['dienthoai']!=''){ ?><p>Điện thoại: <span><?=$optsetting['dienthoai']?></span></p><?php } ?>
        <p>Email: <?=$optsetting['email']?></p>
    </div>
</div>
</div>

<?php if(isset($tintuc) && count($tintuc)>0){ ?>
<div class="content_left">
    <div class="title_left">
        <span>Tin bất động sản</span>
    </div>
    <div class="content_left padding_left2">
     <div class="newshome-scroll">
        <ul>
            <?php foreach($tintuc as $k=>$v){   ?>
                <li>
                    <div class="news_index_box ">
                        <div class="news_index_content flex_row">
                            <div class="news_index_img">
                                <a href="<?= $v['tenkhongdau'.$lang] ?>" title="<?= $v['ten'.$lang] ?>" >
                                    <img class="img-responsive" onerror="this.src='<?=THUMBS?>/100x75x2/assets/images/noimage.png';" src="<?=THUMBS?>/100x75x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?= $v['ten'.$lang] ?>" />
                                </a>
                            </div>
                            <div class="news_index_name">
                                <a href="<?= $v['tenkhongdau'.$lang] ?>" title="<?= $v['ten'.$lang] ?>" >
                                    <?= $v['ten'.$lang] ?> 
                                </a>
                            </div>
                        </div>
                        <div class="news_index_describe">
                            <p><?= $v['mota'.$lang] ?></p>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
</div>
 <?php } ?>