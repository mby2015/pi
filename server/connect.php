<?php
/**
 * Created by PhpStorm.
 * User: janeir
 * Date: 6/13/15
 * Time: 7:07 PM
 */

$string = file_get_contents("config.json", true);
$config = json_decode($string, true);
$info = $config['INFO'];
$error = $config['ERROR'];
$code = $config['CODE'];
$name = $config['NAME'];

$db_server_ip = $info['SERVER_IP'];// "121.124.124.238";
$db_server = $info['SERVER']; // "121.124.124.238";
$db_user = $info['USER']; // "dltjsejr";
$db_pwd = $info['PASSWORD']; //'tjsejr12850408!#$';
$db_name = $info['DBNAME']; // "bb1322";]

$db = new mysqli($db_server, $db_user,$db_pwd, $db_name);
// error
if (mysqli_connect_errno()) {
    printf($error.CONNECT, mysqli_connect_error());
    exit();
}
$db->query("set names utf8" );

?>
