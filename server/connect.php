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

$db_server_ip = $info['SERVER_IP'];
$db_server = $info['SERVER'];
$db_user = $info['USER'];
$db_pwd = $info['PASSWORD'];
$db_name = $info['DBNAME'];

$db = new mysqli($db_server, $db_user,$db_pwd, $db_name);
// error
if (mysqli_connect_errno()) {
    printf($error.CONNECT, mysqli_connect_error());
    exit();
}
$db->query("set names utf8" );

?>
