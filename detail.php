<?php

//////default settings/////////////////
require_once("config.php");
require_once("dbClass.php");
require_once("sessionClass.php");
require_once("cartClass.php");
require_once("listControlClass.php");
//////////////////////////////////////


///////////call classes///////////////////////////////////
$db = new Database( db_host, db_user, db_pass, db_name );
$ctr = new control(db_host, db_user, db_pass, db_name );
$cart = new cart("cart");
//////////////////////////////////////////////////////////


$cart->checkSession();


/////////////////////////////////////////////////////
if(isset($_GET["id"])){
	$data = $ctr->detailOpen($_GET["id"]);
}
if(isset($_GET["add"] )){
	$data = $ctr->detailOpen($_GET["add"]);
}
if(isset($_GET["delete"] )){	
	$data = $ctr->detailOpen($_GET["delete"]);
}
////////////////////////////////////////////////////

var_dump($data);

/////if you have geted GET["add"]///////////////////
if(empty($_GET["add"])){
	$_GET["add"] = "";
}else{
	$_SESSION["cart"] = $cart->buttonAdd($_GET["add"]);
}
/////////////////////////////////////////////////////

/////if you have geted GET["delete"]///////////////////
if(empty($_GET["delete"])){
	$_GET["delete"] = "";
}else{
	$_SESSION["cart"] = $cart->buttonDel($_GET["delete"]);
}
///////////////////////////////////////////////////////

?>


<!-- ////////HTML-START//////////////////////////////////////////////////////////-->
<html>
<head>
<meta charset="utf-8">
<title>detail</title>
</head>
<body>

<img src="<?php echo $data[0]["img"] ?>" alt="<?php echo $data[0]["id"] ?>"><br><br>
<?php echo $data[0]["name"] ?> <br><br>
<?php echo $data[0]["price"] ?><br><br>
<?php echo $data[0]["detail"] ?><br><br>


<?php if( in_array( $data[0]["id"], $_SESSION["cart"]) ){ ?>
		<form action="" method="get">
		  <input type="hidden" name="delete" value="<?php echo $data[0]["id"] ?>"/>
		  <input type="submit" name="submit" value="delete" />
    	</form>	
<?php }else{ ?>
		  <form action="" method="get">
		  <input type="hidden" name="add" value="<?php echo $data[0]["id"] ?>"/>
		  <input type="submit" name="submit" value="add" />
    	</form>
<?php } ?>
<!--////////////////////////////////////////////////////////////////////////////-->
</body>
</html>



