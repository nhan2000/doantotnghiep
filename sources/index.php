<?php  
	if(!defined('SOURCES')) die("Error");

	$bannerqc = $d->rawQueryOne("select ten$lang, photo, link, hienthi from #_photo where type = ? and act = ? limit 0,1",array('bannerqc','photo_static'));
    $slider = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('slide'));

    $about = $d->rawQueryOne("select ten$lang,mota$lang,photo from #_static where type = ? limit 0,1",array('gioi-thieu'));

    $product_list = $d->rawQuery("select ten$lang, tenkhongdauvi, tenkhongdauen, id from #_product_list where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('san-pham'));

    $doitac = $d->rawQuery("select ten$lang, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('doitac'));

    /* SEO */
    $seoDB = $seo->getSeoDB(0,'setting','capnhat','setting');
    $seo->setSeo('h1',$seoDB['title'.$seolang]);
    $seo->setSeo('title',$seoDB['title'.$seolang]);
    $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
    $seo->setSeo('description',$seoDB['description'.$seolang]);
    $seo->setSeo('url',$func->getPageURL());
    $img_json_bar = (isset($logo['options']) && $logo['options'] != '') ? json_decode($logo['options'],true) : null;
    if($img_json_bar['p'] != $logo['photo'])
    {
        $img_json_bar = $func->getImgSize($logo['photo'],UPLOAD_PHOTO_L.$logo['photo']);
        $seo->updateSeoDB(json_encode($img_json_bar),'photo',$logo['id']);
    }
    $seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PHOTO_L.$logo['photo']);
    $seo->setSeo('photo:width',$img_json_bar['w']);
    $seo->setSeo('photo:height',$img_json_bar['h']);
    $seo->setSeo('photo:type',$img_json_bar['m']);
?>