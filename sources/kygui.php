<?php
if(!defined('SOURCES')) die("Error");
/* kygui */

$kygui = $d->rawQueryOne("select ten$lang, noidung$lang from #_static where type = ? limit 0,1",array('kygui'));
if(isset($_POST['submit-kygui']))
{
    $responseCaptcha = $_POST['recaptcha_response_kygui'];
    $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
    $scoreCaptcha = (isset($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
    $actionCaptcha = (isset($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
    $testCaptcha = (isset($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

    if(($scoreCaptcha >= 0.5 && $actionCaptcha == 'kygui') || $testCaptcha == true)
    {
        $data = array();
        $data['ten'] = (isset($_REQUEST['ten-kygui']) && $_REQUEST['ten-kygui'] != '') ? htmlspecialchars($_REQUEST['ten-kygui']) : '';
        $data['email'] = (isset($_REQUEST['email-kygui']) && $_REQUEST['email-kygui'] != '') ? htmlspecialchars($_REQUEST['email-kygui']) : '';
        $data['diachi'] = (isset($_REQUEST['diachi-kygui']) && $_REQUEST['diachi-kygui'] != '') ? htmlspecialchars($_REQUEST['diachi-kygui']) : '';
        $data['dienthoai'] = (isset($_REQUEST['dienthoai-kygui']) && $_REQUEST['dienthoai-kygui'] != '') ? htmlspecialchars($_REQUEST['dienthoai-kygui']) : '';
        $data['chude'] = (isset($_REQUEST['tieude-kygui']) && $_REQUEST['tieude-kygui'] != '') ? htmlspecialchars($_REQUEST['tieude-kygui']) : '';
        $data['noidung'] = (isset($_REQUEST['noidung-kygui']) && $_REQUEST['noidung-kygui'] != '') ? htmlspecialchars($_REQUEST['noidung-kygui']) : '';

        if(isset($_FILES["file"]))
        {
            $file_name = $func->uploadName($_FILES["file"]["name"]);
            if($file = $func->uploadImage("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF', UPLOAD_FILE_L, $file_name))
            {
                $data['taptin'] = $file;
            }
        }

        $data['ngaytao'] = time();
        $data['type'] = (isset($_REQUEST['type-kygui']) && $_REQUEST['type-kygui'] != '') ? htmlspecialchars($_REQUEST['type-kygui']) : '';

        if($d->insert('newsletter',$data))
        {
            $func->transfer("Ký gửi thông tin thành công. Chúng tôi sẽ liên hệ với bạn sớm.",$config_base);
        }
        else
        {
            $func->transfer("Ký gửi thông tin thất bại. Vui lòng thử lại sau.1",$config_base, false);
        }
    }
    else
    {
        $func->transfer("Ký gửi thông tin thất bại. Vui lòng thử lại sau.",$config_base, false);
    }
}

/* breadCrumbs */
if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
?>