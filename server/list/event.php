<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/16/15
 * Time: 9:47 PM
 */
include_once '../connect.php';
include_once 'response.php';
include_once 'da.php';

function getCategory() {
    global $code, $name;
    $array = array();
    foreach  ($code as $c => $value) {
        $obj = new stdClass();
        $obj->code = $value;
        $obj->label = $name[$c];
        $array[] = $obj;
    }
    $response = new stdClass();
    $response->msg = "success";
    $response->response = new stdClass();
    $response->response->list = $array;
    return $response;
}

function getEventItem() {
    global $db, $code;
    $date_Y_m_d = date('Y-m-d');
    $SubID = $_POST["SubID"];

    $array = array();
    foreach  ($code as $c => $value) {
        $array[] = $value;
    }

    $cate_idx = array_search($SubID, $array); //$sub_id_key 값을 배열에서 찾아 배열인덱스 값을 $cate_idx 에 넣는다

    if(!$cate_idx){
        $sql_multicate = "";
        $cate_idx = 0;
    }else{
        $sql_multicate = " and (sub_id_key like '". $array[$cate_idx] ."%') ";
        if($array[$cate_idx] == 'A2266')
            $sql_multicate = " and (sub_id_key like 'A2266%' or sub_id_key like 'A2267%' or sub_id_key like 'A2268%') "; //문구,취미,유아동 검색
    }


    $sql = "select * from project
	where
		project_expose='Y'
		and end_date >= '$date_Y_m_d'
		$sql_multicate
		$sql_mode";
    $rs = $db->query($sql) or die(mysqli_error());
    $total = $rs->num_rows;
}

if ($_POST['cate']) {
    echo json_encode(getCategory(), JSON_UNESCAPED_UNICODE);
}  else {
    echo json_encode(getEventItem(), JSON_UNESCAPED_UNICODE);
}

?>