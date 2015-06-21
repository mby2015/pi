<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/14/15
 * Time: 6:30 PM
 */

include_once '../connect.php';
include_once 'response.php';
include_once 'da.php';

function getNewBestItem() {

    global $db, $randValue, $where_nbs, $code;

    $SubID = $_POST["SubID"];
    $type = "NEW_BEST";

    $randValue = (int)rand(0,9);
    if ($randValue > 9) {
        $randValue = '0';
    }
    $randValue = max(0, $randValue);
    if($SubID == $code->KIDS) {
        $randValue = '0';
    }
    if($SubID == $code->HOME_DECO){
        $where_nbs = " or ni.sub_id_key like '{$code->HOME_DECO}%'";
    }

    $sql = getSQL($type);

    $rs = $db->query($sql);

    $response = getResponseObject($rs);
    return $response;
}

echo json_encode(getNewBestItem());

?>