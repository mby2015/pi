<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/14/15
 * Time: 6:30 PM
 */

include_once('../connect.php');

$keyword = $_POST["keyword"];
$new = $_POST["new"];


$sortType = $_POST["sorttype"]; // 누적판매량순/신상품순/인기도순/높은가격순/낮은가격순/할인율순/최근판매량순
$sql = "
			select a.id, a.sub_id_key, a.m_img, a.name from (
				select
					it.id id,
					it.sub_id_key sub_id_key,
					it.m_img m_img,
					it.name name
				from
					NICECART_ITEM it
				where 1
					and (it.sub_id_key like '{$SubID}%' or (it.sub_id_key_2 != '' and it.sub_id_key_2 like '{$SubID}%') $where_nbs)
					and it.printcheck='Y'
					and it.printcheck_request='Y'
				order by it.id desc
				limit 99999
			) a,
			NICECART_QUANTITY_1 iq
			where 1
				and a.id=iq.item_id
				and iq.stock > 0
			limit 4";

$SubID = "A1355B1363C1401";
if ($new) {
//    $randValue = (int)rand(0,9);
//    if($randValue < 0 || $randValue > 9) $randValue='0';
//    if($SubID=='A2178') $randValue = '0'; // 유아동 일때는 랜덤을 걸지 않는다. 상품이 너무 적음
//    if($SubID=='A2181'){
//        $where_nbs = " or ni.sub_id_key like 'A1319%'";
//    }
    $sql = "
			select a.id, a.sub_id_key, a.m_img, a.name from (
				select
					it.id id,
					it.sub_id_key sub_id_key,
					it.m_img m_img,
					it.name name
				from
					NICECART_ITEM it
				where 1
					and (it.sub_id_key like '{$SubID}%' or (it.sub_id_key_2 != '' and it.sub_id_key_2 like '{$SubID}%') $where_nbs)
					and it.printcheck='Y'
					and it.printcheck_request='Y'
				order by it.id desc
				limit 99999
			) a,
			NICECART_QUANTITY_1 iq
			where 1
				and a.id=iq.item_id
				and iq.stock > 0
			limit 4";
}

$rs = $db->query($sql);
$array = array();
while($rows = $rs->fetch_array(MYSQLI_ASSOC)) {
    $array[] = $rows;
};

$obj = new stdClass();
$obj->msg = "ok";
$obj->list = $array;
echo json_encode($obj);
//$obj = new stdClass();
//$obj->keyword = $keyword;
//$obj->sorttype = $sortType;


?>