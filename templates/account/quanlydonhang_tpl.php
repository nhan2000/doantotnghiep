<?php 
    if($_SESSION[$login_member]['id']>0)
    {
     
        $where .= " and id_user = '".$_SESSION[$login_member]['id']."' ";
    }
    $curPage = $get_page;
    $per_page = 10;
    $startpoint = ($curPage * $per_page) - $per_page;
    $limit = " limit ".$startpoint.",".$per_page;
    $sql = "select * from #_order where id<>0 $where order by ngaytao desc $limit";
    $info_dh = $d->rawQuery($sql);
    $sqlNum = "select count(*) as 'num' from #_order where id<>0 $where order by ngaytao desc";
    $count = $d->rawQueryOne($sqlNum);
    $total = $count['num'];
    $url = "account/lich-su-don-hang";
    $paging = $func->pagination($total,$per_page,$curPage,$url);

?>

<div class="w_1200 d-flex  align-items-start justify-content-between">
    <div class="left">
        <?php include TEMPLATE.LAYOUT."ql-account.php"; ?>
    </div>
    <div class="mid">
        <div class="w-clear">
            <div class="title-user">
                <span><?=lichsudonhang?></span>
            </div>
            <?php if ($info_dh) { ?>
                <div class="w-clear">
                    <div class="w-clear box-ds">
                        <table class="ds_dh" >
                            <tr style="border-bottom: 2px solid #cfcfcf;">
                                <th><?=madh?></th>
                                <th><?=thoigian?></th>
                                <th><?=tongtien?></th>
                                <th><?=trangthai?></th>
                                <th><?=chitiet?></th>
                            </tr>
                        <?php foreach ($info_dh as $key => $value) { 
                            $tinhtrang = $d->rawQueryOne("select trangthai from #_status where id = ?",array($value['tinhtrang']));
                            $order_detail = $d->rawQuery("select * from #_order_detail where id_order = ?",array($value['id']));
                        ?>
                           
                            <tr >
                                <td><?=$value['madonhang']?></td>
                                <td><?=date('H:i d/m/Y',$value['ngaytao'])?></td>
                                <td><?=$func->format_money($value['tonggia'])?></td>
                                <td><?=$tinhtrang['trangthai']?></td>
                                <td><a class="chitiet"><?=chitiet?></a></td>
                            </tr>
                            <tr class="none">
                                <td colspan="5" >
                                    <p class="w-clear" style="color: #f00;">
                                        <?=donhang?> <?=$value['madonhang']?>
                                    </p>
                                    <div class="w-clear">
                                        <table border="0" cellpadding="0" cellspacing="0" style="background:#f5f5f5" width="100%">
                                            <thead style="background: #11a14a;">
                                                <tr>
                                                    <th align="left"  style="padding:9px;color:#fff;">Sản phẩm</th>
                                                    <th align="left"  style="padding:9px;color:#fff;">Đơn giá</th>
                                                    <th align="center"  style="padding:9px;color:#fff;;min-width:55px;">Số lượng</th>
                                                    <th align="right"  style="padding:9px;color:#fff;">Tổng tạm</th>
                                                </tr>
                                            </thead>
                                            <?=htmlspecialchars_decode($value['noidung'])?>
                                        </table>
                                    </div>
                                    <?php /*
                                    <div class="w-clear">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Hình ảnh</th>
                                                    <th class="align-middle" style="width:30%">Tên sản phẩm</th>
                                                    <th class="align-middle text-center">Đơn giá</th>
                                                    <th class="align-middle text-right">Số lượng</th>
                                                    <th class="align-middle text-right">Tạm tính</th>
                                                </tr>
                                            </thead>
                                            <?php if(empty($order_detail)) { ?>
                                                <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                                            <?php } else {  ?>
                                                <tbody>
                                                    <?php foreach($order_detail as $k => $v) { ?>
                                                        <tr>
                                                            
                                                            <td class="align-middle">
                                                                <a title="<?=$v['ten']?>"><img class="rounded img-preview" onerror="src='<?=THUMBS?>/<?=$config['order']['thumb']?>/assets/images/noimage.png'" src="<?=THUMBS?>/<?=$config['order']['thumb']?>/<?=UPLOAD_PRODUCT_L.$v['photo']?>" alt="<?=$v['ten']?>"></a>
                                                            </td>
                                                            <td class="align-middle">
                                                                <p class="text-primary mb-1"><?=$v['ten']?></p>
                                                                <?php if($v['mau']!='' || $v['size']!='') { ?>
                                                                    
                                                                    <?php if($v['mau']!='') { ?>
                                                                        <div>Màu: <?=$v['mau']?></div>
                                                                    <?php } ?>
                                                                    <?php if($v['size']!='') { ?>
                                                                        <div>Size: <?=$v['size']?></div>
                                                                    <?php } ?>
                                                                   
                                                                <?php } ?>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <div class="price-cart-detail">
                                                                    <?php if($v['giamoi']) { ?>
                                                                        <div class="price-new-cart-detail"><?=$func->format_money($v['giamoi'])?></div>
                                                                    <?php } else { ?>
                                                                        <div class="price-new-cart-detail"><?=$func->format_money($v['gia'])?></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-right"><?=$v['soluong']?></td>
                                                            <td class="align-middle text-right">
                                                                <div class="price-cart-detail">
                                                                    <?php if($v['giamoi']) { ?>
                                                                        <div class="price-new-cart-detail"><?=$func->format_money($v['giamoi']*$v['soluong'])?></div>
                                                                    <?php } else { ?>
                                                                        <div class="price-new-cart-detail"><?=$func->format_money($v['gia']*$v['soluong'])?></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if(
                                                        (isset($config['order']['ship']) && $config['order']['ship'] == true)
                                                    ) { ?>
                                                        <tr>
                                                            <td colspan="4" class="title-money-cart-detail">Tạm tính:</td>
                                                            <td colspan="1" class="cast-money-cart-detail"><?=$func->format_money($value['tamtinh'])?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if(isset($config['order']['ship']) && $config['order']['ship'] == true) { ?>
                                                        <tr>
                                                            <td colspan="4" class="title-money-cart-detail">Phí vận chuyển:</td>
                                                            <td colspan="1" class="cast-money-cart-detail">
                                                                <?php if($value['phiship']) { ?>
                                                                    <?=$func->format_money($value['phiship'])?>
                                                                <?php } else { ?>
                                                                    Không
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="4" class="title-money-cart-detail">Tổng giá trị đơn hàng:</td>
                                                        <td colspan="1" class="cast-money-cart-detail text-right" ><?=$func->format_money($value['tonggia'])?></td>
                                                    </tr>
                                                </tbody>
                                            <?php  } ?>
                                        </table>
                                    </div>
                                    */ ?>
                                </td>
                            </tr>
                    
                        <?php } ?>
                        </table>
                        <?php //var_dump($info_dh); ?>
                    </div>
                </div>
            <?php }else{?> 
                <div class="pad_10">
                    <?=khongtimthayketqua?>.
                </div>
            <?php } ?>

            <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>

        </div>
    </div>
</div>