<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/16/15
 * Time: 7:56 PM
 */

// type에 따른 쿼리 조합
function getSQL($type) {
    if ($type == 'NEW_BEST') {
        return "
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
    else if($type == 'EVENT') {
        return "
	select *
	from project
	where
		project_expose='Y'
		and end_date >= '$date_Y_m_d'
		$sql_multicate
		$sql_mode";
    }
}

?>