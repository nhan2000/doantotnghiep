<?php
if(!defined('SOURCES')) die("Error");

    function check_user_per($id_tin=0)
    {
        global $d, $func, $row_detail, $config_base, $login_member,$iduser;

        if($id_tin>0)
        {
            /* Kiểm tra thông tin */
            $row_detail = $d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($id_tin));
            if ($row_detail['id_user']==$_SESSION[$login_member]['id']) {
                return $row_detail;
            }else{
                $func->transfer("Trang không tồn tại",'account/quan-ly-tin-dang', false);
            }
        }
        else
        {
            $func->transfer("Trang không tồn tại",'account/quan-ly-tin-dang', false);
        }
    }


    function delete_tindang($id_tin=0)
    {
        global $d, $func, $row_detail, $config_base, $login_member,$iduser;

        if($id_tin>0)
        {
            /* Kiểm tra thông tin */
            
            $d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

            /* Lấy dữ liệu */
            $row= $d->rawQueryOne("select * from #_product where id = ? limit 0,1",array($id_tin));

            if($row['id'])
            {
                $func->delete_file(UPLOAD_PRODUCT_L.$row['photo']);
                $d->rawQuery("delete from #_product where id = ?",array($id_tin));

                /* Xóa gallery */
                $row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id_tin,'man',$com));

                if(count($row))
                {
                    foreach($row as $v)
                    {
                        $func->delete_file(UPLOAD_PRODUCT_L.$v['photo']);
                        $func->delete_file(UPLOAD_FILE_L.$v['taptin']);
                    }

                    $d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?",array($row['id'],'man',$com));
                }

                $func->transfer("Xóa dữ liệu thành công", "account/quan-ly-tin-dang");
            }
            else $func->transfer("Xóa dữ liệu bị lỗi", "account/quan-ly-tin-dang", false);
        }
        else
        {
            $func->transfer("Trang không tồn tại",$config_base, false);
        }
    }

    
