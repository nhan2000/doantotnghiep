<?php

    /* Sản phẩm */

    $nametype = "san-pham";

    $config['product'][$nametype]['title_main'] = "Sản phẩm";

    $config['product'][$nametype]['dropdown'] = true;

    $config['product'][$nametype]['list'] = true;

    $config['product'][$nametype]['cat'] = true;

    $config['product'][$nametype]['item'] = true;

    $config['product'][$nametype]['sub'] = false;

    $config['product'][$nametype]['brand'] = false;

    $config['product'][$nametype]['mau'] = false;

    $config['product'][$nametype]['size'] = false;

    $config['product'][$nametype]['tags'] = false;

    $config['product'][$nametype]['import'] = false;

    $config['product'][$nametype]['export'] = false;

    $config['product'][$nametype]['view'] = true;

    $config['product'][$nametype]['copy'] = true;

    $config['product'][$nametype]['copy_image'] = false;

    $config['product'][$nametype]['slug'] = true;

    $config['product'][$nametype]['check'] = array("noibat"=>"Nổi bật","new"=>"New");

    $config['product'][$nametype]['images'] = true;

    $config['product'][$nametype]['show_images'] = true;

    $config['product'][$nametype]['gallery'] = array

    (

        $nametype => array

        (

            "title_main_photo" => "Hình ảnh Sản phẩm",

            "title_sub_photo" => "Hình ảnh",

            "number_photo" => 3,

            "images_photo" => true,

            "cart_photo" => true,

            "avatar_photo" => true,

            "tieude_photo" => true,

            "width_photo" => 560,

            "height_photo" => 420,

            "thumb_photo" => '100x100x1',

            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'

        ),

    );

    $config['product'][$nametype]['ma'] = true;

    $config['product'][$nametype]['gia'] = false;

    $config['product'][$nametype]['giamoi'] = false;

    $config['product'][$nametype]['giakm'] = false;

    $config['product'][$nametype]['gia_text'] = true;

    $config['product'][$nametype]['dientich'] = true;

    $config['product'][$nametype]['tinhtrang'] = true;

    $config['product'][$nametype]['tinh'] = true;

    $config['product'][$nametype]['huyen'] = true;

    $config['product'][$nametype]['phuong'] = true;

    $config['product'][$nametype]['mod_dientich'] = true;

    $config['product'][$nametype]['mod_huong'] = true;

    $config['product'][$nametype]['mod_gia'] = true;

    $config['product'][$nametype]['mota'] = true;

    $config['product'][$nametype]['mota_cke'] = false;

    $config['product'][$nametype]['noidung'] = true;

    $config['product'][$nametype]['noidung_cke'] = true;

    $config['product'][$nametype]['seo'] = true;

    $config['product'][$nametype]['width'] = 280;

    $config['product'][$nametype]['height'] = 210;

    $config['product'][$nametype]['thumb'] = '100x100x1';

    $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';



    /* Sản phẩm (List) */

    $config['product'][$nametype]['title_main_list'] = "Sản phẩm cấp 1";

    $config['product'][$nametype]['images_list'] = false;

    $config['product'][$nametype]['show_images_list'] = false;

    $config['product'][$nametype]['slug_list'] = true;

    $config['product'][$nametype]['check_list'] = array("menu"=>"Menu","noibat"=>"Nổi bật");

  

    $config['product'][$nametype]['mota_list'] = false;

    $config['product'][$nametype]['seo_list'] = true;

    $config['product'][$nametype]['width_list'] = 300;

    $config['product'][$nametype]['height_list'] = 200;

    $config['product'][$nametype]['thumb_list'] = '100x100x1';

    $config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';



    /* Sản phẩm (Cat) */

    $config['product'][$nametype]['title_main_cat'] = "Sản phẩm cấp 2";

    $config['product'][$nametype]['images_cat'] = false;

    $config['product'][$nametype]['show_images_cat'] = false;

    $config['product'][$nametype]['slug_cat'] = true;

    $config['product'][$nametype]['check_cat'] = array( );

    $config['product'][$nametype]['mota_cat'] = false;

    $config['product'][$nametype]['seo_cat'] = true;

    $config['product'][$nametype]['width_cat'] = 300;

    $config['product'][$nametype]['height_cat'] = 200;

    $config['product'][$nametype]['thumb_cat'] = '100x100x1';

    $config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';



     /* Sản phẩm (item) */

    $config['product'][$nametype]['title_main_item'] = "Sản phẩm cấp 3";

    $config['product'][$nametype]['images_item'] = false;

    $config['product'][$nametype]['show_images_item'] = false;

    $config['product'][$nametype]['slug_item'] = true;

    $config['product'][$nametype]['check_item'] = array( );

    $config['product'][$nametype]['mota_item'] = false;

    $config['product'][$nametype]['seo_item'] = true;

    $config['product'][$nametype]['width_item'] = 300;

    $config['product'][$nametype]['height_item'] = 200;

    $config['product'][$nametype]['thumb_item'] = '100x100x1';

    $config['product'][$nametype]['img_type_item'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';

   

    /* Thư viện ảnh */

    /*$nametype = "thu-vien-anh";

    $config['product'][$nametype]['title_main'] = "Thư viện ảnh";

    $config['product'][$nametype]['check'] = array("noibat"=>"Nổi bật");

    $config['product'][$nametype]['view'] = true;

    $config['product'][$nametype]['slug'] = true;

    $config['product'][$nametype]['images'] = true;

    $config['product'][$nametype]['show_images'] = true;

    $config['product'][$nametype]['gallery'] = array

    (

        $nametype => array

        (

            "title_main_photo" => "Hình ảnh thư viện ảnh",

            "title_sub_photo" => "Hình ảnh",

            "number_photo" => 2,

            "images_photo" => true,

            "avatar_photo" => true,

            "tieude_photo" => true,

            "width_photo" => 540,

            "height_photo" => 540,

            "thumb_photo" => '100x100x1',

            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'

        )

    );

    $config['product'][$nametype]['seo'] = true;

    $config['product'][$nametype]['width'] = 270;

    $config['product'][$nametype]['height'] = 270;

    $config['product'][$nametype]['thumb'] = '100x100x1';

    $config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';*/

?>