<?php

//////default settings/////////////////
require_once("config.php");
require_once("dbClass.php");
require_once("sessionClass.php");
require_once("cartClass.php");
require_once("listControlClass.php");
require_once("jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
$db = new Database( db_host, db_user, db_pass, db_name );
$cart = new cart("cart");
$cart->checkSession();
//////////////////////////////////////////////////////////

require_once("ifGET.php");
require_once("sort_search2.php");
require_once("escape.php");

$db->close();

$cnt = count($_SESSION["cart"]);

include_once("list2.1.html");

?>
