<?php

//////default settings/////////////////
require_once("config.php");
require_once("./class/dbClass.php");
require_once("./class/sessionClass.php");
require_once("./class/cartClass.php");
require_once("./class/listControlClass.php");
require_once("./class/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
$db = new Database( db_host, db_user, db_pass, db_name );
$cart = new cart("cart");
$cart->checkSession();
$ctr = new control(db_host, db_user, db_pass, db_name );
$data = $ctr->allSelect();
//////////////////////////////////////////////////////////

$db->close();

include_once('./html/list.html');

?>
