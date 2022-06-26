<?php
	include "ajax_config.php";

	$id_sp=(int)$_REQUEST['idsp'];
	$star=(int)$_REQUEST['star'];
	

	$row_detail = $d->rawQueryOne("select id,review_count,ratting from #_product where id = ? ",array($id_sp));

	$data_ratting['review_count'] = $row_detail['review_count'] + 1;
	$data_ratting['ratting'] = $row_detail['ratting'] + $star;

	$d->where('id',$row_detail['id']);

	if ($d->update('product',$data_ratting)) {

		$max=count($_SESSION['ratted']);
		if ($max==0) {
			$_SESSION['ratted']=array();
		}
		$dem=0;
		foreach ($_SESSION['ratted'] as $key => $value) {
			if ($_SESSION['ratted'][$key] == $row_detail['id']) {
				$dem++;
			}
		}
	
		if ($dem == 0 ) {
			$_SESSION['ratted'][$max] = $row_detail['id'];
		}

		echo $star;
	}else{
		echo 0;
	}
?>