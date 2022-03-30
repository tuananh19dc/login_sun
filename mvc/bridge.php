<?php

include "./mvc/core/DB.php";
include "./mvc/core/data.php";
include "./mvc/core/app.php";
include "./mvc/core/controller.php";

if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $ROOT_URL = "https://".$_SERVER['HTTP_HOST']."/".explode("/",trim($_SERVER['PHP_SELF']))[1].'/';
}else{
    $ROOT_URL = "http://".$_SERVER['HTTP_HOST']."/".explode("/",trim($_SERVER['PHP_SELF']))[1].'/';
}
define("ROOT_URL", $ROOT_URL);

$app = new app();

?>