/* kygui */
if(array_key_exists($login_member, $_SESSION) && $_SESSION[$login_member]['active'] == true) {

    if ($_GET['id'] > 0) {
        $pro = check_user_per($_GET['id']);

        if ($_GET['act'] == 'delete') {
            delete_tindang($pro['id'] );
        }
        if ($_GET['act'] == 'edit') {
            $_REQUEST['id_list'] = $pro['id_list'];
            $_REQUEST['id_cat'] = $pro['id_cat'];
            $_REQUEST['id_item'] = $pro['id_item'];
            $_REQUEST['id_city'] = $pro['id_city'];
            $_REQUEST['id_district'] = $pro['id_district'];

            $gallery =   $d->rawQuery("select photo from #_gallery where id_photo = ? and com='product' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($pro['id'],$pro['type'],$pro['type']));

        }
    }


    if(isset($_POST['submit-dangtin']))
    {
        $responseCaptcha = $_POST['recaptcha_response_dangtin'];
        $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
        $scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
        $actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
        $testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

        if(($scoreCaptcha >= 0.5 && $actionCaptcha == 'dangtin') || $testCaptcha == true)
        {

            $data = array();
            $data['id_list'] = $_POST['data']['id_list'];
            $data['id_cat'] = $_POST['data']['id_cat'];
            $data['id_item'] = $_POST['data']['id_item'];

            $data['mod_dientich'] = $_POST['data']['mod_dientich'];
            $data['mod_huong'] = $_POST['data']['mod_huong'];
            $data['mod_gia'] = $_POST['data']['mod_gia'];

            $data['id_city'] = $_POST['data']['id_city'];
            $data['id_district'] = $_POST['data']['id_district'];


            $data['tenvi'] = (isset($_REQUEST['ten-dt']) && $_REQUEST['ten-dt'] != '') ? htmlspecialchars($_REQUEST['ten-dt']) : '';
            $data['tenkhongdauvi'] = $func->changeTitle($data['tenvi']).'-'.time() ;

            $data['motavi'] = (isset($_REQUEST['mota-dt']) && $_REQUEST['mota-dt'] != '') ? htmlspecialchars($_REQUEST['mota-dt']) : '';
            $data['noidungvi'] = (isset($_REQUEST['noidung-dt']) && $_REQUEST['noidung-dt'] != '') ? htmlspecialchars($_REQUEST['noidung-dt']) : '';
            
            $info_more['gia']=(isset($_REQUEST['gia-dt']) && $_REQUEST['gia-dt'] != '') ? htmlspecialchars($_REQUEST['gia-dt']) : '';
            $info_more['dientich'] = (isset($_REQUEST['dientich-dt']) && $_REQUEST['dientich-dt'] != '') ? htmlspecialchars($_REQUEST['dientich-dt']) : '';
            $info_more['tinhtrang'] = (isset($_REQUEST['tinhtrang-dt']) && $_REQUEST['tinhtrang-dt'] != '') ? htmlspecialchars($_REQUEST['tinhtrang-dt']) : '';
            
            $data['info_more'] = json_encode($info_more);

            $data['id_user']=$_SESSION[$login_member]['id'];
            $info_user['ten'] = (isset($_REQUEST['ten-kygui']) && $_REQUEST['ten-kygui'] != '') ? htmlspecialchars($_REQUEST['ten-kygui']) : '';
            $info_user['email'] = (isset($_REQUEST['email-kygui']) && $_REQUEST['email-kygui'] != '') ? htmlspecialchars($_REQUEST['email-kygui']) : '';
            $info_user['diachi'] = (isset($_REQUEST['diachi-kygui']) && $_REQUEST['diachi-kygui'] != '') ? htmlspecialchars($_REQUEST['diachi-kygui']) : '';
            $info_user['dienthoai'] = (isset($_REQUEST['dienthoai-kygui']) && $_REQUEST['dienthoai-kygui'] != '') ? htmlspecialchars($_REQUEST['dienthoai-kygui']) : '';
            $data['info_user'] = json_encode($info_user);

            $data['ngaytao'] = time();
            $data['type'] = 'san-pham';

            if(isset($_FILES["photo-dt"]))
            {
                $file_name = $func->uploadName($_FILES["photo-dt"]["name"]);
                if($photo = $func->uploadImage("photo-dt", 'jpg|png|gif|JPG|PNG|GIF', UPLOAD_PRODUCT_L,$file_name))
                {
                    $data['photo'] = $photo;                 
                }
            }


            if ($pro['id']>0) {
                
                
                $d->where('id', $pro['id']);
                if($d->update('product',$data))
                {
                    $dataMulti['id_photo'] = $pro['id'];
                    $dataMulti['type'] = 'san-pham';
                    $dataMulti['com'] = 'product';
                    $dataMulti['kind'] = 'man';
                    $dataMulti['val'] = 'san-pham';
                    $dataMulti['hienthi'] = 1;
                    $dataMulti['ngaytao'] = time();


                    $gallery =   $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and com='product' and type = ? and kind='man' and val = ? and hienthi > 0 order by stt,id desc",array($pro['id'],$pro['type'],$pro['type']));

                    $row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man',$com));
                    for ($i=0; $i < 5; $i++) { 
                        
                        if(isset($_FILES["file".$i]))
                        {
                            $file_name = $func->uploadName($_FILES["file".$i]["name"]);
                            if($photo = $func->uploadImage("file".$i, 'jpg|png|gif|JPG|PNG|GIF', UPLOAD_PRODUCT_L,$file_name))
                            {

                                $dataMulti['stt'] = $i+1;
                                $dataMulti['photo'] = $photo;
                                
                                if ($gallery[$i]['photo']!="") {
                                    $func->delete_file(UPLOAD_PRODUCT.$gallery[$i]['photo']);
                                    $d->where('id', $gallery[$i]['id']);
                                    $d->update('gallery',$dataMulti);
                                    $func->alert('tcu:'.$i);
                                }else{
                                    $d->insert('gallery',$dataMulti);
                                    $func->alert('tci:'.$i);
                                }
                             
                            }
                        }
                    }
                    $func->transfer("Cập nhật thông tin thành công.",'account/quan-ly-tin-dang');
                }
                else{
                     $func->transfer("Cập nhật thông tin thất bại. Vui lòng thử lại sau!",'account/quan-ly-tin-dang', false);
                }
            
            }else{
                if($d->insert('product',$data))
                {
                    $id_insert = $d->getLastInsertId();
                    $dataMulti['id_photo'] = $id_insert;
                    $dataMulti['type'] = 'san-pham';
                    $dataMulti['com'] = 'product';
                    $dataMulti['kind'] = 'man';
                    $dataMulti['val'] = 'san-pham';
                    $dataMulti['hienthi'] = 1;
                    $dataMulti['ngaytao'] = time();


                    for ($i=0; $i < 5; $i++) { 
                        
                        if(isset($_FILES["file".$i]))
                        {
                            $file_name = $func->uploadName($_FILES["file".$i]["name"]);
                            if($photo = $func->uploadImage("file".$i, 'jpg|png|gif|JPG|PNG|GIF', UPLOAD_PRODUCT_L,$file_name))
                            {   
                        
                                $dataMulti['stt'] = $i+1;
                                $dataMulti['photo'] = $photo;
                                $d->insert('gallery',$dataMulti);
                             
                            }
                        }
                    }

                    $func->transfer("Ký gửi thông tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.",'account/quan-ly-tin-dang');
                }
                else
                {
                    $func->transfer("Ký gửi thông tin thất bại. Vui lòng thử lại sau!",'account/quan-ly-tin-dang', false);
                }
            }    

        }
        else
        {
            $func->transfer("Ký gửi thông tin thất bại. Vui lòng thử lại sau.",'account/quan-ly-tin-dang', false);
        }
    }

    /* breadCrumbs */
    if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
    $breadcrumbs = $breadcr->getBreadCrumbs();
}else{
    $func->transfer("Bạn cần đăng nhập để thực hiện chức năng này.",$config_base.'account/dang-nhap',false);
}

?>