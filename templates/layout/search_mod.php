<div class="row_search flex_row">
    <div class="col_search">
        <input type="text" id="tukhoa"  placeholder="Nhập từ khóa tìm kiếm" value="<?= (isset($tukhoa) && $tukhoa != '') ? $tukhoa : ''  ?>">
    </div>
    <div class="col_search ">
        <?=$func->get_ajax_category('product', 'list', 'san-pham','Bất động sản')?>
    </div>
    <div class="col_search">
        <?=$func->get_ajax_place("city","Tỉnh/thành phố")?>
    </div>
    <div class="col_search">
        <?=$func->get_ajax_place("district",'Quận/huyện')?>
    </div>
    <div class="col_search">
        <?= $func->get_ajax_mod('mod_dientich',(isset($mod_dientich) && $mod_dientich != '') ? $mod_dientich : 0 ,'Diện tích') ?>
    </div>
    <div class="col_search">
        <?= $func->get_ajax_mod('mod_huong',(isset($mod_huong) && $mod_huong != '') ? $mod_huong : 0 ,'Hướng') ?>
    </div>
    <div class="col_search">
        <?= $func->get_ajax_mod('mod_gia',(isset($mod_gia) && $mod_gia != '') ? $mod_gia : 0 ,'Giá') ?>
    </div>
    <div class="col_search">
        <span class="btn_search">tìm kiếm ngay</span>
    </div>
</div>