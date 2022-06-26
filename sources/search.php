<?php  
if(!defined('SOURCES')) die("Error");

/* Tìm kiếm sản phẩm */
if(isset($_GET))
{	
	if(isset($_GET['s1'])){
		$tukhoa = htmlspecialchars($_GET['s1']);
		$tukhoa = $func->changeTitle($tukhoa);
	}
	if(isset($_GET['s2'])){
		$id_list = htmlspecialchars($_GET['s2']);
	}
	if(isset($_GET['s3'])){
		$id_city = htmlspecialchars($_GET['s3']);
	}
	if(isset($_GET['s4'])){
		$id_district = htmlspecialchars($_GET['s4']);
	}
	if(isset($_GET['s5'])){
		$mod_dientich = htmlspecialchars($_GET['s5']);
	}
	if(isset($_GET['s6'])){
		$mod_huong = htmlspecialchars($_GET['s6']);
	}
	if(isset($_GET['s7'])){
		$mod_gia = htmlspecialchars($_GET['s7']);
	}


	$where = "";
	$where .= " type = ? and hienthi > 0";
	$params = array("san-pham");

	if(isset($tukhoa))
	{
		$where .= " and (ten$lang LIKE '%$tukhoa%' or tenkhongdauvi LIKE '%$tukhoa%' or tenkhongdauen LIKE '%$tukhoa%')  ";
	}

	if(isset($id_list))
	{
		$where .= " and id_list = $id_list ";
	}

	if(isset($id_city))
	{
		$where .= " and id_city = $id_city ";
	}

	if(isset($id_district))
	{
		$where .= " and id_district = $id_district ";
	}
	if(isset($mod_dientich))
	{
		$where .= " and mod_dientich = $mod_dientich ";
	}
	if(isset($mod_huong))
	{
		$where .= " and mod_huong = $mod_huong ";
	}
	if(isset($mod_gia))
	{
		$where .= " and mod_gia = $mod_gia ";
	}

	

	$curPage = $get_page;
	$per_page = 20;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$select=' id, ten'.$lang.' ,tenkhongdauvi, tenkhongdauen , gia,giamoi,giakm ,photo ,info_more,mod_huong,new';
	$sql = "select $select from #_product where $where order by stt,id desc $limit";
	$product = $d->rawQuery($sql,$params);
	$sqlNum = "select count(*) as 'num' from #_news where $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,$params);
	$total = $count['num'];
	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* SEO */
$seo->setSeo('title',$title_crumb);

/* breadCrumbs */
$breadcr->setBreadCrumbs('',$title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
?>