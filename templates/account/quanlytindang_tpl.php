<?php 
if($_SESSION[$login_member]['id']>0)
{

    $where .= " and id_user = '".$_SESSION[$login_member]['id']."' ";
}
$curPage = $get_page;
$per_page = 10;
$startpoint = ($curPage * $per_page) - $per_page;
$limit = " limit ".$startpoint.",".$per_page;
$sql = "select * from #_product where id<>0 $where order by ngaytao desc $limit";
$info_dh = $d->rawQuery($sql);
$sqlNum = "select count(*) as 'num' from #_product where id<>0 $where order by ngaytao desc";
$count = $d->rawQueryOne($sqlNum);
$total = $count['num'];
$url = "account/lich-su-don-hang";
$paging = $func->pagination($total,$per_page,$curPage,$url);

?>

<div class="container  ">
    <div class="flex_row">
        <div class="col_left">
            <?php include TEMPLATE.LAYOUT."quanlytk.php"; ?>
        </div>
        <div class="col_right">
            <div class="w-clear">
                <div class="title_index">
                    <span>Lịch sử tin đăng</span>
                </div>
                <?php if ($info_dh) { ?>
                    <div class="w-clear">
                        <div class="w-clear box-ds">
                            <table class="ds_dh" cellpadding="5">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th style="width: 150px;">Thời gian đăng</th>
                                        <th style="width: 100px;text-align: center;">Trạng thái</th>
                                        <th style="width: 90px;text-align: center;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($info_dh as $key => $value) {  ?>

                                        <tr >
                                            <td><?=$value['tenvi']?></td>
                                            <td><?=date('H:i d/m/Y',$value['ngaytao'])?></td>
                                            <td style="text-align: center;"><?=($value['hienthi']==0)?'<span class="red">Chưa duyệt</span>':'<span class="green">Đã duyệt</span>'?></td>
                                            <td style="text-align: center;">
                                                <a href="dang-tin?act=edit&id=<?=$value['id']?>">Sửa</a> 
                                                / 
                                                <a href="dang-tin?act=delete&id=<?=$value['id']?>" onclick="return confirm('Bạn có muốn xóa bài này?');">Xóa</a> 
                                            </td>
                                        </tr>
                                     

                                    <?php } ?>
                                </tbody>
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
</div>