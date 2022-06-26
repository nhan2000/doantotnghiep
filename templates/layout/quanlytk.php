<div class="box-left w-clear">
    <div class="title_left">
        <span class="name">
            Quản lý tài khoản
        </span>
    </div>
    <div class="content_left ">
    <ul class="ul_list">
        <li class="cap1 <?=($com=='thong-tin-tai-khoan')?"act":""?>">
            <a href="account/thong-tin">
                Thông tin tài khoản
            </a>
        </li>
        <?php /*
        <li class="cap1 <?=($com=='favorite-product')?"act":""?>">
            <a href="favorite-product.html">
                <?=_sanphamyeuthich?>
            </a>
        </li>
        */ ?>
        <li class="cap1 <?=($com=='quan-ly-tin-dang')?"act":""?>">
            <a href="account/quan-ly-tin-dang">
                Quản lý tin đăng
            </a>
        </li>
        <li class="cap1 <?=($idl==$dm_c['id'])?"act":""?>">
            <a href="account/dang-xuat">
                Đăng xuất
            </a>
        </li>

    </ul>
</div>
</div>