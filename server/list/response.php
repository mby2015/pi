<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/16/15
 * Time: 7:42 PM
 */

function getResponseObject($rs) {
    $array = array();
    while($rows = $rs->fetch_array(MYSQLI_ASSOC)) {
        $array[] = $rows;
    };
    $obj = new stdClass();
    $obj->msg = "ok";
    $obj->response = new stdClass();
    $obj->response->list = $array;
    return $obj;
}

?>